<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','userLogout');
    }

    public function showLoginForm(){
        return view('auth.user.user_login');
    }

    public function login(Request $request){
        // validate form data
        $this->validate($request, [
            'ic' => 'required|digits:12',
        ]);
        
        $ic = $request->input('ic');

        $user = User::where('ic' ,$ic)->get();
        
        if(count($user) > 0)
        {
            foreach($user as $i)
            {
                if(Auth::guard('web')->loginUsingId($i->id))
                {
                   return redirect()->intended(route('home'));
                }
            }
            
        }

        return redirect()->back()->with('warning', 'Please contact administrator for registration')->withInput($request->only('ic'));



        //  return redirect()->back()->withInput($request->only('password'));
    
        // $user = User::findByIc($password);
        // $user_id = $user->id;


        // if(Auth::loginUsingId($user_id))
        // {
        //     return 'success logged!!';
        // }

        // return 'cannot login!!';

 
        //Attempt to log the admin in 
        // if(Auth::guard('web')->attempt(['password'=> $request->password])){
        //     //If successful, then redirect to their intended location
        //     return redirect()->intended(route('home'));
        // }
        
        // // If not successful, then redirect back to the login with form data
        // return redirect()->back()->withInput($request->only('password'));
     
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        if(Auth::guard('admin')->check()){
            return redirect('/admin'); 
        }
        if(Auth::guard('superadmin')->check()){
            return redirect('/superadmin'); 
        }
        else{
            $request->session()->invalidate();
            return redirect('/');
        }

    }
}
