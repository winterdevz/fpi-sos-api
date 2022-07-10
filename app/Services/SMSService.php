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
            "from" => "FPI-SOS",
            "sms" => $message,  
            "type" => "plain",  
            "channel" => "generic" ]; 
            $response = Http::post($this->smsUrl, $this->smsConfig);
            return   $response;
    }
}