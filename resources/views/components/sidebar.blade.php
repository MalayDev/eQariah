<?php $route = Request::path();?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            @if (Auth::guard('admin')->check())
                @if ($route == 'admin')
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-home nav_icon "></i><span class="nav-label">Home</span> </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('admin.dashboard')}}" class=" hvr-bounce-to-right"><i class="fa fa-home nav_icon "></i><span class="nav-label">Home</span> </a>
                    </li>
                @endif

                @if ($route == 'admin/Profilee')
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-edit nav_icon "></i><span class="nav-label">Profile</span> </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('admin.profile')}}" class=" hvr-bounce-to-right"><i class="fa fa-edit nav_icon "></i><span class="nav-label">Profile</span> </a>
                    </li>
                @endif

                @if ($route == 'admin/account')
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon "></i><span class="nav-label">Account</span> </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('admin.account')}}" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon "></i><span class="nav-label">Account</span> </a>
                    </li>
                @endif
                
                @if ($route == 'admin/qariah')
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon "></i><span class="nav-label">Qariah</span> </a>
                    </li> 
                @else
                    <li>
                        <a href="{{ route('admin.qariah')}}" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon "></i><span class="nav-label">Qariah</span> </a>
                    </li> 
                @endif
     
            @endif
              
        </ul>
    </div>
</div>