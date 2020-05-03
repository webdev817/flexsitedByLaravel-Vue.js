<?php
function getFunInfo($fun) {
  $reflFunc = new \ReflectionFunction($fun);
  dd(
    $reflFunc
  );
  print $reflFunc->getFileName() . ':' . $reflFunc->getStartLine();
}
function setting($key, $default = null)
{
    $setting = App\Setting::where('userId', Auth::id())->where('key', $key)->first();
    if ($setting == null) {
        return $default;
    }
    return $setting->value;
}
function newNoti($type ,$title,$description ,$redirectUrl, $forUser, $redirectRoute = null) {
  App\Notification::create([
    'type' => $type,
    'title'=> $title,
    'description'=> $description,
    'redirectURL' => $redirectUrl,
    'redirectRoute'=> $redirectRoute,
    'forUser'=>$forUser
  ]);
}
function getNotifcations($limit = 10) {
  $obj = new \stdClass;
  $obj->notification = App\Notification::limit($limit)->get();
  $obj->hasNew = $obj->notification->where('status',0)->count();
  $obj->new = $obj->notification->where('status',0);
  $obj->old = $obj->notification->where('status',1);
  $obj->hasOld = $obj->notification->where('status',1)->count();

  $obj->hasNotification = $obj->notification->count();
  return $obj;
}
function fileInfo($file)
{
  return (object)pathinfo($file);
}
function fileInfoWithClassObj($file)
{
  $obj = fileInfo($file);
  $obj->fullName = $obj->filename . ".$obj->extension";

  $obj->size = filesize_formatted($file);

  $obj->class = "fas fa-file";

  if (in_array($obj->extension, ['jpeg', 'jpg', 'png', 'bmp', 'tiff', 'gif'])) {
    $obj->class = "fas fa-file-image";
  }
  if (in_array($obj->extension, ['zip'])) {
    $obj->class = "fas fa-file-archive";
  }
  if (in_array($obj->extension, ['doc', 'docx'])) {
    $obj->class = "fas fa-file-word";
  }
  if (in_array($obj->extension, ['pdf'])) {
    $obj->class = "fas fa-file-pdf";
  }
  return $obj;
}
function filesize_formatted($path)
{
    $size = filesize($path);
    $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}
function requestIs($path, $retClass = 'active')
{
    if (request()->route()->getName() == $path || request()->is($path) || request()->is($path ."/*")) {
        return $retClass;
    }
}
function obj($status = 1, $message = 'Something went wrong!', $dataFor = 'data', $data = null) {
  $obj = new \stdClass;
  $obj->message = $message;
  $obj->$dataFor = $data;

  if ($status == 1) {
    $obj->status = 1;
  }else {
    $obj->status = 0;
  }

  return $obj;
}
function requestIsFromArray($arr, $retClass = 'active')
{
    foreach ($arr as $path) {
        if (request()->route()->getName() == $path || request()->is($path) || request()->is($path ."/*")) {
            return $retClass;
        }
    }
}
function noPermission()
{
    return errorMessage("You don't have permission to do this operation");
}
function setSetting($key, $value)
{
    App\Setting::where('userId', Auth::id())->where('key', $key)->delete();
    return App\Setting::insert([
    'userId'=>Auth::id(),
    'key'=>$key,
    'value'=> $value
  ]);
}
function isWizeredDone()
{
    if (App\Wizered::where('userId', Auth::id())->where('key', 'wizered')->first() == null) {
        return false;
    }
    return true;
}
function sendSignUpEmail(array $data)
{
    $email = $data['email'];
    \Mail::to($email)->send(new App\Mail\SignUpMail($data));
}
function sendInvoicePaidEmail(array $data)
{
    $email = $data['email'];
    \Mail::to($email)->send(new App\Mail\InvoiceEmail($data));
}
function storeDataToDisk($data) {
  $data = serialize($data);
  file_put_contents('tempSerilizedData',$data);
}
function getDataFromDisk() {
  $data = file_get_contents('tempSerilizedData');
  $data = unserialize($data);
  // dd(
  //   $data
  // );
  return $data;
}
function json($message, $data = null)
{
    return response()->json(
        [
        'status'=>1,
        'message'=> $message,
        'data'=> $data
        ]
    );
}
function myConf($name)
{
    return config('mawaisnow.' . $name);
}

function error($message, $data = null)
{
    return response()->json(
        [
        'status'=>0,
        'message'=> $message,
        'data'=>$data
        ]
    );
}

function sendInvoicedSignUpEmail(array $data)
{
    $email = $data['email'];
    \Mail::to($email)->send(new App\Mail\SignupInvoicedEmail($data));
}
function sendAccountApprovedEmail(array $data)
{
    $email = $data['email'];
    \Mail::to($email)->send(new App\Mail\AccountApproved($data));
}
function sendInvoicedSignUpEmailToAdmin(array $data)
{
    $email = $data['email'];
    \Mail::to('mawaisnow@gmail.com')->send(new App\Mail\SignupInvoicedEmailToAdmin($data));
}

function sendGeneralOrderPlacedEmail(array $data)
{
    $email = $data['email'];
    \Mail::to($email)->bcc(
        [
        'mawaisnow@gmail.com'
        ]
    )->send(new App\Mail\GeneralOrderPlaced($data));
}

function sendGeneralEmployeeAddedEmail(array $data)
{
    $email = $data['email'];
    \Mail::to($email)->bcc(
        [
        'mawaisnow@gmail.com'
        ]
    )->send(new App\Mail\GeneralEmployeeAdded($data));
}

function sendOrderPlacedEmail(array $data)
{
    $email = $data['email'];
    \Mail::to($email)->bcc(
        [
        'mawaisnow@gmail.com'
        ]
    )->send(new App\Mail\OrderPlacedMail($data));
}
function sendOrderCompletedEmail(array $data)
{
    $email = $data['email'];
    \Mail::to($email)->bcc(
        [
        'mawaisnow@gmail.com'
        ]
    )->send(new App\Mail\OrderCompleted($data));
}

function sendPaymentFailedEmail(array $data)
{
    $email = $data['email'];
    \Mail::to($email)->bcc(
        [
        'mawaisnow@gmail.com'
        ]
    )->send(new App\Mail\PaymentFailedMail($data));
}

function poolChangeRequestEmail(array $data)
{
    $email = $data['email'];
    \Mail::to($email)->bcc(
        [
        'mawaisnow@gmail.com'
        ]
    )->send(new App\Mail\PoolChangeRequestEmail($data));
}
function poolChangeRequestApproved(array $data)
{
    $email = $data['email'];
    \Mail::to($email)->bcc(
        [
        'mawaisnow@gmail.com'
        ]
    )->send(new App\Mail\PoolChangeRequestApproved($data));
}





function unixtoDate($timestamp)
{
    if ($timestamp == null) {
        return '';
    }
    $carbon = \Carbon\Carbon::createFromTimestamp($timestamp);
    return $carbon->format('F d, Y');
}
function dateTimeToFormatedDate($timestamp)
{
    if ($timestamp == null) {
        return '';
    }
    $carbon = \Carbon\Carbon::parse($timestamp);
    return $carbon->format('F d, Y');
}

function saveLog($logData)
{
    try {
        if (!is_valid_json($logData)) {
            $logData = json_encode($logData);
        }
    } catch (\Exception $e) {
        $logData = $e->getMessage();
    }



    $log = new \App\MyLog;
    $log->details = $logData;
    $log->save();
}
function errorMessage($message)
{
    return redirect()->back()->withInput()->withErrors([$message]);
}
function redirectTo($url)
{
    return redirect($url)->withInput();
}

function getClassMethodsName($classObjectOrName)
{
    $names = get_class_methods($classObjectOrName);
    ddd(
        $names
    );
}

function status($message)
{
    return redirectBackWith('status', $message);
}
function statusTo($status, $to)
{
  return redirect($to)->with('status', $status)->withInput();
}
function redirectBackWith($key, $value)
{
    return redirect()->back()->with($key, $value);
}
function superAdmin()
{
    if (\Auth()->user()->role == 9) {
        return true;
    }
    return false;
}
function isSuperAdmin()
{
    if (\Auth()->user()->role == 9) {
        return true;
    }
    return false;
}
function isAuthorizedToModify($id)
{
    if (\Auth::id() == $id || superAdmin()) {
        return true;
    }
    return false;
}

function pasteVal($actual, $old)
{
    if (old($old) != null) {
        return old($old);
    }
    return $actual;
}
function isRouteName($name)
{
    if (request()->route()->getName() == $name) {
        return true;
    }
    return false;
}

function userUpdate($data)
{
    $userId = Auth::id();
    \App\User::where('id', $userId)->update($data);
}
function subscribeUserToPlan($plan)
{
    $obj = new \stdClass;
    try {
        request()->user()->newSubscription($plan, $plan)->create();
        $obj->status = 1;
        userUpdate(
            [
            'isBillingError'=>0,
            'billingError'=>null
            ]
        );
        return $obj;
    } catch (\Exception $e) {
        $message = $e->getMessage();
        userUpdate(
            [
            'isBillingError'=>1,
            'billingError'=>$message
            ]
        );
        $obj->status = 0;
        $obj->message = $message;
        return $obj;
    }
}
function updateCard($token)
{
    $obj = new \stdClass;
    $user = request()->user();
    try {
        $user->updateCard($token);
        $obj->status = 1;
        userUpdate(
            [
            'isBillingError'=>0,
            'billingError'=>null
            ]
        );
        return $obj;
    } catch (\Exception $e) {
        $message = $e->getMessage();
        userUpdate(
            [
            'isBillingError'=>1,
            'billingError'=>$message
            ]
        );
        $obj->status = 0;
        $obj->message = $message;
        return $obj;
    }
}
function writeJson($data, $file = '')
{
    $file = date('Y_m_d_H_i_s_A') ."_". $file ."_". ".json";
    \Storage::disk('logs')->put($file, $data);
}
function writeToFile($text, $file = "file", $ext = "txt", $replace = 0)
{
    if ($replace) {
        \Storage::disk('logs')->put($file.'.'.$ext, $text);
    } else {
        \Storage::disk('logs')->put($file.'.'.$ext, $text);
    }
}



function generateCSV($data, $headings)
{
    $csvExporter = new \Laracsv\Export();
    $csvExporter->build($data, $headings);

    return $csvExporter->download();
}


function getAmericaStates()
{
    return [

      "AK" =>    "Alaska",
      "AL" =>    "Alabama",
      "AR" =>    "Arkansas",
      "AZ" =>    "Arizona",
      "CA" =>    "California",
      "CO" =>    "Colorado",
      "CT" =>    "Connecticut",
      "DC" =>    "District of Columbia",
      "DE" =>    "Delaware",
      "FL" =>    "Florida",
      "GA" =>    "Georgia",
      "HI" =>    "Hawaii",
      "IA" =>    "Iowa",
      "ID" =>    "Idaho	",
      "IL" =>    "Illinois	",
      "IN" =>    "Indiana",
      "KS" =>    "Kansas",
      "KY" =>    "Kentucky",
      "LA" =>    "Louisiana",
      "MA" =>    "Massachusetts",
      "MD" =>    "Maryland",
      "ME" =>    "Maine",
      "MI" =>    "Michigan",
      "MN" =>    "Minnesota",
      "MO" =>    "Missouri",
      "MS" =>    "Mississippi",
      "MT" =>    "Montana",
      "NC" =>    "North Carolina",
      "ND" =>    "North Dakota",
      "NE" =>    "Nebraska",
      "NH" =>    "New Hampshire",
      "NJ" =>    "New Jersey",
      "NM" =>    "New Mexico",
      "NV" =>    "Nevada",
      "NY" =>    "New York",
      "OH" =>    "Ohio",
      "OK" =>    "Oklahoma",
      "OR" =>    "Oregon",
      "PA" =>    "Pennsylvania",
      "RI" =>    "Rhode Island",
      "SC" =>    "South Carolina",
      "SD" =>    "South Dakota",
      "TN" =>    "Tennessee",
      "TX" =>    "Texas",
      "UT" =>    "Utah",
      "VA" =>    "Virginia",
      "VT" =>    "Vermont",
      "WA" =>    "Washington",
      "WI" =>    "Wisconsin",
      "WV" =>    "West Virginia",
      "WY" =>    "Wyoming"


    ];
}
function is_valid_json($raw_json)
{
    try {
        return (json_decode($raw_json, true) == null) ? false : true ; // Yes! thats it.
    } catch (\Exception $e) {
        return false;
    }
}

function getRandomStr($str = '')
{
    $rnd = Illuminate\Support\Str::random(40);
    ;
    return $rnd . $str;
}

function dev()
{
    if (session('dev')) {
        return true;
    }
    if (request()->cookie('dev')) {
        return true;
    }
    return false;
}

function getWizeredObj($userId)
{
    $fields = [
      'domain', 'currentStep', 'selectedDesign', 'selectedWebsitePackege', 'logoDesign', 'businessCardDesign', 'flayerDesign', 'planId','stripeChargeAmount',
      'stripeChargeAmount', 'charged', 'subscribe','businessName','businessPhoneNumber','businessAddress','hoursOfOperation','whatBeautyServicesDoYouOffer',
      'appointment','socialMediaHandles','pageSelected','providingContent','howfindus','wizered', 'chargeInvoiceId', 'couponUsedId'
    ];
    $wizerd = App\Wizered::query();
    $wizerd = $wizerd->where('userId', $userId);


    $wizerd = $wizerd->where(function ($q) use ($fields) {
        foreach ($fields as $value) {
            $q->orWhere('key', $value);
        }
    });

    $data = $wizerd->get();

    $obj = new \stdClass;
    foreach ($fields as $key) {
      $temp = $data->where('key',$key)->first();
      if ($temp != null) {
        $obj->$key = $temp->value;
      }else {
        $obj->$key = '';
      }
    }

    $obj->selectedDesignObj = null;
    if ($obj->selectedDesign != null) {
      $obj->selectedDesignObj = App\Design::where('id',$obj->selectedDesign)->first();
    }
    $obj->logoUpload = App\BusinessAttachment::where('createdBy',$userId)->where('type',1)->get();
    $obj->contentUpload = App\BusinessAttachment::where('createdBy',$userId)->where('type',2)->get();
    $obj->galleryImages = App\BusinessAttachment::where('createdBy',$userId)->where('type',3)->get();

    return $obj;
}
function strToCapitalize($str) {
  return ucfirst(strtolower($str));
}
function getSubscription($userId, $subscriptionId) {
  $subscription = \App\Subscription::where('user_id',$userId)->where('stripe_id',$subscriptionId)->first();
  if ($subscription == null) {
    return null;
  }
  $subscription->title = '-';
  if ($subscription->name == "main") {
    $subscription->title = "Main Website Subscription";
  }else {
    $orderId = $subscription->name;
    $order = \App\Order::find($orderId);
    $subscription->order = $order;
    try {
      $subscription->title = $order->title;
    } catch (\Exception $e) {

    }

  }
  return $subscription;
}
function getOrderById($orderId)
{
  $order = \App\Order::where('id',$orderId)->first();
  return $order;
}
function getOrderByInvoiceId($invoiceId) {

    $order = \App\Order::where('invoiceNumber',$invoiceId)->first();
    if ($order == null) {
        return null;
    }
    return $order;
}
function flexsitedPlans() {
  $plans = [
    (object)[
      'id'=> 1,
      'name'=> 'basic plan',
      'price'=> 39.95,
      'priceYearly'=> 360,
      'image'=> 'mawaisnow/sp/plan/Group 18@2x.png',
      'offers'=> [
        '1 page custom website ',
        'SOCIAL MEDIA LINKS ICONS',
        'booking link ',
        'Stock Images '
      ]
    ],
    (object)[
      'id'=>2,
      'name'=> 'ESSENTIAL Plan',
      'price'=> 59.95,
      'priceYearly'=> 600,
      'image'=> 'mawaisnow/sp/plan/Group 167@2x.png',
      'offers'=> [
        '3 page custom website',
        'HOME PAGE SLIDER',
        'SOCIAL MEDIA LINKS INTEGRATION',
        'booking link',
        '1 business email',
        'stock images'
      ]
    ],
    (object)[
      'id'=>3,
      'name'=> 'Active Plan',
      'price'=> 79.95,
      'priceYearly'=> 850,
      'image'=> 'mawaisnow/sp/plan/Path 1920@2x.png',
      'offers'=> [
        '5 page custom website',
        'HOME PAGE SLIDER',
        'SOCIAL MEDIA LINKS INTEGRATION',
        'booking integration',
        '5 business emails',
        'logo design',
        'stock images',
        'blog',
        'photo gallery',
        'instagram feed',
        'newsletter setup',
        'GOOLGE BUSINESS SETUP'
      ]
    ],
    (object)[
      'id'=>4,
      'name'=> 'Complete Plan',
      'price'=> 129.95,
      'priceYearly'=> 1450,
      'image'=> 'mawaisnow/sp/plan/Group 7@2x.png',
      'offers'=> [
        '10 page custom website',
        'HOME PAGE SLIDER',
        'SOCIAL MEDIA LINKS INTEGRATION',
        'booking integration',
        'unlimited BUSINESS',
        'emails',
        'logo design',
        'stock images',
        'blog',
        'photo gallery',
        'instagram feed',
        'Newsletter setu',
        'Google Analytic',
        'Google Map',
        'SEO ON PAGE SETUP',
        'SHOPPING CART',
        'Payment Gateway setup'
      ]
    ]
  ];
  return $plans;
}
function getSupportOrders($orderType = null) {
  $orders = [
    (object)[
      'title'=> 'Logo Design',
      'price'=> 150,
      'img'=> 'mawaisnow\sp\order\logoOrder.png',
      'description'=> 'We will design a professional logo for your business. You will receive two design concepts for your review and feedback.Once you have decided on the design that you would like to go with. The revisions process starts. You will have three revision opportunities. Below please add the details for your design project.'
    ],
    (object)[
      'title'=> 'Flyer Design',
      'price'=> 200,
      'img' => 'mawaisnow\sp\order\6.jpg',
      'description'=> 'We will design a professional one-page flyer for your business.  You will receive one design concept based on provided instructions.  You will have three revision opportunities.  Below please add the details for your design project.'
    ],
    (object)[
      'title'=> 'Business Card Design',
      'price'=> 150,
      'img' => 'mawaisnow\sp\order\Amazing Lash Loft-1.jpg',
      'description'=> 'We will design a set of professional business cards for your business. This includes both front and back.  You will receive two design concepts for your review and feedback.  You will have three revision opportunities.   In the box below, add the details for your design project.'
    ],
    (object)[
      'title'=> 'Social Media Design',
      'price'=> 150,
      'img' => 'mawaisnow/sp/order/socialmediaexample.jpg',
      'description'=> 'We will design your social media banner and profile for any channel or two social media design posts for either Facebook or Instagram for your business.  You will receive one design concept based on your instructions. You will have three revision opportunities. In the box below, add the details for your design project.'
    ],
    (object)[
      'title'=> 'Website Design',
      'price'=> "39-129 a month",
      'img' => 'mawaisnow\sp\order\Screen Shot 2020-04-20 at 11.29.10 AM.png',
      'description'=> 'We will create a new website for your business. You have the option of choosing from one of our monthly plans. '
    ]
  ];

  if ($orderType === null) {
      return $orders;
  }
  if (isset($orders[$orderType])) {
      return $orders[$orderType];
  }
  return null;
}
