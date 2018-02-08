@extends('layouts.app')

@section('content')
<div class="container">
@component('components.breadcumb')
@endcomponent
@if(count($user) > 0)
    <div class="row">

        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{session('success')}}     
            </div>
            @endif
        </div>
   


        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Panel heading</div>
                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{ route('admin.qariah_update', $user->id) }}">  
                    {{ csrf_field() }}
                        <fieldset>  
                            <div class="form-group {{ $errors->has('fullname') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="fullname" value="{{ $user->name }}" id="name" readonly>
                                        @if ($errors->has('fullname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fullname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    
                            </div>
                            <div class="form-group {{ $errors->has('ic') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Ic</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="ic" value="{{ $user->ic }}" id="ic" readonly>
                                        @if ($errors->has('ic'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ic') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('age') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Age</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="age" value="{{ $user->age }}" id="age" readonly>
                                        @if ($errors->has('age'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Address</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="address" value="{{ $user->address }}" id="address" readonly>
                                        @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('postcode') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Postcode</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="postcode" value="{{ $user->postcode }}" id="postcode" readonly>
                                        @if ($errors->has('postcode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('postcode') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">City</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="city" value="{{ $user->city }}" id="city" readonly>
                                        @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">State</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="state" value="{{ $user->state }}" id="state" readonly>
                                        @if ($errors->has('state'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                            </div>
                            
                            <div class="form-group {{ $errors->has('martial') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Marital Status</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="martial" id="marital" disabled>
                                    @if($user->marital_status == 'Married')
                                    <option value="{{ $user->marital_status }}" >{{ $user->marital_status }}</option>
                                    <option value="Not Married">Not Married</option>
                                    @elseif($user->marital_status == 'Not Married')    
                                    <option value="{{ $user->marital_status }}" >{{ $user->marital_status }}</option>
                                    <option value="Married">Married</option>
                                    @endif
                                    </select>

                                    @if ($errors->has('martial'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('martial') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('pnumber') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Phone No</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="pnumber" value="{{ $user->phone_mobile }}" id="phone" readonly>
                                        @if ($errors->has('pnumber'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pnumber') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('hnumber') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Home No</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="hnumber" value="{{ $user->phone_home }}" id="home" readonly>
                                        @if ($errors->has('hnumber'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hnumber') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" id="email" readonly>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('rperiod') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Residence Period</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="rperiod" value="{{ $user->residence_period }}" id="residence" readonly>
                                        @if ($errors->has('rperiod'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rperiod') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Account Created</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="{{ $user->created_at->format('d M Y | h:i A') }}" id="update" readonly>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Account Updated</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="{{ $user->updated_at->format('d M Y | h:i A') }}" id="update" readonly>
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <!-- <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button> -->
                                    <input id="enable" class="btn btn-success" type="hidden" value="Submit">
                                </div>
                            </div>
                        </fieldset>
                        
                    </form>    

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Panel heading</div>
                <div class="panel-body">

                    <div class="row">
                        <img  class="col-md-12" style="width:100%" src="{{ asset('storage/user_images/'.$user->image) }}">
                    </div>

                </div>
            </div>

                <button onclick="enableFunction()" id="enable_update" class="btn btn-success btn-block" type="submit">Update Profile</button>
            
        </div>
    </div>
@endif
</div>


<script>

var hidden = false;

function enableFunction()
{
    document.getElementById("name").readOnly = false;
    document.getElementById("ic").readOnly = false;
    document.getElementById("age").readOnly = false;
    document.getElementById("address").readOnly = false;
    document.getElementById("postcode").readOnly = false;
    document.getElementById("city").readOnly = false;
    document.getElementById("state").readOnly = false;
    document.getElementById("marital").disabled = false;
    document.getElementById("phone").readOnly = false;
    document.getElementById("home").readOnly = false;
    document.getElementById("email").readOnly = false;
    document.getElementById("residence").readOnly = false;

    //document.getElementById("enable_update").disabled = true;

    hidden = !hidden;

    if(hidden) {

        document.getElementById('enable_update').style.visibility = 'hidden';
        document.getElementById('enable').type = 'submit';
    } 
}
</script>
@endsection
