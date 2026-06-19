@extends('layouts.app')

@section('title', 'Website Visualisasi Data Spasial')

@section('description', 'Website visualisasi data spasial berbasis web menggunakan Laravel, Tailwind CSS, dan MapLibre GL.')

@section('content')

<!-- Hero Section -->
<section class="relative overflow-hidden bg-white">

    <!-- Background Decoration -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute left-0 top-0 h-64 w-64 rounded-full bg-cyan-500/10 blur-3xl md:h-80 md:w-80"></div>
        <div class="absolute bottom-0 right-0 h-64 w-64 rounded-full bg-blue-600/10 blur-3xl md:h-96 md:w-96"></div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-6 lg:py-14">

        <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-16">

            <!-- Content -->
            <div>

                <h1 class="text-3xl font-bold leading-tight text-slate-900 sm:text-4xl md:text-5xl lg:text-6xl">
                    Visualisasikan lokasi secara
                    <span class="text-cyan-600">
                        interaktif.
                    </span>
                </h1>

                <p class="mt-4 max-w-2xl text-base leading-relaxed text-slate-600 sm:mt-6 sm:text-lg">
                    Website ini membantu pengguna menampilkan, memantau, dan mengeksplorasi data spasial melalui antarmuka web yang intuitif.
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:mt-10 sm:flex-row sm:gap-4">

                    <a href="{{ route('map') }}"
                        class="inline-flex items-center justify-center rounded-xl bg-cyan-600 px-6 py-3 font-semibold text-white transition hover:bg-cyan-700 sm:px-6 sm:py-3.5">
                        Lihat Live Map
                    </a>

                    <a href="#features"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-6 py-3 font-semibold text-slate-700 transition hover:bg-slate-100 sm:px-6 sm:py-3.5">
                        Pelajari Fitur
                    </a>

                    <a href="https://portfolio-stevanus-seven.vercel.app/" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-cyan-300 px-6 py-3 font-semibold text-cyan-700 bg-cyan-50 transition hover:bg-cyan-100 hover:border-cyan-400 sm:px-6 sm:py-3.5">
                        More About Me
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>

                </div>

            </div>

            <!-- Tech Stack Card -->
            <div class="relative overflow-hidden rounded-2xl sm:rounded-[32px] border border-slate-200 bg-white p-6 shadow-2xl shadow-slate-200/60 sm:p-8">

                <!-- Decoration -->
                <div class="absolute -right-10 -top-10 h-24 w-24 rounded-full bg-cyan-100 blur-3xl sm:h-32 sm:w-32"></div>
                <div class="absolute -bottom-12 -left-12 h-32 w-32 rounded-full bg-blue-100 blur-3xl sm:h-40 sm:w-40"></div>

                <div class="relative">

                    <div class="mb-6 flex items-center justify-between sm:mb-8">

                        <div>

                            <span class="inline-flex rounded-full bg-cyan-50 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-cyan-700">
                                Tech Stack
                            </span>

                            <h2 class="mt-3 text-xl font-bold text-slate-900 sm:text-2xl">
                                Tech Stack That I Used
                            </h2>

                            <p class="mt-2 text-xs text-slate-500 sm:text-sm">
                                Teknologi utama yang digunakan untuk membangun website visualisasi data spasial ini.
                            </p>

                        </div>

                    </div>

                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-4">

                        <!-- Laravel -->
                        <div class="group rounded-xl sm:rounded-2xl border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-1 hover:border-red-200 hover:bg-red-50 sm:p-5">

                            <div class="flex items-center gap-3 sm:gap-4">

                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100 sm:h-12 sm:w-12 sm:rounded-xl">
                                    <svg class="h-6 w-6 text-red-600 sm:h-7 sm:w-7" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M23.6 5.7L19.4 3.2a1 1 0 0 0-1 0l-3.4 2-3.4-2a1 1 0 0 0-1 0L6.2 5.7a1 1 0 0 0-.5.9v4L1.5 13a1 1 0 0 0-.5.9v4.8a1 1 0 0 0 .5.9l4.2 2.5a1 1 0 0 0 1 0l4.2-2.5a1 1 0 0 0 .5-.9v-4l3.4-2 3.4 2v4a1 1 0 0 0 .5.9l4.2 2.5a1 1 0 0 0 1 0l4.2-2.5a1 1 0 0 0 .5-.9v-4.8a1 1 0 0 0-.5-.9l-4.2-2.5v-4a1 1 0 0 0-.5-.9z"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs text-slate-500 sm:text-sm">Backend</p>
                                    <h3 class="text-sm font-semibold text-slate-900 sm:text-base">Laravel 11</h3>
                                </div>

                            </div>

                        </div>

                        <!-- Tailwind -->
                        <div class="group rounded-xl sm:rounded-2xl border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-1 hover:border-cyan-200 hover:bg-cyan-50 sm:p-5">

                            <div class="flex items-center gap-3 sm:gap-4">

                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-100 sm:h-12 sm:w-12 sm:rounded-xl">
                                    <svg class="h-6 w-6 text-cyan-500 sm:h-7 sm:w-7" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 6.5c-2.7 0-4.4 1.3-5.2 3.8.9-1.3 2-1.8 3.4-1.4.8.2 1.3.9 1.9 1.7.9 1.1 1.9 2.4 4 2.4 2.7 0 4.4-1.3 5.2-3.8-.9 1.3-2 1.8-3.4 1.4-.8-.2-1.3-.9-1.9-1.7-.9-1.1-1.9-2.4-4-2.4zm-5.2 7c-2.7 0-4.4 1.3-5.2 3.8.9-1.3 2-1.8 3.4-1.4.8.2 1.3.9 1.9 1.7.9 1.1 1.9 2.4 4 2.4 2.7 0 4.4-1.3 5.2-3.8-.9 1.3-2 1.8-3.4 1.4-.8-.2-1.3-.9-1.9-1.7-.9-1.1-1.9-2.4-4-2.4z"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs text-slate-500 sm:text-sm">Frontend</p>
                                    <h3 class="text-sm font-semibold text-slate-900 sm:text-base">Tailwind CSS</h3>
                                </div>

                            </div>

                        </div>

                        <!-- MapLibre -->
                        <div class="group rounded-xl sm:rounded-2xl border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:bg-blue-50 sm:p-5">

                            <div class="flex items-center gap-3 sm:gap-4">

                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-xl sm:h-12 sm:w-12 sm:rounded-xl sm:text-2xl">
                                    🗺️
                                </div>

                                <div>
                                    <p class="text-xs text-slate-500 sm:text-sm">Map Library</p>
                                    <h3 class="text-sm font-semibold text-slate-900 sm:text-base">MapLibre GL</h3>
                                </div>

                            </div>

                        </div>

                        <!-- OSM -->
                        <div class="group rounded-xl sm:rounded-2xl border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-1 hover:border-green-200 hover:bg-green-50 sm:p-5">

                            <div class="flex items-center gap-3 sm:gap-4">

                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-xl sm:h-12 sm:w-12 sm:rounded-xl sm:text-2xl">
                                    🌍
                                </div>

                                <div>
                                    <p class="text-xs text-slate-500 sm:text-sm">Basemap</p>
                                    <h3 class="text-sm font-semibold text-slate-900 sm:text-base">OpenStreetMap</h3>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Features Section -->
<section id="features" class="bg-slate-100 py-12 sm:py-20">

    <div class="mx-auto max-w-7xl px-4 sm:px-6">

        <div class="mx-auto max-w-3xl text-center">

            <span class="text-xs font-semibold uppercase tracking-wider text-cyan-600 sm:text-sm">
                Fitur Utama
            </span>

            <h2 class="mt-3 text-2xl font-bold text-slate-900 sm:mt-4 sm:text-3xl md:text-5xl">
                Visualisasi data spasial berbasis teknologi open-source.
            </h2>

            <p class="mt-4 text-sm leading-relaxed text-slate-600 sm:mt-6 sm:text-lg">
                Website ini menyediakan fitur visualisasi data geografis berbasis web menggunakan teknologi pemetaan open-source.
            </p>

        </div>

        <div class="mt-12 grid gap-6 sm:mt-16 sm:gap-8 md:grid-cols-3">

            <div class="rounded-2xl sm:rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg sm:p-8">

                <div class="mb-4 text-3xl sm:mb-5 sm:text-4xl">📍</div>

                <h3 class="text-lg font-semibold text-slate-900 sm:text-xl">
                    Visualisasi Titik Lokasi
                </h3>

                <p class="mt-3 leading-relaxed text-sm text-slate-600 sm:mt-4 sm:text-base">
                    Menampilkan marker interaktif untuk merepresentasikan lokasi dan informasi geografis secara intuitif.
                </p>

            </div>

            <div class="rounded-2xl sm:rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg sm:p-8">

                <div class="mb-4 text-3xl sm:mb-5 sm:text-4xl">🗂️</div>

                <h3 class="text-lg font-semibold text-slate-900 sm:text-xl">
                    Manajemen Layer Spasial
                </h3>

                <p class="mt-3 leading-relaxed text-sm text-slate-600 sm:mt-4 sm:text-base">
                    Mendukung penambahan data GeoJSON seperti titik, garis, dan poligon pada peta interaktif.
                </p>

            </div>

            <div class="rounded-2xl sm:rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg sm:p-8">

                <div class="mb-4 text-3xl sm:mb-5 sm:text-4xl">🧭</div>

                <h3 class="text-lg font-semibold text-slate-900 sm:text-xl">
                    Navigasi Interaktif
                </h3>

                <p class="mt-3 leading-relaxed text-sm text-slate-600 sm:mt-4 sm:text-base">
                    Menyediakan kontrol navigasi peta seperti zoom, perpindahan area, dan eksplorasi data secara interaktif.
                </p>

            </div>

        </div>

    </div>

</section>

@endsection