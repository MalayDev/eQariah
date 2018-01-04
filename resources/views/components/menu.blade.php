<?php $route = Request::path();?>
<div class="col-md-3">
    
        <div class="list-group">
            @if (Auth::guard('superadmin')->check())
                @if ($route == 'superadmin')
                    <a href="#" class="list-group-item active">Dashboard</a>
                    <a href="{{route('super.account')}}" class="list-group-item">Account</a>
                    <a href="{{route('super.mosque')}}" class="list-group-item">Mosque <span class="badge">10</span></a>
                    <a href="{{route('super.qariah')}}" class="list-group-item">Qariah</a>
                @elseif ($route == 'superadmin/account')
                    <a href="{{route('superadmin.dashboard')}}" class="list-group-item">Dashboard</a>
                    <a href="#" class="list-group-item active">Account</a>
                    <a href="{{route('super.mosque')}}" class="list-group-item">Mosque <span class="badge">10</span></a>
                    <a href="{{route('super.qariah')}}" class="list-group-item">Qariah</a>
                @elseif ($route == 'superadmin/mosque')
                    <a href="{{route('superadmin.dashboard')}}" class="list-group-item">Dashboard</a>
                    <a href="{{route('super.account')}}" class="list-group-item">Account</a>
                    <a href="#" class="list-group-item active">Mosque</a>
                    <a href="{{route('super.qariah')}}" class="list-group-item">Qariah</a>
                @elseif ($route == 'superadmin/qariah')
                    <a href="{{route('superadmin.dashboard')}}" class="list-group-item">Dashboard</a>
                    <a href="{{route('super.account')}}" class="list-group-item">Account</a>
                    <a href="{{route('super.mosque')}}" class="list-group-item">Mosque</a>
                    <a href="#" class="list-group-item active">Qariah</a>
                @else
                    <a href="{{route('superadmin.dashboard')}}" class="list-group-item">Dashboard</a>
                    <a href="{{route('super.account')}}" class="list-group-item">Account</a>
                    <a href="{{route('super.mosque')}}" class="list-group-item">Mosque <span class="badge">10</span></a>
                    <a href="{{route('super.qariah')}}" class="list-group-item">Qariah <span class="badge">10</span></a>
                @endif
            @endif
            @if (Auth::guard('admin')->check())
                @if ($route == 'admin')
                    <a href="#" class="list-group-item active">Dashboard</a>
                    <a href="{{route('admin.account')}}" class="list-group-item">Profile</a>
                    <a href="{{route('admin.account')}}" class="list-group-item">Account</a>
                    <a href="{{route('admin.qariah')}}" class="list-group-item">Qariah</a>
                @elseif ($route == 'admin/profile')
                    <a href="{{route('admin.dashboard')}}" class="list-group-item">Dashboard</a>
                    <a href="#" class="list-group-item active">Profile</a>
                    <a href="{{route('admin.account')}}" class="list-group-item">Account</a>
                    <a href="{{route('admin.qariah')}}" class="list-group-item">Qariah</a>
                @elseif ($route == 'admin/account')
                    <a href="{{route('admin.dashboard')}}" class="list-group-item">Dashboard</a>
                    <a href="{{route('admin.profile')}}" class="list-group-item">Profile</a>
                    <a href="#" class="list-group-item active">Account</a>
                    <a href="{{route('admin.qariah')}}" class="list-group-item">Qariah</a>
                @elseif ($route == 'admin/qariah')
                    <a href="{{route('admin.dashboard')}}" class="list-group-item">Dashboard</a>
                    <a href="{{route('admin.profile')}}" class="list-group-item">Profile</a>
                    <a href="{{route('admin.account')}}" class="list-group-item">Account</a>
                    <a href="#" class="list-group-item active">Qariah</a>
                @else
                    <a href="{{route('admin.dashboard')}}" class="list-group-item">Dashboard</a>
                    <a href="{{route('admin.profile')}}" class="list-group-item">Profile</a>
                    <a href="{{route('admin.account')}}" class="list-group-item">Account</a>
                    <a href="{{route('admin.qariah')}}" class="list-group-item">Qariah</a>
                @endif
            @endif
        </div>
    
</div>