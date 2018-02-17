@extends('layouts.admin_app')

@section('content')

<div class="login">
    <h1><a href="{{route('user.login')}}">e-Qariah</a></h1>
    <div class="login-bottom">
        <h2>Login</h2>
        <form class="form-horizontal" method="POST" action="{{ route('superadmin.login.submit') }}">
            {{ csrf_field() }}
            <div class="col-md-12">
                
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <div class="login-mail{{ $errors->has('email') ? ' has-error' : '' }}">
                    

                    <input id="email" type="email" placeholder="E-mel" name="email" value="{{ old('email') }}" required autofocus>
                    <i class="fa fa-envelope"></i>
                </div>
                
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div class="login-mail{{ $errors->has('password') ? ' has-error' : '' }}">
                    
                    <input id="password" type="password" placeholder="Kata Laluan" name="password" required>
                    <i class="fa fa-lock"></i>
                </div>
                <div class="row">
                    <div class="col-md-6 pull-left">
                            {{--  <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>  --}}
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                    </div>
                    <div class="col-md-6 pull-right">
                        <div class="login-do">
                            <label class="hvr-shutter-in-horizontal login-sub">
                                <input type="submit" value="login">

                            </label>    
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="clearfix"> </div>
        </form>
    </div>
</div>
@endsection
