<?php $route = Request::path();?>
<div class="row">
    <div class="col-md-12">
    
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if (Auth::guard('superadmin')->check())
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
                @endif
                @if (Auth::guard('admin')->check())
                    @if ($route == 'admin')
                        <li class="breadcrumb-item active">Dashboard</li>
                    @elseif ($route == 'admin/profile')
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    @elseif ($route == 'admin/account')
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Account</li>
                    @elseif ($route == 'admin/qariah')
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Qariah</li>
                    @elseif ($route == 'admin/qariah/create')
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.qariah')}}">Qariah</a></li>   
                        <li class="breadcrumb-item active">Create Qariah</li> 
                    @elseif ($route == 'admin/qariah/upload')
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.qariah')}}">Qariah</a></li>   
                        <li class="breadcrumb-item active">Upload Qariah</li>    
                    @endif
                @endif
            </ol>
        </nav>

    </div>
</div>