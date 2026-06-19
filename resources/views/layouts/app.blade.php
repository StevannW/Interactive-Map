
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Stevanus Wahyu | GIS & Fullstack Developer')</title>

    <meta
        name="description"
        content="@yield('description', 'Aplikasi visualisasi data spasial menggunakan Laravel, Tailwind CSS, dan MapLibre GL.')">

    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Stevanus Wahyu | GIS & Fullstack Developer')">
    <meta property="og:description" content="@yield('description')">

    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <!-- Header -->

<header class="sticky top-0 z-50 border-b border-white/10 bg-slate-950/80 backdrop-blur-xl">

    <nav class="mx-auto flex h-16 max-w-7xl items-center justify-between px-6">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="group flex items-center gap-3">

            <div
                class="relative flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600 shadow-lg shadow-cyan-500/20 transition-transform duration-300 group-hover:scale-105">

                <!-- Globe Icon -->
   
<svg xmlns="http://www.w3.org/2000/svg"
    class="h-6 w-6 text-white"
    fill="none"
    viewBox="0 0 24 24"
    stroke-width="1.8"
    stroke="currentColor">

    <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M12 21a9 9 0 100-18 9 9 0 000 18Z" />

    <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M3.6 9h16.8M3.6 15h16.8M12 3a15.3 15.3 0 010 18M12 3a15.3 15.3 0 000 18" />
</svg>
                <!-- Marker -->
                <div
                    class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 ring-2 ring-slate-950">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-2.5 w-2.5 text-white"
                        fill="currentColor"
                        viewBox="0 0 20 20">

                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M10 2a5 5 0 00-5 5c0 3.4 5 9 5 9s5-5.6 5-9a5 5 0 00-5-5zm0 7a2 2 0 100-4 2 2 0 000 4z" />
                    </svg>

                </div>

            </div>

            <div>

                <span class="block text-base font-bold text-white">
                    Stevanus Wahyu
                </span>


            </div>

        </a>

        <!-- Navigation -->
        <div class="flex items-center gap-2">

            <!-- Home -->
            <a href="{{ route('home') }}"
                class="flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-medium transition
                {{ request()->routeIs('home')
                    ? 'bg-cyan-500/15 text-cyan-400'
                    : 'text-slate-300 hover:bg-white/5 hover:text-cyan-400' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 12L11.204 3.045a1.125 1.125 0 011.592 0L21.75 12M4.5 9.75v10.125A1.125 1.125 0 005.625 21h3.75V15.75h5.25V21h3.75a1.125 1.125 0 001.125-1.125V9.75" />
                </svg>

                <span class="hidden sm:inline">
                    Home
                </span>

            </a>

            <!-- Live Map -->
            <a href="{{ route('map') }}"
                class="flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-medium transition
                {{ request()->routeIs('map')
                    ? 'bg-cyan-500/15 text-cyan-400'
                    : 'text-slate-300 hover:bg-white/5 hover:text-cyan-400' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 21s7-4.35 7-11a7 7 0 10-14 0c0 6.65 7 11 7 11z" />

                    <circle
                        cx="12"
                        cy="10"
                        r="2.5"
                        fill="currentColor" />

                </svg>

                <span class="hidden sm:inline">
                    Live Map
                </span>

            </a>

        </div>

    </nav>

</header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

   <!-- Footer -->
<footer class="border-t border-slate-200 bg-white">

    <div class="mx-auto max-w-7xl px-6 py-6 text-center">

        <p class="text-sm font-medium text-slate-600">
            © 2026 Stevanus Wahyu
        </p>

    </div>

</footer>
</body>

</html>
