<div class="header-top-account d-flex justify-content-end">
    <div class="dropdown">
        <button class="btn btn-sm bg-white border border-light-subtle rounded-pill d-flex align-items-center gap-2 shadow-sm text-dark px-3 py-1" 
                type="button" 
                data-bs-toggle="dropdown" 
                aria-expanded="false">
            <i class="fa-regular fa-user text-primary fs-6"></i>
            <span class="fw-medium">
                @auth
                    {{ auth()->user()->name }}
                @else
                    Account
                @endauth
            </span>
            <i class="fa-solid fa-chevron-down text-muted fs-8 ms-1"></i>
        </button>

        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4 my-2 p-2" style="min-width: 200px;">
            @guest
                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-3" href="{{ route('login') }}" wire:navigate>
                        <i class="fa-solid fa-right-to-bracket text-primary fs-6"></i>
                        <span>Log in</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-3" href="{{ route('register') }}" wire:navigate>
                        <i class="fa-solid fa-user-plus text-secondary fs-6"></i>
                        <span>Sign up</span>
                    </a>
                </li>
            @endguest

            @auth
                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-3" href="{{ route('account') }}" wire:navigate>
                        <i class="fa-solid fa-id-card text-secondary fs-6"></i>
                        <span>My profile</span>
                    </a>
                </li>

                @if (auth()->user()->is_admin)
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-3 text-primary fw-medium" href="{{ route('admin') }}" wire:navigate>
                            <i class="fa-solid fa-gauge-high fs-6"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endif

                <li><hr class="dropdown-divider my-1"></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-3 text-danger fw-medium">
                            <i class="fa-solid fa-right-from-bracket fs-6"></i>
                            <span>Log out</span>
                        </button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</div>