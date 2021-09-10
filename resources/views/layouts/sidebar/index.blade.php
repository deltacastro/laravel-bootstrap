<div class="d-flex flex-column flex-shrink-0 py-3 text-gray-800 bg-white shadow" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-gray-800 text-decoration-none fs-4 my-5">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">{{ env('APP_NAME') }}</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto fw-bold">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link text-gray-800 {{ (request()->is('dashboard')) ? 'active disabled' : '' }}">
                <i class="bi bi-house-door me-2"></i>
                Inicio
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link text-gray-800 {{ (request()->is('admin/usuarios')) ? 'active disabled' : '' }}">
                <i class="bi bi-people me-2"></i>
                Admin Usuarios
            </a>
        </li>
    </ul>
</div>
