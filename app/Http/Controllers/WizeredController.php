<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessAttachment;
use App\DesignCategory;
use App\Wizered;
use App\Design;
use Auth;
use StripeHelper;

class WizeredController extends Controller
{
    public function domainSelected(Request $request)
    {
        $request->validate([
        'domain'=>'required|string|max:250'
      ]);

        self::insertWizered("domain", $request->domain);
        self::insertWizered("currentStep", 2);


        return redirect()->route('select-design');
    }
    public function selectDesign(Request $request)
    {
        $currentStep = 2;

        $categoryId = (int)$request->c;

        $designs = Design::with('category');
        if ($categoryId != null) {
            $designs = $designs->where('categoryId', $categoryId);
        }

        $designs = $designs->paginate(12);

        $designCategory = DesignCategory::where('status', 1)->get();

        return view('welcomeWizered.main', compact('currentStep', 'designs', 'designCategory'));
    }
    public function websitePackege(Request $request)
    {
        $currentStep = 3;
        return view('welcomeWizered.main', compact('currentStep'));
    }
    public function selectedDesign(Request $request, $designId)
    {
        $designId = (int)$designId;
        if ($designId == null || !is_int($designId)) {
            return errorMessage('Please choose a design');
        }
        if (Design::where('id', $designId)->count() == 0) {
            return errorMessage('Selected design does not exists');
        }

        self::insertWizered("selectedDesign", $designId);
        self::insertWizered("currentStep", 3);

        return redirect()->route('websitePackege');
    }



    public function selectedWebsitePackege(Request $request, $packegeNumber)
    {
        $packegeNumber = (int)$packegeNumber;

        self::insertWizered("selectedWebsitePackege", $packegeNumber);
        self::insertWizered("currentStep", 4);

        return redirect()->route('planAndBilling', $packegeNumber);
    }
    public function planAndBilling(Request $request, $planNumber)
    {
        $currentStep = 4;

        $user = $request->user();

        $intent = $user->createSetupIntent();

        return view('welcomeWizered.main', compact('currentStep', 'planNumber', 'intent'));
    }
    public function businessInformation(Request $request)
    {
        $currentStep = 5;
        return view('welcomeWizered.main', compact('currentStep'));
    }
    public function storeBilling(Request $request)
    {
        $request->validate(
            [
            'paymentMethod'=>'required'
            ]
        );

        $user = Auth::user();
        $paymentMethod = $request->paymentMethod;
        $obj = StripeHelper::updateCard($paymentMethod);

        if ($obj->status == 0) {
            return errorMessage($obj->message);
        }

        $planNumber = $request->hiddenPlanNumber;
        $planDurration = $request->hiddenPlanDurration;

        $planId = "basicPlanMonthly"; //by default basic plan

        if ($planDurration == "y") {
            // choose Yearly plan
            if ($planNumber == 1) {
                $planId = "basicPlanYearly";
            } elseif ($planNumber == 2) {
                $planId = "essentialPlanYearly";
            } elseif ($planNumber == 3) {
                $planId = "activePlanYearly";
            } elseif ($planNumber == 4) {
                $planId = "completePlanYearly";
            }
        } else {
            // monthlyPlans
            if ($planNumber == 1) {
                $planId = "basicPlanMonthly";
            } elseif ($planNumber == 2) {
                $planId = "essentialPlanMonthly";
            } elseif ($planNumber == 3) {
                $planId = "activePlanMonthly";
            } elseif ($planNumber == 4) {
                $planId = "completePlanMonthly";
            }
        }




        $logoDesign = $request->logoDesign;

        $stripeChargeAmount = 0;
        $stripeChargeMessage = '';

        if ($logoDesign == "on") {
            self::insertWizered("logoDesign", $logoDesign);
            $stripeChargeAmount = 100;
            $stripeChargeMessage = "Logo Design  ";
        }
        $businessCardDesign = $request->businessCardDesign;
        if ($businessCardDesign == "on") {
            self::insertWizered("businessCardDesign", $businessCardDesign);
            $stripeChargeAmount = $stripeChargeAmount + 150;
            $stripeChargeMessage .= "Business Card Design  ";
        }
        $flayerDesign = $request->flayerDesign;
        if ($flayerDesign == "on") {
            self::insertWizered("flayerDesign", $flayerDesign);
            $stripeChargeAmount = $stripeChargeAmount + 200;
            $stripeChargeMessage .= "Flayer Design    ";
        }
        $stripeChargeAmount = $stripeChargeAmount * 100;



        self::insertWizered("planId", $planId);
        self::insertWizered("currentStep", 5);

        self::insertWizered('stripeChargeAmount',$stripeChargeAmount);
        self::insertWizered('stripeChargeMessage',$stripeChargeMessage);

        // charge user for logo site design and flyer
        $chargeStatus = StripeHelper::chargeForFlexSited($stripeChargeAmount, $stripeChargeMessage);
        if ($chargeStatus->status == 3) {
            self::insertWizered("charged", 'inComplete');
            return $chargeStatus->response;
        }
        if ($chargeStatus->status == 0) {
            self::insertWizered("charged", $chargeStatus->message);
            return errorMessage($chargeStatus->message);
        }
        self::insertWizered("charged", 'complete');

        // subscribe to plan
        try {
            $obj = StripeHelper::subscribeToPlan($user, $planId);
            if ($obj->status == 0) {
                self::insertWizered("subscribe", $e->getMessage());
                return errorMessage($obj->message);
            }
            if ($obj->status == 3) {
                self::insertWizered("subscribe", 'inComplete');
                return $obj->response;
            }
        } catch (\Exception $e) {
            self::insertWizered("subscribe", $e->getMessage());
            return errorMessage($e->getMessage());
        }

        self::insertWizered("subscribe", 'complete');



        if ($obj->status == 1 && isset($obj->subscription)) {
            return redirect()->route('businessInformation')->with('status', 'Subscription successfull');
        }
    }
    public function incompletePaymentCompleted(Request $request)
    {
        $data = self::getWizered(['subscribe', 'charged','planId']);

        $chargeStatus = $data->where('key','charged')->first();

        if ($chargeStatus == null) {
          $data1 = self::getWizered(['stripeChargeAmount', 'stripeChargeMessage']);
          $stripeChargeAmount = $data1->where('key','stripeChargeAmount')->first()->value;
          $stripeChargeMessage = $data1->where('key','stripeChargeMessage')->first()->value;

          $chargeStatus = StripeHelper::chargeForFlexSited($stripeChargeAmount, $stripeChargeMessage);
          if ($chargeStatus->status == 3) {
              self::insertWizered("charged", 'inComplete');
              return $chargeStatus->response;
          }
          if ($chargeStatus->status == 0) {
              self::insertWizered("charged", $chargeStatus->message);
              return errorMessage($chargeStatus->message);
          }
          self::insertWizered("charged", 'complete');
        }
        $user = Auth::user();
        // subscribe to plan
        $subscribe = $data->where('key','subscribe')->first();

        if ($subscribe == null) {
          try {
              $planId = $data->where('key','planId')->first()->value;
              $obj = StripeHelper::subscribeToPlan($user, $planId);

              if ($obj->status == 0) {
                  self::insertWizered("subscribe", $e->getMessage());
                  return errorMessage($obj->message);
              }
              if ($obj->status == 3) {
                  self::insertWizered("subscribe", 'inComplete');
                  return $obj->response;
              }
          } catch (\Exception $e) {

              self::insertWizered("subscribe", $e->getMessage());
              return errorMessage($e->getMessage());
          }
        }


        self::insertWizered("subscribe", 'complete');

        return redirect()->route('businessInformation')->with('status', 'Subscription successfull');

    }


    public function businessInformationStore(Request $request)
    {
        $businessName = $request->businessName;
        $businessPhoneNumber = $request->businessPhoneNumber;
        $businessAddress = $request->businessAddress;
        $hoursOfOperation = $request->hoursOfOperation;
        $whatBeautyServicesDoYouOffer = $request->whatBeautyServicesDoYouOffer;
        $appointment = $request->appointment;
        $socialMediaHandles = $request->socialMediaHandles;
        $hiddenPageSelected = $request->hiddenPageSelected;

        self::insertWizered('businessName', $businessName);
        self::insertWizered('businessPhoneNumber', $businessPhoneNumber);
        self::insertWizered('businessAddress', $businessAddress);
        self::insertWizered('hoursOfOperation', $hoursOfOperation);
        self::insertWizered('whatBeautyServicesDoYouOffer', $whatBeautyServicesDoYouOffer);
        self::insertWizered('appointment', $appointment);
        self::insertWizered('socialMediaHandles', $socialMediaHandles);
        self::insertWizered('pageSelected', $hiddenPageSelected);

        $providingContent = $request->providingContent;
        $howfindus = $request->howfindus;
        self::insertWizered('providingContent', $providingContent);
        self::insertWizered('howfindus', $howfindus);


        $request->validate([
          'logoUpload.*' => 'nullable|mimes:jpg,jpeg,png,bmp,zip|max:15000',
          'galleryImages.*' => 'nullable|mimes:jpg,jpeg,png,bmp,zip|max:15000',
          'contentUpload' => 'nullable|max:25000'
          ], [
          'logoUpload.*.mimes' => 'Only jpeg,png and bmp images or zip are allowed',
          'logoUpload.*.max' => 'Sorry! Maximum allowed size can be 15MB',
          'galleryImages.*.mimes' => 'Only jpeg,png and bmp images or zip are allowed',
          'galleryImages.*.max' => 'Sorry! Maximum allowed size can be 15MB',
        ]);
        $logoFiles = $request->logoUpload;
        $contentUpload = $request->contentUpload;
        $galleryImages = $request->galleryImages;
        if ($logoFiles != null) {
          foreach ($logoFiles as $logoFile) {
            $businessAttachment = new BusinessAttachment;
            $businessAttachment->path = $logoFile->store('logoUpload');
            $businessAttachment->type = 1;
            $businessAttachment->createdBy = Auth::id();
            $businessAttachment->save();
          }
        }
        if ($contentUpload != null) {
            $businessAttachment = new BusinessAttachment;
            $businessAttachment->path = $contentUpload->store('contentUpload');
            $businessAttachment->type = 2;
            $businessAttachment->createdBy = Auth::id();
            $businessAttachment->save();
        }

        if ($galleryImages != null) {
          foreach ($galleryImages as $galleryImage) {
            $businessAttachment = new BusinessAttachment;
            $businessAttachment->path = $galleryImage->store('galleryImages');
            $businessAttachment->type = 3;
            $businessAttachment->createdBy = Auth::id();
            $businessAttachment->save();
          }
        }
        self::insertWizered('wizered', 'allDone');

        return redirect('supportPortalHome');
    }



    public static function getWizered($data)
    {
        $wizerd = Wizered::query();
        $wizerd = $wizerd->where('userId', Auth::id());

        if (is_array($data)) {
            $wizerd = $wizerd->where(function ($q)use($data) {
                foreach ($data as $value) {
                    $q->orWhere('key', $value);
                }
            });
        } else {
            $wizerd = $wizerd->where('key', $data);
        }
        return $wizerd->get();
    }
    public static function insertWizered($key, $value)
    {
        Wizered::where('userId', Auth::id())->where('key', $key)->delete();

        $wizered = new Wizered;
        $wizered->userId = Auth::id();
        $wizered->key = $key;
        $wizered->value = $value;
        $wizered->save();
    }
}
