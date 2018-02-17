<?php $route = Request::path();?>
<!--breadcumb-->	

    @if (strpos($route,'superadmin')!== false)
        @if (Auth::guard('superadmin')->check())
        <div class="breadcumb">
            @if ($route == 'superadmin')
                <h2><i class="fa fa-dashboard"></i><span>Dashboard</span></h2>
            @else
                <h2>
                    <i class="fa fa-dashboard"></i>
                    <a href="{{ route('superadmin.dashboard') }}">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                @if ($route == 'superadmin/account')
                    <span>Account</span>
                @elseif (strpos($route,'superadmin/mosque')!== false) 
                        @if ($route == 'superadmin/mosque') 
                            <span>Mosque</span>
                        @else
                            <a href="{{ route('super.mosque') }}">Mosque</a>
                            <i class="fa fa-angle-right"></i>
                            @if (strpos($route,'/create')!== false)
                                <span>Registration</span>
                            @elseif (strpos($route,'/show')!== false)
                                <span>Profile</span>
                            @elseif (strpos($route,'/edit')!== false)
                                <span>Update</span>
                            @endif
                        @endif
                @elseif (strpos($route,'superadmin/qariah')!== false)  
                        @if ($route == 'superadmin/qariah') 
                            <span>Qariah</span>
                        @else
                            <a href="{{ route('super.qariah') }}">Qariah</a>
                            <i class="fa fa-angle-right"></i>
                            @if (strpos($route,'/create')!== false)
                                <span>Registration</span>
                            @elseif (strpos($route,'/show')!== false)
                                <span>Profile</span>
                            @elseif (strpos($route,'/edit')!== false)
                                <span>Update</span>
                            @endif
                        @endif
                @endif
                </h2>
            @endif
        </div>
        @endif
    
    @elseif (strpos($route,'admin')!== false)
        @if (Auth::guard('admin')->check())
            <div class="breadcumb">
            @if ($route == 'admin')
                <h2><i class="fa fa-home"></i><span>Home</span></h2>
            @else
                <h2>
                    <i class="fa fa-home"></i>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                @if ($route == 'admin/profile')
                    <span>{{ ucwords(Auth::user()->name) }}</span>
                @elseif ($route == 'admin/account')
                    <span>Account</span>
                @elseif (strpos($route,'admin/qariah')!== false)
                    @if ($route == 'admin/qariah')
                        <span>Qariah</span>
                    
                    @elseif (strpos($route,'/show')!== false)
                        <a href="{{ route('admin.qariah') }}">Qariah</a>
                        <i class="fa fa-angle-right"></i>
                        <span>Profile</span>

                    @elseif (strpos($route,'/create')!== false)
                        <a href="{{ route('admin.qariah') }}">Qariah</a>
                        <i class="fa fa-angle-right"></i>
                        <span>Registration</span>

                    @elseif (strpos($route,'/upload')!== false)
                        <a href="{{ route('admin.qariah') }}">Qariah</a>
                        <i class="fa fa-angle-right"></i>
                        <span>Upload Qariah</span>
                        
                    @endif
                @endif
                </h2>
            @endif
            </div>
        @endif
    @elseif ($route == 'home')
        @if (Auth::guard('web')->check())
            <div class="breadcumb">
                <h2><i class="fa fa-home"></i><span>Home</span></h2>
            </div>
        @endif
    @endif

    

        

    
