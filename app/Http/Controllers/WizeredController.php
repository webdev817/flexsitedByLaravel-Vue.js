<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessAttachment;
use App\DesignCategory;
use StripeHelper;
use App\Wizered;
use App\Design;
use App\Coupon;
use App\Order;
use App\Project;

use App\User;
use Auth;

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

        $plans = flexsitedPlans();

        return view('welcomeWizered.main', compact('currentStep', 'plans'));
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

        $year = (int)$request->y;

        $params = [$packegeNumber];

        if ($year != null) {
            $params['y'] = $year;
            self::insertWizered("y", $year);
        }
        return redirect()->route('planAndBilling', $params);
    }
    public function planAndBilling(Request $request, $planNumber)
    {
        $currentStep = 4;

        $user = $request->user();


        $intent = $user->createSetupIntent();

        $plans = flexsitedPlans();

        $plan = $plans[$planNumber - 1];

        return view('welcomeWizered.main', compact('currentStep', 'planNumber', 'intent', 'plans', 'plan'));
    }
    public function businessInformation(Request $request)
    {
        $currentStep = 5;
        $selectedWebsitePackege = self::getWizered('selectedWebsitePackege')->first()->value;
        $pages = 0;
        if ($selectedWebsitePackege == 1) {
            $pages = 1;
        } elseif ($selectedWebsitePackege == 2) {
            $pages = 3;
        } elseif ($selectedWebsitePackege == 3) {
            $pages = 5;
        } else {
            $pages = 10;
        }

        return view('welcomeWizered.main', compact('currentStep', 'pages'));
    }
    public function storeBilling(Request $request)
    {
        $request->validate(
            [
            'paymentMethod'=>'required'
            ]
        );

        $coupon = null;
        if ($request->couponCode != null) {
            $coupon = Coupon::where('code', $request->couponCode)->where('status', 1)->first();
            if ($coupon != null) {
                self::insertWizered('couponUsedId', $coupon->id);
            }
        }
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
            if ($coupon == null || $coupon->freeLogo != 1) {
                $stripeChargeAmount = 100;
            }
            $stripeChargeMessage = "Logo Design  ";
            self::createOrder(0);
        }
        $businessCardDesign = $request->businessCardDesign;
        if ($businessCardDesign == "on") {
            self::insertWizered("businessCardDesign", $businessCardDesign);

            if ($coupon == null || $coupon->freeBusinessCard != 1) {
                $stripeChargeAmount = $stripeChargeAmount + 150;
            }

            $stripeChargeMessage .= "Business Card Design  ";
            self::createOrder(2);
        }
        $flayerDesign = $request->flayerDesign;
        if ($flayerDesign == "on") {
            self::insertWizered("flayerDesign", $flayerDesign);
            if ($coupon == null || $coupon->freeFlayer != 1) {
                $stripeChargeAmount = $stripeChargeAmount + 200;
            }
            $stripeChargeMessage .= "Flayer Design    ";

            self::createOrder(1);
        }
        $stripeChargeAmount = $stripeChargeAmount * 100; // cents to dollers



        self::insertWizered("planId", $planId);
        self::insertWizered("planDurration", $planDurration);
        self::insertWizered("currentStep", 5);

        self::insertWizered('stripeChargeAmount', $stripeChargeAmount);
        self::insertWizered('stripeChargeMessage', $stripeChargeMessage);

        // charge user for logo site design and flyer
        if ($stripeChargeAmount > 0) {
            $chargeStatus = StripeHelper::chargeForFlexSited($stripeChargeAmount, $stripeChargeMessage);
            if ($chargeStatus->status == 3) {
                self::insertWizered("charged", 'inComplete');
                return $chargeStatus->response;
            }
            if ($chargeStatus->status == 0) {
                self::insertWizered("charged", $chargeStatus->message);
                return errorMessage($chargeStatus->message);
            }
            self::insertWizered("chargeInvoiceId", $chargeStatus->stripeCharge->id);

            self::insertWizered("charged", 'complete');
        } else {
            self::insertWizered("charged", 'NotNeeded');
        }


        // subscribe to plan
        try {
            $obj = StripeHelper::subscribeToPlan($user, $planId, $coupon);
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
        self::createOrder(4);
        self::insertWizered("subscribe", 'complete');



        if ($obj->status == 1 && isset($obj->subscription)) {
            return redirect()->route('businessInformation')->with('status', 'Subscription successfull');
        }
    }
    public function incompletePaymentCompleted(Request $request)
    {
        $data = self::getWizered(['subscribe', 'charged','planId']);

        $chargeStatus = $data->where('key', 'charged')->first();

        if ($chargeStatus == null) {
            $data1 = self::getWizered(['stripeChargeAmount', 'stripeChargeMessage']);
            $stripeChargeAmount = $data1->where('key', 'stripeChargeAmount')->first()->value;
            $stripeChargeMessage = $data1->where('key', 'stripeChargeMessage')->first()->value;

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
            self::insertWizered("chargeInvoiceId", $chargeStatus->stripeCharge->id);
        }
        $user = Auth::user();
        // subscribe to plan
        $subscribe = $data->where('key', 'subscribe')->first();

        if ($subscribe == null) {
            try {
                $planId = $data->where('key', 'planId')->first()->value;

                $coupon = null;
                $tempData = self::getWizered(['couponUsedId']);
                $tempData = $tempData->first();

                if ($tempData != null) {
                    $couponId = $tempData->value;
                    $coupon = Coupon::find($couponId);
                }

                $obj = StripeHelper::subscribeToPlan($user, $planId, $coupon);

                if ($obj->status == 0) {
                    self::insertWizered("subscribe", $e->getMessage());
                    return errorMessage($obj->message);
                }
                if ($obj->status == 3) {
                    self::insertWizered("subscribe", 'inComplete');
                    return $obj->response;
                }
                self::createOrder(4);
            } catch (\Exception $e) {
                self::insertWizered("subscribe", $e->getMessage());
                return errorMessage($e->getMessage());
            }
        }


        self::insertWizered("subscribe", 'complete');

        return redirect()->route('businessInformation')->with('status', 'Subscription successfull');
    }

    public function makeValidationForBusinessInformation()
    {
        $rules = [
        'logoUpload.*' => 'nullable|mimes:jpg,jpeg,png,bmp,zip|max:15000',
        'galleryImages.*' => 'nullable|mimes:jpg,jpeg,png,bmp,zip|max:15000',
        'contentUpload' => 'nullable|max:25000|mimes:doc,pdf,docx,zip',

        'contentUploadForFlyer' => 'nullable|max:25000|mimes:doc,pdf,docx,zip',
        'flayerColorPrefernce' => 'nullable|string|max:255',
        'imagesandlogoForFlyer.*' => 'nullable|mimes:jpg,jpeg,png,bmp,zip|max:15000',

        'nameofCompanyForLog'=> 'nullable|string|max:255',
        'taglineSlogan'=> 'nullable|string|max:255',
        'logoColorPrefernce'=> 'nullable|string|max:255',
        'textandImageOrText'=> 'nullable|string|max:255',
        'logoFontPrefernce'=> 'nullable|string|max:255',
        'logoExamples.*' => 'nullable|mimes:jpg,jpeg,png,bmp,zip|max:15000',

        'contentUploadForFlyer' => 'nullable|max:25000|mimes:doc,pdf,docx,zip',
        'flayerColorPrefernce'=> 'nullable|string|max:255',
        'imagesandlogoForFlyer.*' => 'nullable|mimes:jpg,jpeg,png,bmp,zip|max:15000',

        'frontandbackdesign'=> 'nullable|string|max:255',
        'contentFront' => 'nullable|max:25000|mimes:doc,pdf,docx,zip',
        'contentBack' => 'nullable|max:25000|mimes:doc,pdf,docx,zip',
        'businesssCardColorPrefernce'=> 'nullable|string|max:255',
        'logoImagesAndLogo.*' => 'nullable|mimes:jpg,jpeg,png,bmp,zip|max:15000',


      ];

        $messages = [
        'logoUpload.*.mimes' => 'Only jpeg,png and bmp images or zip are allowed',
        'logoUpload.*.max' => 'Sorry! Maximum allowed size can be 15MB',
        'galleryImages.*.mimes' => 'Only jpeg,png and bmp images or zip are allowed',
        'galleryImages.*.max' => 'Sorry! Maximum allowed size can be 15MB',

        'logoExamples.*.max' => 'Sorry! Maximum allowed size can be 15MB',

        'imagesandlogoForFlyer.*.max' => 'Sorry! Maximum allowed size can be 15MB',
        'logoImagesAndLogo.*.max' => 'Sorry! Maximum allowed size can be 15MB',
      ];
        return [$rules, $messages];
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
        $providingContent = $request->providingContent;
        $howfindus = $request->howfindus;



        $arr = $this->makeValidationForBusinessInformation();
        $request->validate($arr[0], $arr[1]);


        self::insertWizered('businessName', $businessName);
        self::insertWizered('businessPhoneNumber', $businessPhoneNumber);
        self::insertWizered('businessAddress', $businessAddress);
        self::insertWizered('hoursOfOperation', $hoursOfOperation);
        self::insertWizered('whatBeautyServicesDoYouOffer', $whatBeautyServicesDoYouOffer);
        self::insertWizered('appointment', $appointment);
        self::insertWizered('socialMediaHandles', $socialMediaHandles);
        self::insertWizered('pageSelected', $hiddenPageSelected);


        self::insertWizered('providingContent', $providingContent);
        self::insertWizered('howfindus', $howfindus);

        self::valueToDB('nameofCompanyForLog');
        self::valueToDB('taglineSlogan');
        self::valueToDB('logoColorPrefernce');
        self::valueToDB('textandImageOrText');
        self::valueToDB('logoFontPrefernce');
        // logoExamples[]

        // contentUploadForFlyer
        self::valueToDB('flayerColorPrefernce');
        // imagesandlogoForFlyer[]

        self::valueToDB('frontandbackdesign');
        self::valueToDB('businesssCardColorPrefernce');



        $this->saveWizFiles('logoUpload', 1, 'multiple');
        $this->saveWizFiles('contentUpload', 2, 'multiple');
        $this->saveWizFiles('galleryImages', 3, 'multiple');

        $this->saveWizFiles('logoExamples', 4, 'multiple');
        $this->saveWizFiles('contentUploadForFlyer', 5, 'single');
        $this->saveWizFiles('imagesandlogoForFlyer', 6, 'multiple');
        $this->saveWizFiles('contentFront', 7, 'single');
        $this->saveWizFiles('contentBack', 8, 'single');
        $this->saveWizFiles('logoImagesAndLogo', 9, 'multiple');






        self::insertWizered('wizered', 'allDone');

        return redirect('supportPortalHome');
    }


    public static function getWizered($data)
    {
        $wizerd = Wizered::query();
        $wizerd = $wizerd->where('userId', Auth::id());

        if (is_array($data)) {
            $wizerd = $wizerd->where(function ($q) use ($data) {
                foreach ($data as $value) {
                    $q->orWhere('key', $value);
                }
            });
        } else {
            $wizerd = $wizerd->where('key', $data);
        }
        return $wizerd->get();
    }

    public static function createOrder($type)
    {
        $orders = getSupportOrders();

        $order = $orders[$type];
        $price = $order->price;
        if ($type == 4) {
            $price = 0;

            $planNohai = Wizered::where('key', 'selectedWebsitePackege')->where('userId', Auth::id())->first()->value;
            $durration = Wizered::where('key', 'planDurration')->where('userId', Auth::id())->first()->value;
            if ($planNohai != null) {
                $plans = flexsitedPlans($planNohai);
                $plan =  $plans[$planNohai - 1];
                if ($plan != null) {
                    if ($durration != null && $durration == "y") {
                        $price = $plan->priceYearly;
                    } else {
                        $price = $plan->price;
                    }
                }
            }
        }
        $myOrder = new Order([
        'type'=> $type,
        'title'=> $order->title,
        'price'=> $price,
        'orderDetails'=> '',
        'createdBy'=> Auth::id()
      ]);
        $myOrder->save();

        $project = new Project([
        'orderId'=> $myOrder->id,
        'title'=> $myOrder->title,
        'description'=> $myOrder->orderDetails,
        'createdBy'=> Auth::id()
      ]);
        $project->save();
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
    public static function valueToDB($key, $value = null)
    {
        Wizered::where('userId', Auth::id())->where('key', $key)->delete();
        $wizered = new Wizered;
        $wizered->userId = Auth::id();
        $wizered->key = $key;
        if ($value) {
            $wizered->value = request($value);
        } else {
            $wizered->value = request($key);
        }
        $wizered->save();
    }
    public function clientOnBoardingEdit(Request $request, $userId)
    {
        $invoices = null;

        $user = User::findOrFail($userId);

        $array = [ 'user' => $user ,
                 'mainSubscription'=> $user->subscription('main'),
                 'wizeredObj'=> getWizeredObj($user->id),
              ];



        return view('admin.users.editClientOnBoarding', $array);
    }
    public function saveWizFiles($key, $type, $singleOrMultiple = "single")
    {
        $businessAttachment = new BusinessAttachment;
        $businessAttachment->type = $type;
        $businessAttachment->createdBy = Auth::id();

        // handling multiple first
        if ($singleOrMultiple != "single") {
            $files = request($key);
            if ($files != null) {
                foreach ($files as $logoFile) {
                    $businessAttachment->path = $logoFile->store($type);
                    $businessAttachment->save();
                }
            }
        } else {
            $file = request($key);
            if ($file != null) {
              $businessAttachment->path = $file->store($type);
              $businessAttachment->save();
            }
        }
    }
    public function clientOnBoardingStore(Request $request)
    {
        $arr = [
        "businessName",
        "businessPhoneNumber",
        "businessAddress",
        "hoursOfOperation",
        "whatBeautyServicesDoYouOffer",
        "appointment",
        "socialMediaHandles",
        "domain"
      ];
        $userId = $request->userId;

        foreach ($arr as $key => $value) {
            $input = $request->$value;
            if ($input != null) {
                self::insertWizeredByUser($value, $input, $userId);
            }
        }

        $pageSelected = $request->pageSelected;
        $pageSelected = implode(",", $pageSelected);

        self::insertWizered('pageSelected', $pageSelected, $userId);
        return statusTo('Data update successfull', route('clientOnBoarding', $userId));
    }

    public static function insertWizeredByUser($key, $value, $userId)
    {
        Wizered::where('userId', $userId)->where('key', $key)->delete();

        $wizered = new Wizered;
        $wizered->userId = $userId;
        $wizered->key = $key;
        $wizered->value = $value;
        $wizered->save();
    }
}
