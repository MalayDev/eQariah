@extends('layouts.admin_home')

@section('content')
            
@component('components.breadcumb')
@endcomponent


<div class="grid-form">
    <div class="grid-form1">
        <h3 id="forms-example" class="">{{ ucwords(Auth::user()->name) }}</h3>
        
        <div class="row">
            <!--Qariah Photo -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Picture</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                <img  class="col-md-12" style="width:100%" src="{{ asset('storage/admin_images/'.$admin->image) }}">
                            </div>
                            <br>
                                
                        </div>
                    </div>
                </div>
            </div>

                <!--Qariah Information -->
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Information</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{$admin->name}}" required autofocus disabled>
                        </div>

                        <div class="form-group">   
                            <label for="email" class="control-label">Alamat E-Mel</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{$admin->email}}" required disabled>    
                        </div>

                        <div class="form-group">    
                            <label for="address" class="control-label">Address</label>
                            <input id="address" type="text" class="form-control" name="address" value="{{$admin->address}} , {{$admin->postcode}} , {{$admin->state}} , {{$admin->city}}" required disabled>    
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection