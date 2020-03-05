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


        try {
            $obj = StripeHelper::subscribeToPlan($user, $paymentMethod, $planId);

            if ($obj->status == 0) {
                return errorMessage($obj->message);
            }
            $subscription = $obj->subscription;
        } catch (\Exception $e) {
            return errorMessage($e->getMessage());
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

        $chargeStatus = StripeHelper::chargeForFlexSited($paymentMethod, $stripeChargeAmount, $stripeChargeMessage);


        if ($chargeStatus->status == 0) {
            return errorMessage($chargeStatus->message);
        }


        self::insertWizered("planId", $planId);
        self::insertWizered("currentStep", 5);



        // in case if subscription is IncompletePayment
        if ($obj->status == 3) {
            return $obj->response;
        }

        if ($obj->status == 1 && isset($obj->subscription)) {
            return redirect()->route('businessInformation')->with('status', 'Subscription successfull');
        }
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
        foreach ($logoFiles as $logoFile) {
          $businessAttachment = new BusinessAttachment;
          $businessAttachment->path = $logoFile->store('logoUpload');
          $businessAttachment->type = 1;
          $businessAttachment->createdBy = Auth::id();
          $businessAttachment->save();
        }
        if ($contentUpload != null) {
          $businessAttachment = new BusinessAttachment;
          $businessAttachment->path = $contentUpload->store('contentUpload');
          $businessAttachment->type = 2;
          $businessAttachment->createdBy = Auth::id();
          $businessAttachment->save();
        }

        foreach ($galleryImages as $galleryImage) {
          $businessAttachment = new BusinessAttachment;
          $businessAttachment->path = $galleryImage->store('galleryImages');
          $businessAttachment->type = 3;
          $businessAttachment->createdBy = Auth::id();
          $businessAttachment->save();
        }

        echo "done";
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
