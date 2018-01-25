<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Excel;
use App\Admin;
use App\User;
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
            'rperiod' => 'required|max:50',
            'nremarks' => 'nullable|max:255',
            'nazir_verify_date' => 'required|date',
            'hvremarks' => 'nullable|max:255',
            'hv_verify_date' => 'required|date',

        ]);

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
        $user->verify_date_nazir = $request->input('nazir_verify_date');
        $user->remarks_nazir = $request->input('nremarks');
        $user->verify_date_headv = $request->input('hv_verify_date');
        $user->remarks_headv = $request->input('hvremarks');
       
        $user->save();

        return redirect()->back()->with('success', 'Account Successfully Created !!');
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
        // $id = auth()->user()->id;
        // $admin =  Admin::find($id);

        $users = User::all();
        return view('admin.qariah')->with('users', $users);
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
    public function upload()
    {
        return view('admin.upload');
    }
    public function import(Request $request){

        if($request->hasFile('qariah')){

            $path = $request->file('qariah')->getRealPath();
            $data = \Excel::load($path)->get();

            if($data->count()){

                foreach($data as $key => $value){

                    $rt_list[] = [
                        
                        'plate' => $value->plate,
                        'capacity' => $value->capacity,
                        'terminal' => $value->terminal,
                        'hauler_id' => $value->hauler_id,
                        'created_at' => date("Y-m-d h:i:s"),
                        'updated_at' => date("Y-m-d h:i:s")

                    ];
                }    

                if(!empty($rt_list)){

                    Roadtanker::insert($rt_list);
                    \Session::flash('success' , 'File imported successfully !!');
                }
            }
        }else {
            \Session::flash('warning', 'There is no file to import !!');
        }
        return Redirect::back();
    }
    public function export($type){

        //$rt = Roadtanker::select('plate', 'capacity', 'terminal')->get()->toArray();
        $rt = Roadtanker::join('haulers', 'roadtankers.hauler_id', '=', 'haulers.id')->select('plate', 'capacity', 'terminal', 'haulers.name as Hauler')->get()->toArray();
        
        return \Excel::create('rt-list' , function($excel) use ($rt) {

            $excel->sheet('Roadtanker-List', function($sheet) use ($rt){

                $sheet->fromArray($rt);

            });

        })->download($type);
    }
        
}
