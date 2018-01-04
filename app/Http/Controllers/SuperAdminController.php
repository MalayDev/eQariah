<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Superadmin;
use App\Admin;
use App\User;
use Yajra\DataTables\Datatables;
use DB;
use Helper;

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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        $super =  Superadmin::find($id);
        return view('superadmin.account')->with('super',$super);
    }

    public function mosque()
    {
        $id = auth()->user()->id;
        $super =  Superadmin::find($id);
        return view('superadmin.mosque')->with('super',$super);
    }

    public function qariah()
    {
        $id = auth()->user()->id;
        $super =  Superadmin::find($id);
        return view('superadmin.qariah')->with('super',$super);
    }

    public function getMosque()
    {
        $id = auth()->user()->id;
        $mosque = Admin::all();
        return Datatables::of($mosque)
        ->addColumn('Action', 'components.action')
        ->rawColumns(['Action'])
        ->toJson();
   
    }

    public function getQariah()
    {
        $id = auth()->user()->id;
        $qariah = User::all();
        return Datatables::of($qariah)
        ->addColumn('Action', 'components.action')
        ->rawColumns(['Action'])
        ->toJson();
   
    }
}
