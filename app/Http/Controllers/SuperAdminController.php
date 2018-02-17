<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Superadmin;
use App\Admin;
use App\User;
use \Crypt;
use Yajra\DataTables\Datatables;
use DB;
use Helper;
use Hash;

class SuperAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.superadmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Respon
     * se
     */    
    public function create()
    {
        $id = auth()->user()->id;
        $super =  Superadmin::find($id);
        return view('superadmin.qariah_create')->with('super',$super);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            
            'fullname' => 'required|string|max:255',
            'ic' => 'required|numeric|digits:12|unique:users',
            'age' => 'required|numeric',
            'pnumber' => 'nullable|numeric|min:12',
            'hnumber' => 'nullable|numeric|min:12',
            'martial' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|max:255',
            'postcode' => 'required|numeric|digits:5',
            'state' => 'required',
            'city' => 'required',
            'userfile' =>'image|nullable|max:1999',
            'rperiod' => 'required|max:50',
            'nremarks' => 'nullable|max:255',
            'nazir_verify_date' => 'required|date',
            'hvremarks' => 'nullable|max:255',
            'hv_verify_date' => 'required|date',

        ]);

        $fileNameToStore = 'noimage.jpg';

        //Handle File Upload
        if($request->hasFile('userfile')){
            //Get filename with extension
            $filenameWithExt = $request->file('userfile')->getClientOriginalName();
            //Get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get ext
            $extension = $request->file('userfile')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('userfile')->storeAs('public/user_images', $fileNameToStore); 
        }


        $user = new User;

        $user->name = $request->input('fullname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('ic'));
        $user->ad_id = auth()->user()->id;
        $user->ic = $request->input('ic');
        $user->age = $request->input('age');
        $user->phone_home = $request->input('hnumber');
        $user->phone_mobile = $request->input('pnumber');
        $user->marital_status = $request->input('martial');
        $user->residence_period = $request->input('rperiod');
        $user->address = $request->input('address');
        $user->postcode = $request->input('postcode');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->image = $fileNameToStore;
        $user->verify_date_nazir = $request->input('nazir_verify_date');
        $user->remarks_nazir = $request->input('nremarks');
        $user->verify_date_headv = $request->input('hv_verify_date');
        $user->remarks_headv = $request->input('hvremarks');
       
        $user->save();

        return redirect()->route('super.qariah')->with('success', 'Account Successfully Created !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ic, $slug)
    {
        $user =  User::where('ic',$ic)->first();
        return view('superadmin.qariah_show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ic, $slug)
    {
        $user =  User::where('ic',$ic)->first();
        return view('superadmin.qariah_edit')->with('user',$user);
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
        $user = User::find($id);
        $ic = $user->ic;
        $email = $user->email;

        if(($ic == $request->input('ic'))&&($email == $request->input('email'))){
            $this->validate($request, [
            
                'fullname' => 'required|string|max:255',
                'age' => 'required|numeric',
                'pnumber' => 'nullable|numeric|min:12',
                'hnumber' => 'nullable|numeric|min:12',
                'martial' => 'required',
                'address' => 'required|max:255',
                'postcode' => 'required|numeric|digits:5',
                'state' => 'required',
                'city' => 'required',
                'rperiod' => 'required|max:50',
                'nremarks' => 'nullable|max:255',
                'nazir_verify_date' => 'required|date',
                'hvremarks' => 'nullable|max:255',
                'hv_verify_date' => 'required|date',
    
            ]);
        }
        else if(($ic == $request->input('ic'))&&($email != $request->input('email'))){
            $this->validate($request, [
            
                'fullname' => 'required|string|max:255',
                'age' => 'required|numeric',
                'pnumber' => 'nullable|numeric|min:12',
                'hnumber' => 'nullable|numeric|min:12',
                'martial' => 'required',
                'email' => 'required|string|email|max:255|unique:users|unique:admins',
                'address' => 'required|max:255',
                'postcode' => 'required|numeric|digits:5',
                'state' => 'required',
                'city' => 'required',
                'rperiod' => 'required|max:50',
                'nremarks' => 'nullable|max:255',
                'nazir_verify_date' => 'required|date',
                'hvremarks' => 'nullable|max:255',
                'hv_verify_date' => 'required|date',
    
            ]);
        }
        else if(($ic != $request->input('ic'))&&($email == $request->input('email'))){
            $this->validate($request, [
            
                'fullname' => 'required|string|max:255',
                'ic' => 'required|numeric|digits:12|unique:users',
                'age' => 'required|numeric',
                'pnumber' => 'nullable|numeric|min:12',
                'hnumber' => 'nullable|numeric|min:12',
                'martial' => 'required',
                'address' => 'required|max:255',
                'postcode' => 'required|numeric|digits:5',
                'state' => 'required',
                'city' => 'required',
                'rperiod' => 'required|max:50',
                'nremarks' => 'nullable|max:255',
                'nazir_verify_date' => 'required|date',
                'hvremarks' => 'nullable|max:255',
                'hv_verify_date' => 'required|date',
    
            ]);
        }
        else
        {
            $this->validate($request, [
            
                'fullname' => 'required|string|max:255',
                'ic' => 'required|numeric|digits:12|unique:users',
                'age' => 'required|numeric',
                'pnumber' => 'nullable|numeric|min:12',
                'hnumber' => 'nullable|numeric|min:12',
                'martial' => 'required',
                'email' => 'required|string|email|max:255|unique:users|unique:admins',
                'address' => 'required|max:255',
                'postcode' => 'required|numeric|digits:5',
                'state' => 'required',
                'city' => 'required',
                'rperiod' => 'required|max:50',
                'nremarks' => 'nullable|max:255',
                'nazir_verify_date' => 'required|date',
                'hvremarks' => 'nullable|max:255',
                'hv_verify_date' => 'required|date',
    
            ]);
        }
        
        //Handle File Upload
        if($request->hasFile('userfile')){
            //Get filename with extension
            $filenameWithExt = $request->file('userfile')->getClientOriginalName();
            //Get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get ext
            $extension = $request->file('userfile')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('userfile')->storeAs('public/user_images', $fileNameToStore); 
        }
        

        $user->name = $request->input('fullname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('ic'));
        $user->ad_id = auth()->user()->id;
        $user->ic = $request->input('ic');
        $user->age = $request->input('age');
        $user->phone_home = $request->input('hnumber');
        $user->phone_mobile = $request->input('pnumber');
        $user->marital_status = $request->input('martial');
        $user->residence_period = $request->input('rperiod');
        $user->address = $request->input('address');
        $user->postcode = $request->input('postcode');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        if($request->hasFile('userfile')){
            $user->image = $fileNameToStore;
        }
        $user->verify_date_nazir = $request->input('nazir_verify_date');
        $user->remarks_nazir = $request->input('nremarks');
        $user->verify_date_headv = $request->input('hv_verify_date');
        $user->remarks_headv = $request->input('hvremarks');
       
        $user->save();

        return redirect()->route('super.qariah')->with('success', 'Account Successfully Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('super.qariah')->with('success','User successfully removed');
    }

    public function account()
    {
        $id = auth()->user()->id;
        $super =  Superadmin::find($id);
        return view('superadmin.account')->with('super',$super);
    }

    public function mosque()
    {
        $mosques =  Admin::all();
        return view('superadmin.mosque')->with('mosques',$mosques);
    }

    public function qariah()
    {
        $users = User::all();

        return view('superadmin.qariah')->with('users', $users);
    }

    public function mosque_create()
    {
        return view('superadmin.admin_create');
    }

    public function mosque_store(Request $request)
    {
        $this->validate($request, [
            
            'name' => 'required|string|max:255',
            'address' => 'required|max:255',
            'postcode' => 'required|numeric|digits:5',
            'state' => 'required',
            'city' => 'required',
            'userfile' =>'image|nullable|max:1999',

        ]);

        $fileNameToStore = 'noimage.jpg';

        //Handle File Upload
        if($request->hasFile('userfile')){
            //Get filename with extension
            $filenameWithExt = $request->file('userfile')->getClientOriginalName();
            //Get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get ext
            $extension = $request->file('userfile')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('userfile')->storeAs('public/admin_images', $fileNameToStore); 
        }


        $admin = new Admin;

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = bcrypt('password');
        $admin->address = $request->input('address');
        $admin->postcode = $request->input('postcode');
        $admin->city = $request->input('city');
        $admin->state = $request->input('state');
        $admin->image = $fileNameToStore;

        $admin->save();

        return redirect()->route('super.mosque')->with('success', 'Account Successfully Created !!');
    }

    public function mosque_show($id, $slug)
    {
        $admin =  Admin::find($id);
        return view('superadmin.admin_show')->with('admin',$admin);
    }

    public function mosque_edit($id, $slug)
    {
        $admin =  Admin::find($id);
        return view('superadmin.admin_edit')->with('admin',$admin);
    }

    public function mosque_update(Request $request, $id)
    {
        $admin = Admin::find($id);
        $email = $admin->email;

        if($email == $request->input('email')){
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'address' => 'required|max:255',
                'postcode' => 'required|numeric|digits:5',
                'state' => 'required',
                'city' => 'required',
            ]);
        }else{
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:admins|unique:users',
                'address' => 'required|max:255',
                'postcode' => 'required|numeric|digits:5',
                'state' => 'required',
                'city' => 'required',
            ]);
        }

        //Handle File Upload
        if($request->hasFile('userfile')){
            //Get filename with extension
            $filenameWithExt = $request->file('userfile')->getClientOriginalName();
            //Get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get ext
            $extension = $request->file('userfile')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('userfile')->storeAs('public/admin_images', $fileNameToStore); 
        }

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->address = $request->input('address');
        $admin->postcode = $request->input('postcode');
        $admin->city = $request->input('city');
        $admin->state = $request->input('state');
        if($request->hasFile('userfile')){
            $admin->image = $fileNameToStore;
        }

        $admin->save();

        return redirect()->route('super.mosque')->with('success', 'Account Successfully Updated !!');
    }

    public function mosque_delete($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('super.mosque')->with('success','Admin successfully removed');
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
        
        $super = auth()->user();
        $super->password = bcrypt($request->get('new-password'));
        $super->save();

        return redirect()->route('superadmin.dashboard')->with('success','Password changed successfully!');
        
    }


}
