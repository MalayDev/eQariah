<?php $route = Request::path();?>
<div class="row">
    <div class="col-md-12">
    
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if (Auth::guard('superadmin')->check())
                    @if ($route == 'superadmin')
                        <li class="breadcrumb-item active"><i class="fa fa-dashboard"></i> Dashboard</li>
                    @elseif ($route == 'superadmin/account')
                        <li class="breadcrumb-item"><a href="{{route('superadmin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Account</li>
                    @elseif ($route == 'superadmin/mosque')
                        <li class="breadcrumb-item"><a href="{{route('superadmin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Mosque</li>
                    @elseif ($route == 'superadmin/qariah')
                        <li class="breadcrumb-item"><a href="{{route('superadmin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Qariah</li>
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
                    @endif
                @endif
            </ol>
        </nav>

    </div>
</div>