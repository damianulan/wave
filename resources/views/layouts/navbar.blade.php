<div class="main-menu menu-fixed">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="navbar-logo" src="{{ asset('themes/'.$theme.'/images/icons/logo/png/wave-icon-color.png') }}">
            <span>{{ config('app.name') }}</span>
        </a>
        
    </a>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active">
          <i class="bi bi-menu-button-wide"></i>
          {{__('menus.dashboard')}}
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
        <a href="#" class="disabled nav-link">
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
        <a href="#" class="nav-link active">
            <i class="bi bi-speedometer2"></i>
            <span class="menu-title">{{__('menus.products')}}</span>
            <span class="badge badge-secondary badge-pill">{{__('vocabulary.soon')}}</span>
        </a>

      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
            {{__('menus.loyalty')}}
        </a>
      </li>
      <li class="navigation-header">
        <span>{{__('menus.business')}}</span>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
            {{__('menus.company_info')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
            {{__('menus.analytics')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
            {{__('menus.finances')}}
        </a>
      </li>
      <li class="navigation-header">
        <span>{{__('menus.administration')}}</span>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
            {{__('menus.users')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
            {{__('menus.tags')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
            {{__('menus.settings')}}
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
            {{__('menus.services')}}
        </a>
      </li>
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
  </div>