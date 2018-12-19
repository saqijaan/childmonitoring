<?php

namespace App\Http\Controllers;
use App\Child;
use App\CallLog;
use App\Message;
use App\Contact;
use App\Location;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index($id){
        $child = Child::find($id);
        $calls = CallLog::where('child_id',$id)->orderBy('created_at','DESC')->get()->take(5);
        $Messages = Message::where('child_id',$id)->orderBy('created_at','DESC')->get()->take(5);

        $totalCalls     = CallLog::where('child_id',$id)->count();
        $totalMsgs      = Message::where('child_id',$id)->count();
        $totalContacts  = Contact::where('child_id',$id)->count();

        return view('childdata.index',compact('child','calls','Messages','totalCalls','totalMsgs','totalContacts'));
    }
    public function getCalls($childid){
        $child = Child::find($childid);
        $calls=CallLog::where('child_id',$childid)->orderBy('created_at','DESC')->paginate(50);
        return view('childdata.calls',compact('child','calls'));
    }
    public function getMessage($childid){
        $child = Child::find($childid);
        $messages=Message::where('child_id',$childid)->orderBy('created_at','DESC')->paginate(50);
        return view('childdata.messages',compact('child','messages'));
    }
    public function getContacts($childid){
        $child = Child::find($childid);
        $contacts=Contact::where('child_id',$childid)->get();
        return view('childdata.contacts',compact('child','contacts'));

    }
    public function getLocation($childid){
        $child = Child::find($childid);
        $location=Location::where('child_id',$childid)->orderBy('created_at','DESC')->get();
        return view('childdata.location',compact('child','location'));

    }
}
