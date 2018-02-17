@extends('layouts.admin_home')

@section('content')

@component('components.breadcumb')
@endcomponent

<div class="grid-form">
        <div class="grid-form1">
            
            <h3 id="forms-example" class="">Change Password</h3>
            <form method="POST" action="{{ route('super.changePassword') }}">
                    {{ csrf_field() }}
                    <div class="row">                        
        
                        <!--Superadmin Information -->
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Superadmin Password</div>
                                <div class="panel-body">

                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{session('error')}}  
                            </div>
                            @endif
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{session('success')}}     
                            </div>
                            @endif

                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="control-label">Current Password</label>
                                
                                <input id="current-password" type="password" class="form-control" name="current-password" required>
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="control-label">New Password</label>
                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('new-password') }}</strong>
                                        </span>
                                    @endif
                            </div>
    
                            <div class="form-group">
                                <label for="new-password-confirm" class="control-label">Confirm New Password</label>
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
    
                            <div class="form-group pull-right">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
        
                        </div></div></div>
                    </div>
                    
                </form>
            
        </div>
    </div>
@endsection