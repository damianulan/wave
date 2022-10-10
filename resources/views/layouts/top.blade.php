@php
    $username = auth()->user()->firstname . ' ' . auth()->user()->lastname;
@endphp
<nav id="topbar" class="top-menu sticky-menu menu-expand menu-shadow <?php if(isset($_COOKIE['menu-collapsed'])&&$_COOKIE['menu-collapsed']==true){ echo 'menu-collapsed'; }?>">
    <div class="menu-wrapper">
        <div class="menu-container">
            <div class="mr-auto float-left d-flex align-items-center">
                <ul class="nav column-flex bookmark-icons">
                    <li class="nav-item d-none d-lg-block">
                        <a id="menu-toggle" class="nav-link" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="{{__('menus.collapse')}}">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="{{__('menus.support')}}">
                            <i class="bi bi-life-preserver"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="{{__('menus.todo')}}">
                            <i class="bi bi-check2-square"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="{{__('menus.add_client')}}">
                            <i class="bi bi-person-plus"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav float-right bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="{{__('menus.fullscreen')}}">
                        <i class="bi bi-fullscreen"></i>
                    </a>
                </li>
                @include('components.notificationsDropdown')
                <li class="dropdown dropdown-notification dropdown-toggle nav-item">

                </li>
                <li class="dropdown dropdown-profile dropdown-toggle nav-item">
                    <a class="nav-link d-flex align-items-center" href="#" data-mdb-toggle="dropdown" aria-expanded="false">
                        <div class="user-nav d-sm-flex">
                            <span class="user-name">{{$username}}</span>
                        </div>
                        <img class="rounded-circle" src="{{auth()->user()->avatar}}" width="40" height="40" alt="avatar">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        <a class="dropdown-item" href="#">
                            {{__('menus.profile')}}
                        </a>
                        <a class="dropdown-item" href="{{route('auth.logout')}}">
                            {{__('menus.logout')}}
                        </a>

                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>