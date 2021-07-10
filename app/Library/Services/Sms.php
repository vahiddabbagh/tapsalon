<?php
namespace App\Library\Services;

use Illuminate\Http\Request;
use App\User;
use Artisaninweb\SoapWrapper\SoapWrapper;
use Illuminate\Support\Facades\Cache;


class Sms
{

    public function sendSms(Request $request)
    {
      $user = "09145724007";
      $pass = "peterjackson1910";
      $fromNum = "+3000505";

      $smsCode = rand(10000,99999);
      $input_data = array("verification-code" => $smsCode);
      $pattern_code = 'wsw1i6nlyz';
      $toNum = (array) $request->mobile;
      $client = new SoapWrapper;

      $client->add('sms', function($service){
        $service
        ->wsdl('http://ippanel.com/class/sms/wsdlservice/server.php?wsdl')
        ->trace(true);
      });

      $code = $client->call('sms.sendPatternSms', [$fromNum,$toNum,$user,$pass,$pattern_code, $input_data]);
      Cache::put($request->mobile, $smsCode, 120);
      return response('Sms sent', 200);
    }


    public function verify(Request $request)
    {
      if(Cache::get($request->mobile) == $request->sms){
        return User::create([
          'mobile' => $request->mobile
        ]);
      }

      return response('Code is not correct', 401);
    }
}