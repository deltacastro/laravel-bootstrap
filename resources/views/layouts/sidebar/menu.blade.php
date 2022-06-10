<a href="/" class="d-flex align-items-center justify-content-center col-12 mb-3 mb-md-0 me-md-auto text-gray-800 text-decoration-none">
    <img class="img-fluid p-3" src="{{ asset('images/logo.png') }}" alt="">
</a>
<hr>
<ul class="nav nav-pills flex-column mb-auto fs-6 fw-normal">
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('dashboard')) ? 'active disabled' : '' }}">
            <i class="bi bi-house-door me-2"></i>
            Inicio
        </a>
    </li>
    <li>
        <hr class="dropdown-divider">
    </li>
    @can('viewAny', App\Models\User::class)
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link {{ (request()->is('admin/usuarios')) ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i>
                Admin Usuarios
            </a>
        </li>
    @endcan
    <li class="nav-item">
        <a href="{{ route('admin.role.index') }}" class="nav-link {{ (request()->is('admin/roles')) ? 'active' : '' }}">
            <i class="bi bi-people me-2"></i>
            Admin Roles
        </a>
    </li>
</ul>
