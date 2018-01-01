<?php $route = Request::path();?>
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">{{trans('lang.Settings')}}</div>
        <div class="list-group">
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
        </div>
    </div>
</div>