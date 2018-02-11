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
                                        <a href="#" class="btn btn-default btn-block">Upload Picture</a>
                                    </div>
                                </div>
                            </div>
                                    
                        </div>
                    </div>

                    <!--Qariah Information -->
                    <div class="col-md-9 form-horizontal">
                        <div class="panel panel-default">
                            <div class="panel-heading">User Dashboard</div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('fullname') ? ' has-error' : '' }}">
                                        <label class="control-label">Name</label>
                                        
                                        <input type="text" class="form-control" name="fullname" value="{{ $user->name }}" id="name" >
                                        @if ($errors->has('fullname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fullname') }}</strong>
                                        </span>
                                        @endif
                                        
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4 {{ $errors->has('ic') ? ' has-error' : '' }}">
                                                <label class="control-label">I/C</label>
                                    
                                                <input type="text" class="form-control" name="ic" value="{{ $user->ic }}" id="ic" >
                                                @if ($errors->has('ic'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ic') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-md-4 {{ $errors->has('age') ? ' has-error' : '' }}">
                                                <label class="control-label">Age</label>
                                    
                                                <input type="text" class="form-control" name="age" value="{{ $user->age }}" id="age" >
                                                @if ($errors->has('age'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('age') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            
                                            <div class="col-md-4 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="control-label">Email</label>
                                        
                                                <input type="text" class="form-control" name="email" value="{{ $user->email }}" id="email" >
                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            
                                        </div>
                                        
                                        
                                    </div> 
                     
                                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label class="control-label">Address</label>
                                            
                                        <input type="text" class="form-control" name="address" value="{{ $user->address }}" id="address" >
                                        @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
                                            
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4 {{ $errors->has('postcode') ? ' has-error' : '' }}">
                                                <label class="control-label">Postcode</label>
                                        
                                                <input type="text" class="form-control" name="postcode" value="{{ $user->postcode }}" id="postcode" >
                                                @if ($errors->has('postcode'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('postcode') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-md-4 {{ $errors->has('city') ? ' has-error' : '' }}">
                                                <label class="control-label">City</label>
                                        
                                                <input type="text" class="form-control" name="city" value="{{ $user->city }}" id="city" >
                                                @if ($errors->has('city'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-md-4 {{ $errors->has('state') ? ' has-error' : '' }}">
                                                <label class="control-label">State</label>
                                        
                                                <input type="text" class="form-control" name="state" value="{{ $user->state }}" id="state" >
                                                @if ($errors->has('state'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('state') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                        </div>                                    
                                    </div>
                            
                                    <div class="form-group {{ $errors->has('martial') ? ' has-error' : '' }}">
                                        <label class="control-label">Marital Status</label>
                                        
                                            <select class="form-control" name="martial" id="marital">
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

                                    <div class="form-group">
                                        
                                        <div class="row">
                                            <div class="col-md-6 {{ $errors->has('pnumber') ? ' has-error' : '' }}">
                                                <label class="control-label">Phone No</label>
                                        
                                                <input type="text" class="form-control" name="pnumber" value="{{ $user->phone_mobile }}" id="phone" >
                                                @if ($errors->has('pnumber'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pnumber') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-md-6 {{ $errors->has('hnumber') ? ' has-error' : '' }}">
                                                <label class="control-label">Home No</label>
                                        
                                                <input type="text" class="form-control" name="hnumber" value="{{ $user->phone_home }}" id="home" >
                                                @if ($errors->has('hnumber'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('hnumber') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                            
                                    </div>

                                    <div class="form-group {{ $errors->has('rperiod') ? ' has-error' : '' }}">
                                        <label class="control-label">Residence Period</label>
                                            
                                                <input type="text" class="form-control" name="rperiod" value="{{ $user->residence_period }}" id="residence" >
                                                @if ($errors->has('rperiod'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('rperiod') }}</strong>
                                                </span>
                                            @endif
                                            
                                    </div>
                                    <div class="form-group">
                                        <div class="pull-right">
                                            <!-- <button type="reset" class="btn btn-default">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button> -->
                                            <input class="btn btn-success" type="submit" value="Submit">
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
