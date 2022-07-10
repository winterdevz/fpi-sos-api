<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\SMSService;

class SMSServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_send_sms()
    {
        $smsService = new SMSService();
        $response = $smsService->sendSMS(
            ['2348132371012'],
            "This is FPI SOS test"
        );
        var_dump($response);
        // $response->assertJsonFragment(['code' => 'ok']);  
    }
}
