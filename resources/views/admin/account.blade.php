@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @component('components.menu')
            @endcomponent

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Change Password</div>
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

                            {{-- start form --}}
                            <form method="POST" action="{{ route('changePassword') }}">
                            {{ csrf_field() }}
 
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
        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
                                    </button>
                                </div>
                            </form>
                        {{-- end form --}}
                        </div>
                </div>  

            </div>


        </div>
</div>
@endsection