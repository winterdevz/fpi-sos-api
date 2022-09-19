<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
class SMSService
{

    private $smsUrl;
    private $smsConfig;
    public function __construct()
    {
        $this->smsUrl = config('app.termiiURL');
       
    }

    public function sendSMS(array $phoneNumbers, string $message)
    {
        $this->smsConfig = [
            "api_key" => config('app.termiiSMS'),
            "to" => $phoneNumbers,  
            "from" => "Zealarax",
            "sms" => $message,  
            "type" => "plain",  
            "channel" => "generic" ]; 
            $response = Http::post($this->smsUrl, $this->smsConfig);
            return   $response;
    }

    public function nigeriaBulkSMS(string $phoneNumbers, string $message)
    { 
	    
        $response = Http::get("http://portal.nigeriabulksms.com/api/?username=amobeeb1net@gmail.com&password=Damilare@2022&message=$message&sender=FPISOS&mobiles=$phoneNumbers");
        return   $response;
    }
}