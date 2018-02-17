<?php $route = Request::path();?>
<!--breadcumb-->	

    @if (strpos($route,'superadmin')!== false)
        @if (Auth::guard('superadmin')->check())
            <div class="row">
                <div class="col-md-12">  
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">

                                @if ($route == 'superadmin')
                                    <li class="breadcrumb-item active"><i class="fa fa-dashboard"></i> Dashboard</li>
                                    @else
                                    <li class="breadcrumb-item"><a href="{{route('superadmin.dashboard')}}">Dashboard</a></li>
                                    @if (strpos($route,'superadmin/account')!== false) 
                                        <li class="breadcrumb-item active">Account</li>
                                    @elseif (strpos($route,'superadmin/mosque')!== false) 
                                        @if ($route == 'superadmin/mosque') 
                                            <li class="breadcrumb-item active">Mosque</li>
                                        @else
                                            <li class="breadcrumb-item"><a href="{{route('super.mosque')}}">Mosque</a></li>
                                            @if (strpos($route,'/show')!== false)
                                                <li class="breadcrumb-item active">Mosque Profile</li>
                                            @elseif (strpos($route,'/edit')!== false)
                                                <li class="breadcrumb-item active">Edit Mosque Profile</li>
                                            @endif
                                        @endif
            
            
                                    @elseif (strpos($route,'superadmin/qariah')!== false)  
                                        @if ($route == 'superadmin/qariah') 
                                            <li class="breadcrumb-item active">Qariah</li>
                                        @else
                                            <li class="breadcrumb-item"><a href="{{route('super.qariah')}}">Qariah</a></li>
                                            @if (strpos($route,'/create')!== false)
                                                <li class="breadcrumb-item active">Create Qariah Profile</li>
                                            @elseif (strpos($route,'/show')!== false)
                                                <li class="breadcrumb-item active">Qariah Profile</li>
                                            @elseif (strpos($route,'/edit')!== false)
                                                <li class="breadcrumb-item active">Edit Qariah Profile</li>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                                
                        </ol>
                    </nav>
                </div>
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

        
        {{--  @if (Auth::guard('superadmin')->check())
        <div class="row">
            <div class="col-md-12">
            
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        
                            @if ($route == 'superadmin')
                                <li class="breadcrumb-item active"><i class="fa fa-dashboard"></i> Dashboard</li>
                            @else
                                <li class="breadcrumb-item"><a href="{{route('superadmin.dashboard')}}">Dashboard</a></li>
                                @if (strpos($route,'superadmin/account')!== false) 
                                    <li class="breadcrumb-item active">Account</li>
                                @elseif (strpos($route,'superadmin/mosque')!== false) 
                                    @if ($route == 'superadmin/mosque') 
                                        <li class="breadcrumb-item active">Mosque</li>
                                    @else
                                        <li class="breadcrumb-item"><a href="{{route('super.mosque')}}">Mosque</a></li>
                                        @if (strpos($route,'/show')!== false)
                                            <li class="breadcrumb-item active">Mosque Profile</li>
                                        @elseif (strpos($route,'/edit')!== false)
                                            <li class="breadcrumb-item active">Edit Mosque Profile</li>
                                        @endif
                                    @endif
        
        
                                @elseif (strpos($route,'superadmin/qariah')!== false)  
                                    @if ($route == 'superadmin/qariah') 
                                        <li class="breadcrumb-item active">Qariah</li>
                                    @else
                                        <li class="breadcrumb-item"><a href="{{route('super.qariah')}}">Qariah</a></li>
                                        @if (strpos($route,'/create')!== false)
                                            <li class="breadcrumb-item active">Create Qariah Profile</li>
                                        @elseif (strpos($route,'/show')!== false)
                                            <li class="breadcrumb-item active">Qariah Profile</li>
                                        @elseif (strpos($route,'/edit')!== false)
                                            <li class="breadcrumb-item active">Edit Qariah Profile</li>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        
                    </ol>
                </nav>
        
            </div>
        </div>
        @endif  --}}
        
    
