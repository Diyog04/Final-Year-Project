<header class=" py-2 px-4 d-flex justify-content-between align-items-center">
    <div class="logo text-white fs-4 fw-bold">VenueSathi</div>
    
    <nav>
        <ul class="navbar-nav d-flex flex-row align-items-center m-0" style="gap: 20px;">

            <!-- Public links -->
            <li class="nav-item"><a class="nav-link text-white" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="/about">About</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="/blog">Blog</a></li>

            <!-- Logged-in users: My Bookings -->
            @auth
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('user.recent-bookings') }}">My Bookings</a>
                </li>
            @endauth

            <!-- Guest: Login & Register -->
            @guest
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">
                         Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('register') }}">
                         Register
                    </a>
                </li>
            @endguest

            <!-- Authenticated User: Notification + Profile Dropdown -->
            @auth
                <!-- Notifications Dropdown -->
                <li class="nav-item dropdown">
                    <button class="btn nav-link position-relative text-white" id="notificationDropdownBtn"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell fa-lg"></i>
                        @php
                            $notificationCount = auth()->user()->unreadNotifications->count();
                            $callCount = isset($calls) && is_countable($calls) ? count($calls) : 0;
                            $unreadCount = $notificationCount + $callCount;
                        @endphp
                        @if ($unreadCount > 0)
                            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                                {{ $unreadCount }}
                            </span>
                        @endif
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow"
                        aria-labelledby="notificationDropdownBtn"
                        style="width: 350px; max-height: 500px; overflow-y: auto; background-color: rgba(0, 0, 0, 0.9); color: white; border: none;">
                        <li class="px-3 py-2 d-flex justify-content-between align-items-center border-bottom border-secondary">
                            <span>Notifications ({{ $unreadCount }})</span>
                            <form action="{{ route('notifications.markAllRead') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 text-white text-decoration-none">Mark All</button>
                            </form>
                        </li>

                        @forelse(auth()->user()->unreadNotifications as $notification)
                            <li>
                                <a href="{{ $notification->data['url'] ?? '#' }}" class="dropdown-item text-white">
                                    {{ $notification->data['message'] ?? 'New notification' }}
                                </a>
                            </li>
                        @empty
                            <li class="px-3 py-2 text-muted">No new notifications</li>
                        @endforelse
                    </ul>
                </li>

                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle fa-lg"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow"
                        aria-labelledby="userDropdown"
                        style="min-width: 200px; background-color: rgba(0, 0, 0, 0.95); border: none; color: white;">
                        
                        <li class="px-3 py-2 border-bottom border-secondary">
                            <strong>{{ auth()->user()->name ?? auth()->user()->email }}</strong>
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-white"
                                    style="background-color: transparent;">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endauth
        </ul>
    </nav>
</header>
