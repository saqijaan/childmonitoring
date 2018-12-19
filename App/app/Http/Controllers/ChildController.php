<?php

namespace App\Http\Controllers;
use App\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childs=Child::all();
        return view('childs.index',compact('childs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('childs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= [
            'name'              => 'required',
            'phone'             => 'required|unique:children,phone',
            'password'          => 'confirmed|min:8',
        ];
        $this->validate($request,$rules);

        $child= new Child;
        $child->parent_id   = auth()->Id();
        $child -> name      = $request->name;
        $child -> phone     = $request->phone;
        $child -> password  = bcrypt($request->password);
        $child -> token     = sha1(microtime());
        $child ->save();
        return back()->with('success','Child Registered Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $child  =   Child::find($id);
        return view('childs.edit',compact('child'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        $rules = [
            'name'  =>   'required',
            'phone' =>   'required|unique:children,phone,'.$id,
        ];
        if (!empty($request->password) && null!= $request->password){
            $rules['password'] = 'required|confirmed|min:8';
        }

        $this->validate($request,$rules);
        $child  =   Child::find($id);
        $child -> name= $request->name;
        $child -> phone     = $request->phone;
        $child -> password  =  null== $request->password?$child->password: bcrypt($request->password);
        $child ->save();
        return back()->with('success','Child Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Child::find($id)->delete();
        return back()->with('success','Child Deleted Successfully');
    }
}
