<div class="d-flex flex-column flex-shrink-0 py-3 text-white bg-navy-blue" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">LaraBoot</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto fw-bold">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link text-white {{ (request()->is('dashboard')) ? 'active disabled' : '' }}">
                <i class="bi bi-house-door me-2"></i>
                Inicio
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link text-white {{ (request()->is('admin/usuarios')) ? 'active disabled' : '' }}">
                <i class="bi bi-people me-2"></i>
                Admin Usuarios
            </a>
        </li>
    </ul>
    {{-- <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" class="rounded-circle me-2" width="32" height="32">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div> --}}
</div>
