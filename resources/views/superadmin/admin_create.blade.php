@extends('layouts.app')

@section('content')
<div class="container">
    @component('components.breadcumb')
    @endcomponent
    <div class="row">
        @component('components.menu')
        @endcomponent
        {!! Form::open(['action' => 'SuperAdminController@mosque_store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    
                        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            {{Form::label('name', 'Name')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name', 'id' => 'name'])}}
                            
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{Form::label('email', 'Email (if any)')}}
                            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email'])}}

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            {{Form::label('address', 'Address')}}
                            {{Form::textarea('address', '', ['class' => 'form-control', 'placeholder' => 'Address...', 'id' => 'address'])}}

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                            {{Form::label('postcode', 'Postcode')}}
                            {{Form::number('postcode', '', ['class' => 'form-control', 'placeholder' => 'Postcode', 'id' => 'postcode'])}}

                            @if ($errors->has('postcode'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('postcode') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                                <div class="form-group col-md-6 {{ $errors->has('city') ? ' has-error' : '' }}">
                                    {{Form::label('city', 'City')}}
                                    {{Form::select('city', ['Shah Alam' => 'Shah Alam'], '', ['class' => 'form-control', 'placeholder' => 'Select City...', 'id' => 'city'])}}
    
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('state') ? ' has-error' : '' }}">
                                    {{Form::label('state', 'State')}}
                                    {{Form::select('state', ['Selangor' => 'Selangor'], '', ['class' => 'form-control', 'placeholder' => 'Select State...', 'id' => 'state'])}}
    
                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            
                            
                        </div>
                        {{Form::submit('Create Mosque', ['class' => 'btn btn-primary btn-lg btn-block'])}}       
                         
                </div>
            </div>
        </div>

        <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile Picture</div>
                        
                    <div class="panel-body">
                            <div class="row">
                                <img  class="col-md-12" style="width:100%" src="{{ asset('storage/noimage.jpg') }}">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                        <input id="userfile" name="userfile" accept="image/gif, image/jpeg, image/png" style="display:none;"/>
                                        <input type="button" id="userInput" name="userInput" class="btn btn-primary btn-block" value="Choose Photo" 
                                        onfocus="document.getElementById('userfile').type='file'" onclick="document.getElementById('userfile').click();" />
                                </div>
                            </div>
                            
                    </div>
                <div>
        <div>
        {!! Form::close() !!} 
    </div>
</div>
@endsection