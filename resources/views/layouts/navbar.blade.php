<nav id="sidebar" class="main-menu menu-fixed <?php if(isset($_COOKIE['menu-collapsed'])&&$_COOKIE['menu-collapsed']==true){ echo 'menu-collapsed'; }?>">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="navbar-logo" src="{{ asset('themes/'.$theme.'/images/icons/logo/png/wave-logo-color-box.png') }}">
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
        <a href="#" class="nav-link">
            <i class="bi bi-journal-plus"></i>
            {{__('menus.new_visit')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-calendar2-week"></i>
            {{__('menus.calendar')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-check2-square"></i>
            {{__('menus.todo')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-people"></i>
            {{__('menus.clients')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-box-seam"></i>
            <span class="menu-title">{{__('menus.products')}}</span>
            <span class="badge badge-primary-light badge-pill">{{__('vocabulary.soon')}}</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-wallet2"></i>
            {{__('menus.loyalty')}}
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
        <a href="#" class="nav-link">
            <i class="bi bi-person-badge"></i>
            {{__('menus.users')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-tag"></i>
            {{__('menus.tags')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-scissors"></i>
            {{__('menus.services')}}
        </a>
      </li>
      @role('root')
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-gear"></i>
            {{__('menus.settings')}}
        </a>
      </li>
      @endrole
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