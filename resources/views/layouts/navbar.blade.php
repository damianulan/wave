<nav id="sidebar" class="main-menu menu-fixed <?php if(isset($_COOKIE['menu-collapsed'])&&$_COOKIE['menu-collapsed']==true){ echo 'menu-collapsed'; }?>">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="navbar-logo" src="{{ asset('/images/logo/png/wave-logo-color-box.png') }}">
            <span>{{ config('app.name') }}</span>
        </a>
    </a>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{route('home')}}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
          <i class="bi bi-menu-button-wide"></i>
          <span class="nav-title">{{__('menus.dashboard')}}</span>
        </a>
      </li>
      <li class="navigation-header">
        <span>{{__('menus.apps')}}</span>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#addVisit">
            <i class="bi bi-calendar2-plus"></i>
            {{__('menus.new_visit')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('calendar.index')}}" class="nav-link {{ request()->routeIs('calendar.*') ? 'active' : '' }}">
            <i class="bi bi-calendar2-week"></i>
            {{__('menus.calendar')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('tasks.index')}}" class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
            <i class="bi bi-check2-square"></i>
            {{__('menus.todo')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('clients.index')}}" class="nav-link {{ request()->routeIs('clients.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i>
            {{__('menus.clients')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('products.index')}}" class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
            <i class="bi bi-box-seam"></i>
            <span class="menu-title">{{__('menus.products')}}</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('loyalties.index')}}" class="nav-link {{ request()->routeIs('loyalties.*') ? 'active' : '' }}">
            <i class="bi bi-wallet2"></i>
            {{__('menus.loyalties')}}
        </a>
      </li>
      <li class="navigation-header">
        <span>{{__('menus.business')}}</span>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-briefcase"></i>
            {{__('menus.company_info')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-graph-up-arrow"></i>
            {{__('menus.analytics')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-piggy-bank"></i>
            {{__('menus.finances')}}
        </a>
      </li>
      <li class="navigation-header">
        <span>{{__('menus.administration')}}</span>
      </li>
      <li class="nav-item">
        <a href="{{route('users.index')}}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <i class="bi bi-person-badge"></i>
            {{__('menus.users')}}
        </a>
      </li>
      @module('tags')
      <li class="nav-item">
        <a href="{{route('tags.index')}}" class="nav-link {{ request()->routeIs('tags.*') ? 'active' : '' }}">
            <i class="bi bi-tag"></i>
            {{__('menus.tags')}}
        </a>
      </li>
      @endmodule
      @module('services')
      <li class="nav-item" id="services">
        <a href="{{route('services.index')}}" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
            <i class="bi bi-scissors"></i>
            {{__('menus.services')}}
        </a>
      </li>
      @endmodule
      @can('app/config')
      <li class="nav-item">
        <a href="{{route('settings.index')}}" class="nav-link {{ request()->routeIs('settings.*') ? 'active' : '' }}">
            <i class="bi bi-gear"></i>
            {{__('menus.settings')}}
        </a>
      </li>
      @endcan
      {{-- <li class="navigation-header">
        <span>{{__('menus.help')}}</span>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
            {{__('menus.knowledge_base')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
            {{__('menus.support')}}
        </a>
      </li> --}}
    </ul>
  </nav>
  @include('pages.visits.create')