<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\MessageRequest;
use Illuminate\Http\JsonResponse;
use App\Services\SMSService;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    public function index()
    {
        
    }

    public function saveContact(ContactRequest $request)
    {
        $contact = Contact::create($request->validated());
        return $this->responseJson([], 200, "success");
    }

    public function updateContact(int $id, ContactRequest $request)
    {
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->isActive = $request->isActive;
        $contact->save();
        return $this->responseJson([], 200, "success");
 
    }

    public function deleteContact(int $id)
    {
        $contact = Contact::find($id);
        $contact->delete(); 
        return $this->responseJson([], 200, "success");
    }

    public function allContacts(){
        $contact = Contact::get();
        return $this->responseJson(json_decode($contact), 200, "success");
    }

    public function sendSMSContact(MessageRequest $request)
    {
        $contacts = Cache::remember('users', 5*60*60, function () {
            return Contact::get();
        });
      
        
        $allContact = [];
        foreach($contacts as $contact){
            $allContact[] = $contact->contact;
        }

        $smsService = new SMSService();
        $response = $smsService->sendSMS(
            $allContact,
            $request->message
        );
        $responseStatus = $response->status();
        if($responseStatus > 400){
            $this->responseJson([], 402, "error");
        }
        
        return $this->responseJson(json_decode($response->body()), 200, "success");
    }


    private function responseJson($data, int $status, string $message):JsonResponse
    {
        return response()->json([
            "status"=>$message,
            "data"=>$data
        ],  $status);
    }
}
