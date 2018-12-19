<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Child;
use App\CallLog;
use App\Message;
use App\Contact;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childs     =   Child::where('parent_id',auth()->Id())->get();
        $child_Ids  =   $childs->pluck('id')->toArray();

        $childCount =   $childs->count();
        $callCount  =   CallLog::whereIn('child_id',$child_Ids)->count();
        $MsgsCount  =   Message::whereIn('child_id',$child_Ids)->count();
        $ContCount  =   Contact::whereIn('child_id',$child_Ids)->count();

        return view('index',compact('childs','childCount','callCount','MsgsCount','ContCount'));
    }
    public function edit(){
        $user   =   User::find(auth()->Id());
        return view('profile',compact('user'));
    }
    public function update(Request $request){
        $id= auth()->Id();
        //return $request->all();
        $rules = [
            'name'  =>   'required',
            'email' =>   'required|unique:users,email,'.$id,
        ];
        if (!empty($request->password) && null!= $request->password){
            $rules['password'] = 'required|confirmed|min:8';
        }

        $this->validate($request,$rules);
        $user  =   User::find($id);
        $user ->name       = $request->name;
        $user ->email      = $request->email;
        $user ->password   =  null== $request->password?$user->password: bcrypt($request->password);
        $user ->save();
        return back()->with('success','Profile Updated Successfully');
    }
}
