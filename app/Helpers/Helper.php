<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use stdClass;
use Carbon\Carbon;
use App\Setting;

class Helper
{
    public static function addhttp($url)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }


    public static function domainSearch($q)
    {
        $result = self::getDomainNameAPIClient()->CheckAvailability([$q], [
          'com','net','org','io','co', 'ca','edu', 'app'

        ], "1", "create");

        return self::handleResult($result,'search');
    }

    public static function basicHeader()
    {

    }

    public static function error($message, $data)
    {
        return response()->json(
            [
            'status'=>0,
            'message'=> $message,
            'data'=>$data
            ]
        );
    }
    public static function json($message, $data)
    {
        return response()->json(
            [
            'status'=>1,
            'message'=> $message,
            'data'=> $data
            ]
        );
    }





    public static function handleResult($response,$method){
      if ($response == null) {
        return error('Error while trying to search',[
          'data'=>$response
        ]);
      }


      // checking if operation was success or falied
      if (isset($response->CheckAvailabilityResult->OperationResult)) {

        // true we have got something
        if ($response->CheckAvailabilityResult->OperationResult == "SUCCESS") {
          if (isset($response->CheckAvailabilityResult->DomainAvailabilityInfoList)) {
            $domainInfoArray = $response->CheckAvailabilityResult->DomainAvailabilityInfoList->DomainAvailabilityInfo;

            $domainsList = [];

            foreach ($domainInfoArray as $info) {
              $obj = new \stdClass;
              $obj->status = 0;

              $obj->domain = $info->DomainName .".". $info->Tld;

              if ($info->Status == "available") {
                $obj->status = 1;
              }
              $domainsList[] = $obj;
            }
            return json('Domains List',$domainsList);
          }

        }
      }

      if ($response->CheckAvailabilityResult->ErrorCode == 103) {
        return error('Something went Wrong. Make sure you have searched for valid domain name',['at'=> 'helper:98',$response]);
      }

      return error('Something went wrong',['at'=> 'helper:101',$response]);
    }

    public static function getDomainNameAPIClient()
    {
        include public_path().'/domainSDK/PhpApi.1.1/examples/api.php';
        $api = new \DomainNameAPI_PHPLibrary();
        $api->setUser("fabepovyq", 'Pa$$w0rd!');
        $api->useCaching(true);
        $api->useTestMode(false);
        return $api;
    }

}
