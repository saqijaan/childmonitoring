<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CallLog;
use App\Message;
use App\Contact;
use App\Child;
use App\ApiResponse;

use Exception;

class SyncController extends Controller
{
    public function index(){

        //Log::info("Data Posted: ".\request('api_data'));
        //return \request()->all();
        $data   =   json_decode(\request("api_data"));
        $Token  =   \request("token");

        $Calls      =   json_decode($data->Calls);
        $Messages   =   json_decode($data->Messages);
        $Contacts   =   json_decode($data->Contacts);

        //Log::info($Calls);
        $child=Child::where("token",$Token)->first();
        $dataSaved =array();



        foreach($Calls as $call){
            try{
                $callLog            = new CallLog;
                $callLog->_Id       = $call->Id;
                $callLog->number    = $call->Number;
                $callLog->type      = $call->Type;
                $callLog->duration  = gmdate('H:i:s',$call->Duration);
                $callLog->child_id  = $child->id;
                $callLog->created_at= date('Y-m-d H:i:s',$call->DateTime/1000);
                $callLog->save();
            }catch(Exception $e){
                Log::info("Call Log Save Error: ".$e->getMessage());
            }
        }
        foreach($Messages as $message){
            try{
                $messages            = new Message;
                $messages->_Id       = $message->Id;
                $messages->number    = $message->Number;
                $messages->type      = $message->Type;
                $messages->message   = $message->MSG;
                $messages->child_id  = $child->id;
                $messages->created_at= date('Y-m-d H:i:s',$message->DateTime/1000);
                $messages->save();
            }catch(Exception $e){
                Log::info("Call Log Save Error: ".$e->getMessage());
            }

        }
        foreach($Contacts as $contact){
            try{
                $contacts            = new Contact;
                $contacts->_Id       = $contact->Id;
                $contacts->name      = $contact->Name;
                $contacts->number    = $contact->Number;
                $contacts->child_id  = $child->id;
                $contacts->created_at= date('Y-m-d H:i:s');
                $contacts->save();
            }catch(Exception $e){
                Log::info("Call Log Save Error: ".$e->getMessage());
            }
        }

        $callIds    = CallLog::select('_Id')->get()->pluck('_Id')->toArray();
        $messageIds = Message::select('_Id')->get()->pluck('_Id')->toArray();
        $contactIds = Contact::select('_Id')->get()->pluck('_Id')->toArray();

        return json_encode(array("msgIds"=>$messageIds, "callIds"=>$callIds,"contactIds"=>$contactIds));

        // foreach($locations as $location){
        //     $locations=new locations;
        //     $locations->latitude;
        //     $locations->longitude;
        //     $locations->childid=$child->id;
        //     $locations->created_at=$contact->data;
        // }
    }
    public function login(){
        $phone      = \request('phone');
        $password   = \request('password');
        $child      = Child::where('phone',$phone)->first();

        $response   =new  ApiResponse;
        if ($child  ==    null){
            $response->isError  = true;
            $response->data     = "Invalid Phone";
            return json_encode($response);
        }

        if (! Hash::check($password, $child->password)){
            $response->isError  = true;
            $response->data     = "Invalid Passsword";
            return json_encode($response);
        }

        $response->isError  = false;
        $response->data     = $child->token;
        return json_encode($response);

    }
}
