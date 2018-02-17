@extends('layouts.admin_home')

@section('content')

@component('components.breadcumb')
@endcomponent
<div class="grid-form">
    <div class="grid-form1">
        
        @if(count($user) > 0)
            
            @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{session('success')}}     
            </div>
            @endif
            
            <form method="POST" action="{{ route('admin.qariah_update', $user->id) }}">  
                    {{ csrf_field() }}
                <div class="row">
                    <!--Qariah Photo -->
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Qariah Picture</div>
                            <div class="panel-body">
                                <div class="row">
                                    <img  class="col-md-12" style="width:100%" src="{{ asset('storage/user_images/'.$user->image) }}">
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                    <a href="{{ route('super.qariah_edit',[$user->ic,str_slug($user->name,'-')])}}" class="btn btn-default btn-block">Update Profile</a>
                                    </div>
                                </div>
                            </div>
                                    
                        </div>
                    </div>

                    <!--Qariah Information -->
                    <div class="col-md-9 form-horizontal">
                        <div class="panel panel-default">
                            <div class="panel-heading">Qariah Information</div>
                            <div class="panel-body">
                                
                                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Profile</a></li>
                                        <li role="presentation"><a href="#contact" id="contact-tab" role="tab" data-toggle="tab" aria-controls="contact" aria-expanded="true">Contact</a></li>
                                        <li role="presentation"><a href="#verification" id="verification-tab" role="tab" data-toggle="tab" aria-controls="verification" aria-expanded="true">Verification</a></li>
                                        
                                    </ul>

                                    <div id="myTabContent" class="tab-content">
                                        
                                        <div role="tabpanel" class="tab-pane fade in active" id="profile" aria-labelledby="profile-tab">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" class="form-control" name="fullname" value="{{ $user->name }}" id="name" readonly>    
                                                </div>
            
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label class="control-label">I/C</label>
                                                            <input type="text" class="form-control" name="ic" value="{{ $user->ic }}" id="ic" readonly>
                                                        </div>
            
                                                        <div class="col-md-4">
                                                            <label class="control-label">Age</label>
            
                                                            <input type="text" class="form-control" name="age" value="{{ $user->age }}" id="age" readonly>
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <label class="control-label">Email</label>
                                                    
                                                            <input type="text" class="form-control" name="email" value="{{ $user->email }}" id="email" readonly>
                                                        </div>   
                                                    </div>    
                                                </div> 
                                
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                        
                                                    <input type="text" class="form-control" name="address" value="{{ $user->address }}, {{ $user->postcode }}, {{ $user->city }}, {{ $user->state }}" id="address" readonly>       
                                                </div>
            
                                                <div class="form-group">
                                                    <label class="control-label">Marital Status</label>
                                                    <input type="text" class="form-control" name="martial" value="{{ $user->marital_status }}" id="martial" readonly>     
                                                </div>
            
                                                
            
                                                <div class="form-group ">
                                                    <label class="control-label">Residence Period</label>
                                                    <input type="text" class="form-control" name="rperiod" value="{{ $user->residence_period }}" id="residence" readonly>
                                                        
                                                </div>
                                                
            
            
                                            </div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="contact" aria-labelledby="contact-tab">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                        
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="control-label">Home No</label>
                                                            <input type="text" class="form-control" name="hnumber" value="{{ $user->phone_home }}" id="home" readonly>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <label class="control-label">Phone No</label>
                                                            <input type="text" class="form-control" name="pnumber" value="{{ $user->phone_mobile }}" id="phone" readonly>
                                                        </div>
                                                        
            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="verification" aria-labelledby="verification-tab">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                        
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="control-label">Nazir Remarks</label>
                                                            <input type="text" class="form-control" name="nremarks" value="{{ $user->remarks_nazir }}" id="nremarks" readonly>    
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="control-label">Verify Date (Nazir)</label>
                                                            {{Form::date('nazir_verify_date', \Carbon\Carbon::parse($user->verify_date_nazir), ['class' => 'form-control', 'id' => 'nazir_verify_date', 'readonly' => 'true'])}}
                                                        </div>
                                                                
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="control-label">Head Village Remarks</label>
                                                            <input type="text" class="form-control" name="hvremarks" value="{{ $user->remarks_headv }}" id="hvremarks" readonly>    
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="control-label">Verify Date (Head Village)</label>
                                                            {{Form::date('hv_verify_date', \Carbon\Carbon::parse($user->verify_date_headv), ['class' => 'form-control', 'id' => 'hv_verify_date', 'readonly' => 'true'])}}    
                                                        </div>
                                                        
            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection

