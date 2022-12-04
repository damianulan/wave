<nav class="nav p-2 text-uppercase">
    <a class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}" href="{{ route('tasks.index') }}">{{ __('modules.my_tasks') }}</a>
    <a class="nav-link {{ request()->routeIs('tasks.commissioned') ? 'active' : '' }}" href="{{ route('tasks.commissioned') }}">{{ __('modules.commissioned') }}</a>
    <a class="nav-link {{ request()->routeIs('tasks.completed') ? 'active' : '' }}" href="{{ route('tasks.completed') }}">{{ __('modules.completed') }}</a>
    <a class="btn btn-round btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addTask"><i class="bi bi-plus-lg"></i></a>

</nav>