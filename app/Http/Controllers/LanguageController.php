<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Redirect;

class LanguageController extends Controller
{
    /**
     *  @desc To change current language  
     *  @request Ajax
    */

    public function index()
    {   
        
        if(!\Session::has('locale')){
            \Session::put('locale', Input::get('locale'));
        }
        else{
            Session::put('locale', Input::get('locale'));
        }
        //Session::set('locale', Input::get('locale'));  changed this in controller to 
        return Redirect::back();
    }
}
