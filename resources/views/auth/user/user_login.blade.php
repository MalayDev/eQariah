@extends('layouts.user_app')

@section('content')
<div class="overlay"></div>

    <div class="masthead">
        <div class="masthead-bg"></div>
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto">
                    <div class="masthead-content text-white py-5 py-md-0">
                        <h1 class="mb-3">e-Qariah</h1>
                        <p class="mb-5">Sistem Pengurusan Mukim Negeri Selangor</p>
              
                        <form class="form-horizontal" method="POST" action="{{ route('user.login.submit') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('ic') ? ' has-error' : '' }}">
                                @if ($errors->has('ic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ic') }}</strong>
                                    </span>
                                    <br>
                                @endif

                                @if (Session::has('warning'))
                                    <span class="help-block">
                                        <strong>{{ Session::get('warning') }}</strong>
                                    </span>
                                    <br>
                                @endif

                                <div class="input-group input-group-newsletter">
                                    <input id="ic" type="text" class="form-control" name="ic" placeholder="I/C" value="{{ old('ic') }}" required >
                                    
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">Login<i class="fa fa-sign-in"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="social-icons">
        <ul class="list-unstyled text-center mb-0">
            <li class="list-unstyled-item">
                <a href="{{route('admin.login')}}">
                    <img src="{{ asset('storage/mosque-icon.png') }}" title="Masjid" />
                </a>
            </li>
            <li class="list-unstyled-item">
                <a href="#">
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li class="list-unstyled-item">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
        </ul>
    </div>
    @endsection


