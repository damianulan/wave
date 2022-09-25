<div class="main-menu menu-fixed">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="navbar-logo" src="{{ asset('themes/'.$theme.'/images/icons/logo/svg/wave-logo-color.svg') }}">
            <span>{{ config('app.name') }}</span>
        </a>
        
    </a>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
          <i class="bi bi-speedometer2"></i>
          Home
        </a>
      </li>
      <li class="navigation-header">
        <span>MODUŁY</span>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
          Orders
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
          Products
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="bi bi-speedometer2"></i>
          Customers
        </a>
      </li>
    </ul>
  </div>