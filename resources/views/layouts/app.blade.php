<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet "type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?= asset('vendor/components/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if (Auth::guard('superadmin')->check())
                        <a class="navbar-brand" href="{{ route('superadmin.dashboard') }}">
                            {{--  {{ config('app.name', 'Admin') }}  --}}
                            Superadmin
                        </a>
                    @endif
                    @if (Auth::guard('admin')->check())
                        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                            {{--  {{ config('app.name', 'Admin') }}  --}}
                            Admin
                        </a>
                    @endif
                    @if (Auth::guard('web')->check())
                        <a class="navbar-brand" href="{{ route('home') }}">
                            {{--  {{ config('app.name', 'Home') }}  --}}
                            {{trans('lang.Home')}}
                        </a>
                    @endif
                    @if (Auth::check() == null)
                        <a class="navbar-brand" href="{{ route('home') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li>
                            <a class="navbar-brand" href="#">
                                @if (App::getLocale() == 'en')
                                    <img  class="pull-right" src="{{ asset('storage/GB.png') }}">
                                @elseif (App::getLocale() == 'ms')
                                    <img  class="pull-right" src="{{ asset('storage/MY.png') }}">
                                @endif
                                
                            </a>
                        </li>
                        <li>
                            <form id="lang_form" class="navbar-form" action="{{ route('language') }}" method="post">        
                                <div class="form-group">
                                <select class="form-control" name="locale" id="locale"  onchange="submit()" >
                                    @if (App::getLocale() == 'en')
                                        <option selected disabled>English</option>
                                        <option value="ms" >{{trans('lang.Malay')}}</option>
                                    @elseif (App::getLocale() == 'ms')
                                        <option selected disabled >Bahasa Melayu</option>
                                        <option value="en" >Bahasa {{trans('lang.English')}}</option>
                                    @endif
                                </div>
                                </select>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                            </form> 
                        </li>
                    
                        @guest 
                            <li><a href="{{ route('login') }}">{{trans('lang.Login')}}</a></li>
                            <li><a href="{{ route('register') }}">{{trans('lang.Register')}}</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        @if(Auth::guard('web')->check())
                                            <a href="{{ route('user.logout') }}">
                                                {{trans('lang.Logout')}}
                                            </a>
                                        @endif
                                        @if(Auth::guard('admin')->check())
                                            <a href="{{ route('admin.logout') }}">
                                                {{trans('lang.Admin Logout')}}      
                                            </a>
                                        @endif
                                        @if(Auth::guard('superadmin')->check())
                                            <a href="{{ route('superadmin.logout') }}">
                                                Super Admin Logout
                                            </a>
                                        @endif
                                    
                                    
                                        
                                            
                                        
                                        
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
    
    
</body>
</html>
