@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ic') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Enter IC. Number :</label>

                            <div class="col-md-6">
                                <input id="ic" type="text" class="form-control" name="ic" value="{{ old('ic') }}" required autofocus>

                                @if ($errors->has('ic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
