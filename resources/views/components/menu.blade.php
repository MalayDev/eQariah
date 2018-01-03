<?php $route = Request::path();?>
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">{{trans('lang.Settings')}}</div>
        <div class="list-group">
            @if (Auth::guard('superadmin')->check())
                @if ($route == 'superadmin/account')
                    <a href="#" class="list-group-item active">Account</a>
                    <a href="{{route('super.mosque')}}" class="list-group-item">Mosque</a>
                    <a href="{{route('super.qariah')}}" class="list-group-item">Qariah</a>
                @elseif ($route == 'superadmin/mosque')
                    <a href="{{route('super.account')}}" class="list-group-item">Account</a>
                    <a href="#" class="list-group-item active">Mosque</a>
                    <a href="{{route('super.qariah')}}" class="list-group-item">Qariah</a>
                @elseif ($route == 'superadmin/qariah')
                    <a href="{{route('super.account')}}" class="list-group-item">Account</a>
                    <a href="{{route('super.mosque')}}" class="list-group-item">Mosque</a>
                    <a href="#" class="list-group-item active">Qariah</a>
                @else
                    <a href="{{route('super.account')}}" class="list-group-item">Account</a>
                    <a href="{{route('super.mosque')}}" class="list-group-item">Mosque</a>
                    <a href="{{route('super.qariah')}}" class="list-group-item">Qariah</a>
                @endif
            @endif
            @if (Auth::guard('admin')->check())
                @if ($route == 'admin/profile')
                    <a href="#" class="list-group-item active">Profile</a>
                    <a href="{{route('admin.account')}}" class="list-group-item">Account</a>
                    <a href="{{route('admin.qariah')}}" class="list-group-item">Qariah</a>
                @elseif ($route == 'admin/account')
                    <a href="{{route('admin.profile')}}" class="list-group-item">Profile</a>
                    <a href="#" class="list-group-item active">Account</a>
                    <a href="{{route('admin.qariah')}}" class="list-group-item">Qariah</a>
                @elseif ($route == 'admin/qariah')
                    <a href="{{route('admin.profile')}}" class="list-group-item">Profile</a>
                    <a href="{{route('admin.account')}}" class="list-group-item">Account</a>
                    <a href="#" class="list-group-item active">Qariah</a>
                @else
                    <a href="{{route('admin.profile')}}" class="list-group-item">Profile</a>
                    <a href="{{route('admin.account')}}" class="list-group-item">Account</a>
                    <a href="{{route('admin.qariah')}}" class="list-group-item">Qariah</a>
                @endif
            @endif
        </div>
    </div>
</div>