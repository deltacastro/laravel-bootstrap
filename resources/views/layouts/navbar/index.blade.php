<nav class="navbar navbar-light navbar-expand-md bg-transparent justify-content-center shadow-sm mb-3">
    <div class="col-12 px-3 py-1">
        <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
            <h2 class="fw-bold">{{ env('APP_NAME') }}</h2>
            <ul class="nav navbar-nav ms-auto justify-content-end">
                <li class="nav-item dropdown">
                    <a class="fw-bold nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ Auth::user()->person->fullName }} </a>
                    <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarScrollingDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
