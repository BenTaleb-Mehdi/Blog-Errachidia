<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <div id="app">
        <!-- Navbar -->
        <nav class="backdrop-blur-xl bg-white/40 border-b border-white/20 fixed top-0 left-0 w-full z-50 shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-800 hover:text-blue-600 transition">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <!-- Mobile toggle -->
                    <button type="button"
                        class="hs-collapse-toggle lg:hidden inline-flex items-center justify-center p-2 rounded-lg border border-white/30 backdrop-blur-md hover:bg-white/20 transition"
                        data-hs-collapse="#navbar-menu" aria-controls="navbar-menu" aria-label="Toggle navigation">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Menu -->
                    <div id="navbar-menu" class="hs-collapse hidden lg:flex lg:items-center lg:justify-end lg:gap-6 w-full lg:w-auto">
                        <div class="flex items-center gap-6">
                            @guest
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="text-gray-900/90 hover:text-blue-600 font-medium transition">
                                        Login
                                    </a>
                                @endif

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-gray-900/90 hover:text-blue-600 font-medium transition">
                                        Register
                                    </a>
                                @endif
                            @else
                                <!-- User Dropdown -->
                                <div class="hs-dropdown relative inline-flex">
                                    <button type="button"
                                        class="hs-dropdown-toggle inline-flex items-center gap-2 font-medium text-gray-900/90 hover:text-blue-600 transition">
                                        {{ Auth::user()->name }}
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M6 9l6 6 6-6" />
                                        </svg>
                                    </button>

                                    <div class="hs-dropdown-menu hidden z-50 mt-2 w-48 bg-white/70 backdrop-blur-xl shadow-lg rounded-xl p-2 border border-white/30">
                                        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                class="w-full text-left px-4 py-2 text-gray-800 hover:bg-white/40 rounded-lg transition">
                                            Logout
                                        </button>
                                    </div>
                                </div>

                                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="pt-20 p-7">
            @yield('content')
        </main>
    </div>
</body>
</html>
