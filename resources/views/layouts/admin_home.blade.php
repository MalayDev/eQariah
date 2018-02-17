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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="<?= asset('vendor/components/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Footable CSS -->
    <link href="{{ asset('css/footable/footable.core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footable/bootstrap-select.min.css') }}" rel="stylesheet" />

    

    <!-- Mainly scripts -->
    <script src="{{ asset('js/admin/jquery.metisMenu.js') }}"> </script>
    <script src="{{ asset('js/admin/jquery.slimscroll.min.js') }}"> </script>

    <!-- Custom and plugin javascript -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/graph.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clndr.css') }}" rel="stylesheet">
    
    
    <script src="{{ asset('js/admin/Chart.js') }}"></script>
    <script src="{{ asset('js/admin/clndr.js') }}"></script>
    <script src="{{ asset('js/admin/custom.js') }}"> </script>
    <script src="{{ asset('js/admin/screenfull.js') }}"> </script>

    <!--pie-chart-->
    <script src="{{ asset('js/admin/pie-chart.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

        
        });

    </script>
    <!--skycons-icons-->
    <script src="{{ asset('js/admin/skycons.js') }}"></script>
    <!--//skycons-icons-->
    <!--graph-->
    <link rel="stylesheet" href="{{ asset('css/graph.css') }}">
    <!--//graph-->
    <script src="{{ asset('js/admin/jquery.flot.js') }}"></script>
    <!----Calender -------->
    <link rel="stylesheet" href="{{ asset('css/clndr.css') }}" type="text/css" />
    <script src="{{ asset('js/admin/underscore-min.js') }}" type="text/javascript"></script>
    <script src= "{{ asset('js/admin//moment-2.2.1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/clndr.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/site.js') }}" type="text/javascript"></script>
    <!----End Calender -------->
    
</head>
<body>
        <div id="wrapper">
                <nav class="navbar-default navbar-fixed-top" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        @if(Auth::guard('superadmin')->check())
                            <h1> <a class="navbar-brand" href="{{ route('superadmin.dashboard')}}">Superadmin</a></h1> 
                        @elseif(Auth::guard('admin')->check())
                            <h1> <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin</a></h1> 
                        @endif
                                
                    </div>
             
               
                    <!-- Brand and toggle get grouped for better mobile display -->
                 
                   <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="drop-men" >
                        <ul class=" nav_1">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">{{ ucwords(Auth::user()->name) }}<i class="caret"></i></span><img src="{{ asset('storage/user.jpg') }}"></a>
                              <ul class="dropdown-menu " role="menu">
                                <li>
                                    @if(Auth::guard('superadmin')->check())
                                        <a href="{{ route('superadmin.logout') }}">
                                            Logout <i class="fa fa-sign-out"></i>      
                                        </a>
                                    @elseif(Auth::guard('admin')->check())
                                    <a href="{{ route('admin.logout') }}">
                                        Logout <i class="fa fa-sign-out"></i>      
                                    </a>
                                    @endif
                                </li>
                              </ul>
                            </li>  
                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <div class="clearfix"></div>
                    
                    @component('components.sidebar')
                    @endcomponent
                    
                </nav>
                
                <div id="page-wrapper">      
                    <div class="content-main">
                        <br><br>
                        @yield('content')
                        
                    </div>
                    <div class="copy navbar-static-bottom">
                            <p> &copy; 2018 Codeconut Technology. All Rights Reserved</p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    @yield('script')
    
    
</body>
</html>
