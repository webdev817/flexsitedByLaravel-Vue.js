<?php
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
function json($message, $data)
{
    return response()->json(
        [
        'status'=>1,
        'message'=> $message,
        'data'=> $data
        ]
    );
}
function myConf($name){
  return config('mawaisnow.' . $name);
}

function error($message, $data)
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
function redirectBackWith($key,$value)
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
function isAuthorizedToModify($id)
{
    if (\Auth::id() == $id || superAdmin()) {
        return true;
    }
    return false;
}

function pasteVal($actual,$old)
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
function requestIs($path)
{
    if (request()->route()->getName() == $path || request()->is($path) || request()->is($path ."/*")) {
        return 'active';
    }
}
function requestIsFromArray($arr)
{
    foreach ($arr as $path) {
        if (request()->route()->getName() == $path || request()->is($path) || request()->is($path ."/*")) {
            return 'active';
        }
    }
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
function writeJson($data,$file = '')
{
    $file = date('Y_m_d_H_i_s_A') ."_". $file ."_". ".json";
    \Storage::disk('logs')->put($file, $data);
}
function writeToFile($text,$file = "file",$ext = "txt",$replace = 0)
{
    if ($replace) {
        \Storage::disk('logs')->put($file.'.'.$ext, $text);
    } else {
        \Storage::disk('logs')->put($file.'.'.$ext, $text);
    }
}



function generateCSV($data ,$headings)
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
function is_valid_json( $raw_json )
{
    try {
        return ( json_decode($raw_json, true) == null ) ? false : true ; // Yes! thats it.
    } catch (\Exception $e) {
        return false;
    }

}

function getRandomStr($str = '')
{
    $rnd = Illuminate\Support\Str::random(40);;
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
