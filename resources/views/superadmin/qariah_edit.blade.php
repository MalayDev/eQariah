@extends('layouts.admin_home')

@section('content')

@component('components.breadcumb')
@endcomponent

<div class="grid-form">
    <div class="grid-form1">


    @if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{session('success')}}     
    </div>
    @endif

    <!-- <a class="btn btn-default btn-sm" href="{{ url('admin/qariah') }}">Back</a> -->
         <!-- <div class="page-header"><h1>Add Qariah</h1></div> -->
         {!! Form::open(['action' => ['SuperAdminController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
       
            <div class="row">
            <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Part A: Qariah Details</div>
                <div class="panel-body">
                
                    <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                        {{Form::label('fullname', 'Full Name')}}
                        {{Form::text('fullname', $user->name, ['class' => 'form-control', 'placeholder' => 'Full Name', 'id' => 'fullname'])}}
                       
                        @if ($errors->has('fullname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('ic') ? ' has-error' : '' }}">
                        {{Form::label('ic', 'IC. Number')}}
                        {{Form::number('ic', $user->ic, ['class' => 'form-control', 'placeholder' => 'IC. Number', 'id' => 'ic'])}}

                        @if ($errors->has('ic'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ic') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                        {{Form::label('age', 'Age')}}
                        {{Form::number('age', $user->age, ['class' => 'form-control', 'placeholder' => 'Age', 'id' => 'age'])}}

                        @if ($errors->has('age'))
                            <span class="help-block">
                                <strong>{{ $errors->first('age') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('pnumber') ? ' has-error' : '' }}">
                        {{Form::label('pnumber', 'Phone Number')}}
                        {{Form::number('pnumber', $user->phone_mobile, ['class' => 'form-control', 'placeholder' => 'Phone Number', 'id' => 'pnumber'])}}

                        @if ($errors->has('pnumber'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pnumber') }}</strong>
                            </span>
                        @endif
                    </div>   
                    <div class="form-group{{ $errors->has('hnumber') ? ' has-error' : '' }}">
                        {{Form::label('hnumber', 'Home Number')}}
                        {{Form::number('hnumber', $user->phone_home, ['class' => 'form-control', 'placeholder' => 'Home Number', 'id'=> 'hnumber'])}}

                        @if ($errors->has('hnumber'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hnumber') }}</strong>
                            </span>
                        @endif
                    </div> 
                    
                    <div class="form-group{{ $errors->has('martial') ? ' has-error' : '' }}">
                        {{Form::label('martial', 'Martial Status', ['class' => 'radio'])}}
                        @if ($user->marital_status == 'Married')
                            {{Form::radio('martial', 'Married', true)}}
                            {{Form::label('married', 'Married', ['class' => 'radio-inline'])}}
                            &nbsp;
                            {{Form::radio('martial', 'Not Married')}}
                            {{Form::label('notmarried', 'Not Married', ['class' => 'radio-inline'])}}
                        @else
                            {{Form::radio('martial', 'Married')}}
                            {{Form::label('married', 'Married', ['class' => 'radio-inline'])}}
                            &nbsp;
                            {{Form::radio('martial', 'Not Married', true)}}
                            {{Form::label('notmarried', 'Not Married', ['class' => 'radio-inline'])}}
                        @endif

                        @if ($errors->has('martial'))
                            <span class="help-block">
                                <strong>{{ $errors->first('martial') }}</strong>
                            </span>
                        @endif
                    
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {{Form::label('email', 'Email (if any)')}}
                        {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email'])}}

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        {{Form::label('address', 'Address')}}
                        {{Form::textarea('address', $user->address, ['class' => 'form-control', 'placeholder' => 'Address...', 'id' => 'address'])}}

                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                        {{Form::label('postcode', 'Postcode')}}
                        {{Form::number('postcode', $user->postcode, ['class' => 'form-control', 'placeholder' => 'Postcode', 'id' => 'postcode'])}}

                        @if ($errors->has('postcode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('postcode') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        {{Form::label('state', 'State')}}
                        {{Form::select('state', ['Selangor' => 'Selangor'], $user->state, ['class' => 'form-control', 'placeholder' => 'Select State...', 'id' => 'state'])}}

                        @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        {{Form::label('city', 'City')}}
                        {{Form::select('city', ['Shah Alam' => 'Shah Alam'], $user->city, ['class' => 'form-control', 'placeholder' => 'Select City...', 'id' => 'city'])}}

                        @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('rperiod') ? ' has-error' : '' }}">
                        {{Form::label('residenceperiod', 'Residence Period')}}
                        {{Form::text('rperiod', $user->residence_period, ['class' => 'form-control', 'placeholder' => 'Year + Month', 'id' => 'rperiod'])}}

                        @if ($errors->has('rperiod'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rperiod') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Part B: Qariah Profile Photo</div>
                <div class="panel-body">
                    <div class="row">
                        <img  class="col-md-12 col-md-offset-3" style="width:50%" src="/storage/user_images/{{$user->image}}">
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3">
                                {{--  {{Form::file('before_image')}}  --}}
                                <input id="userfile" name="userfile" accept="image/gif, image/jpeg, image/png" style="display:none;"/>
                                <input type="button" id="userInput" style="width:50%" name="userInput" class="btn btn-primary btn-block" value="Choose Photo" 
                                onfocus="document.getElementById('userfile').type='file'" onclick="document.getElementById('userfile').click();" />
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="panel panel-default">
            <div class="panel-heading">Part C: Qariah Verification</div>
                <div class="panel-body">
                    <div class="form-group{{ $errors->has('nremarks') ? ' has-error' : '' }}">
                        {{Form::label('nremarks', 'Nazir Remarks')}}
                        {{Form::textarea('nremarks', $user->remarks_nazir, ['class' => 'form-control', 'placeholder' => 'Nazir Remarks...', 'id' => 'nremarks'])}}

                        @if ($errors->has('nremarks'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nremarks') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('nazir_verify_date') ? ' has-error' : '' }}">
                        {{Form::label('nazir_verify_date', 'Verify Date (Nazir)')}}
                        {{Form::date('nazir_verify_date', \Carbon\Carbon::parse($user->verify_date_nazir), ['class' => 'form-control', 'id' => 'nazir_verify_date'])}}

                        @if ($errors->has('nazir_verify_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nazir_verify_date') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    <div class="form-group{{ $errors->has('hvremarks') ? ' has-error' : '' }}">
                        {{Form::label('hvremarks', 'Head Village Remarks')}}
                        {{Form::textarea('hvremarks', $user->remarks_headv, ['class' => 'form-control', 'placeholder' => 'Head Village Remarks...', 'id' => 'hvremarks'])}}

                        @if ($errors->has('hvremarks'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hvremarks') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('hv_verify_date') ? ' has-error' : '' }}">
                        {{Form::label('hv_verify_date', 'Verify Date (Head Village)')}}
                        {{Form::date('hv_verify_date', \Carbon\Carbon::parse($user->verify_date_headv), ['class' => 'form-control', 'id' => 'hv_verify_date'])}}

                        @if ($errors->has('hv_verify_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hv_verify_date') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    {{Form::submit('Update Qariah', ['class' => 'btn btn-primary btn-lg btn-block'])}}
                </div>
            </div>
            
        </div>



            </div>
        {!! Form::close() !!}    
    </div></div>
@endsection
