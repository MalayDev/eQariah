<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.qariah_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = auth()->user()->id;
        $admin =  Admin::find($id);
        return view('admin.profile')->with('admin',$admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function account()
    {
        $id = auth()->user()->id;
        $admin =  Admin::find($id);
        return view('admin.account')->with('admin',$admin);
    }

    public function qariah()
    {
        $id = auth()->user()->id;
        $admin =  Admin::find($id);
        return view('admin.qariah')->with('admin',$admin);
    }

    public function changePassword(Request $request){


        if(!Hash::check($request->get('current-password'), auth()->user()->password)){

            return redirect()->back()->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            
            return redirect()->back()->with('error','New Password cannot be same as your current password. Please choose a different password.');
        }
        
        $this->validate($request,[
            
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed'
        ]);
        
        $admin = auth()->user();
        $admin->password = bcrypt($request->get('new-password'));
        $admin->save();

        return redirect()->back()->with('success','Password changed successfully !');
        
    }
        
}
