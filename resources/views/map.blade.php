@extends('layouts.app')

@section('title', 'Live Map Data | MAPID Technical Test')
@section('description', 'Visualisasi data spasial interaktif menggunakan MapLibre GL dan OpenStreetMap.')

@push('styles')

<link
    href="https://unpkg.com/maplibre-gl@5.6.0/dist/maplibre-gl.css"
    rel="stylesheet"
/>

<style>
    /* Responsive Map Height */
    #map {
        width: 100%;
        height: 60vh;
        min-height: 400px;
        border-radius: 20px;
    }

    @media (min-width: 768px) {
        #map {
            height: 70vh;
            min-height: 500px;
            border-radius: 28px;
        }
    }

    @media (min-width: 1024px) {
        #map {
            height: 78vh;
            min-height: 600px;
            border-radius: 32px;
        }
    }

    /* MAP CONTAINER PREMIUM */
    .map-wrapper {
        position: relative;
        border-radius: 20px;
        padding: 8px;
        background: linear-gradient(135deg, rgba(6, 182, 212, 0.15), rgba(59, 130, 246, 0.15));
        box-shadow: 0 20px 50px rgba(2, 6, 23, 0.1);
    }

    @media (min-width: 768px) {
        .map-wrapper {
            border-radius: 28px;
            padding: 10px;
            box-shadow: 0 30px 80px rgba(2, 6, 23, 0.15);
        }
    }

    @media (min-width: 1024px) {
        .map-wrapper {
            border-radius: 32px;
            padding: 10px;
        }
    }

    /* GLASS LEGEND - Responsive */
    .legend-card {
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 10;

        padding: 12px 14px;
        border-radius: 16px;

        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(14px);

        border: 1px solid rgba(148, 163, 184, 0.25);
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.12);

        font-size: 13px;
    }

    @media (min-width: 768px) {
        .legend-card {
            top: 16px;
            left: 16px;
            padding: 14px 16px;
            border-radius: 18px;
            font-size: 14px;
        }
    }

    /* MODERN MARKER */
    .custom-marker {
        width: 14px;
        height: 14px;
        border-radius: 9999px;

        background: radial-gradient(circle at 30% 30%, #22d3ee, #0ea5e9);

        border: 2px solid white;
        box-shadow:
            0 0 0 6px rgba(14, 165, 233, 0.15),
            0 10px 20px rgba(14, 165, 233, 0.25);

        transition: transform 0.2s ease;
        cursor: pointer;
    }

    .custom-marker:hover {
        transform: scale(1.3);
    }

    /* POPUP MODERN */
    .maplibregl-popup-content {
        border-radius: 12px;
        padding: 10px 12px;

        font-size: 12px;

        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);

        box-shadow: 0 16px 40px rgba(15, 23, 42, 0.15);
        border: 1px solid rgba(148, 163, 184, 0.2);
    }

    @media (min-width: 768px) {
        .maplibregl-popup-content {
            border-radius: 14px;
            padding: 12px 14px;
            font-size: 13px;
        }
    }

    /* CONTROL STYLE */
    .maplibregl-ctrl-group {
        border-radius: 12px !important;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    @media (min-width: 768px) {
        .maplibregl-ctrl-group {
            border-radius: 14px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
    }

    /* Smooth transitions */
    .transition-smooth {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Hover effects */
    .stat-badge {
        transition: all 0.3s ease;
    }

    .stat-badge:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }
</style>

@endpush

@section('content')

<section class="relative overflow-hidden bg-slate-50">

    <!-- Background Decoration - Responsive -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute left-0 top-0 h-64 w-64 rounded-full bg-cyan-500/10 blur-3xl md:h-80 md:w-80"></div>
        <div class="absolute bottom-0 right-0 h-64 w-64 rounded-full bg-blue-600/10 blur-3xl md:h-96 md:w-96"></div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-6 lg:py-12">

        <!-- Header Section -->
        <div class="mb-6 md:mb-8 lg:mb-10">

            <div class="flex flex-col gap-6 lg:gap-10">

                <!-- LEFT: TEXT + ICON + BADGE -->
                <div class="max-w-3xl">

                    <div class="flex items-center gap-2 mb-3 md:mb-4 md:gap-3">
                        <div class="p-2 rounded-lg md:rounded-xl bg-cyan-100 text-cyan-600 text-xl md:text-2xl transition-smooth hover:scale-110">
                            🗺️
                        </div>

                        <span class="text-xs md:text-sm font-medium text-cyan-700 bg-cyan-50 px-3 py-1 md:py-1.5 rounded-full">
                            Spatial Data Visualization
                        </span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 leading-tight">
                        Geo Intelligence
                        <span class="block text-cyan-600">Dashboard</span>
                    </h1>

                    <p class="mt-3 md:mt-4 text-sm sm:text-base lg:text-lg text-slate-600 leading-relaxed max-w-2xl">
                        Platform visualisasi data spasial interaktif untuk pemetaan lokasi, rute, dan area secara dinamis.
                    </p>

                    <!-- MINI STATS - Responsive Grid -->
                    <div class="mt-5 md:mt-6 flex flex-col gap-2 sm:flex-row sm:gap-3 flex-wrap">

                        <div class="stat-badge flex items-center gap-2 px-3 py-2 md:px-4 md:py-2.5 bg-white border border-slate-200 rounded-lg md:rounded-xl shadow-sm text-xs md:text-sm hover:border-cyan-300">
                            🗺️ <span class="text-slate-600">Location Mapping</span>
                        </div>

                        <div class="stat-badge flex items-center gap-2 px-3 py-2 md:px-4 md:py-2.5 bg-white border border-slate-200 rounded-lg md:rounded-xl shadow-sm text-xs md:text-sm hover:border-cyan-300">
                            🌐 <span class="text-slate-600">Spatial Visualization</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Map Section -->
        <div class="relative">

            <!-- Legend - Hidden on Mobile -->
            <div class="legend-card hidden md:block">

                <h2 class="mb-3 font-semibold text-slate-900 text-sm md:text-base">
                    Layer Legend
                </h2>

                <div class="space-y-2.5 md:space-y-3">

                    <div class="flex items-center gap-3">
                        <span class="h-2.5 w-2.5 md:h-3 md:w-3 rounded-full bg-cyan-500 flex-shrink-0"></span>
                        <span class="text-xs md:text-sm text-slate-600">Point Marker</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="h-1 w-5 md:w-6 rounded bg-blue-500 flex-shrink-0"></span>
                        <span class="text-xs md:text-sm text-slate-600">Line String</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="h-4 w-5 md:w-6 rounded border border-green-500 bg-green-500/30 flex-shrink-0"></span>
                        <span class="text-xs md:text-sm text-slate-600">Polygon Area</span>
                    </div>

                </div>

            </div>

            <!-- Map Container -->
            <div class="map-wrapper">
                <div id="map"></div>
            </div>

            <!-- Mobile Legend Info -->
            <div class="mt-4 md:hidden p-4 rounded-lg bg-white border border-slate-200 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-900 mb-3">Layer Legend</h2>
                <div class="grid grid-cols-3 gap-4">
                    <div class="flex items-center gap-2">
                        <span class="h-2.5 w-2.5 rounded-full bg-cyan-500"></span>
                        <span class="text-xs text-slate-600">Point</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="h-1 w-4 rounded bg-blue-500"></span>
                        <span class="text-xs text-slate-600">Line</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="h-4 w-4 rounded border border-green-500 bg-green-500/30"></span>
                        <span class="text-xs text-slate-600">Polygon</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

<script src="https://unpkg.com/maplibre-gl@5.6.0/dist/maplibre-gl.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const points = [
            {
                name: 'Point A',
                coordinates: [106.638, -6.255]
            },
            {
                name: 'Point B',
                coordinates: [106.650, -6.245]
            },
            {
                name: 'Point C',
                coordinates: [106.620, -6.270]
            }
        ];

        const map = new maplibregl.Map({
            container: 'map',

            style: {
                version: 8,
                sources: {
                    osm: {
                        type: 'raster',
                        tiles: [
                            'https://a.tile.openstreetmap.org/{z}/{x}/{y}.png',
                            'https://b.tile.openstreetmap.org/{z}/{x}/{y}.png',
                            'https://c.tile.openstreetmap.org/{z}/{x}/{y}.png'
                        ],
                        tileSize: 256,
                        attribution: '© OpenStreetMap Contributors'
                    }
                },
                layers: [
                    {
                        id: 'osm',
                        type: 'raster',
                        source: 'osm'
                    }
                ]
            },

            center: [106.638, -6.255],
            zoom: 11
        });

        map.addControl(
            new maplibregl.NavigationControl(),
            'top-right'
        );

        map.addControl(
            new maplibregl.FullscreenControl(),
            'top-right'
        );

        points.forEach(point => {

            const marker = document.createElement('div');
            marker.className = 'custom-marker';

            new maplibregl.Marker(marker)
                .setLngLat(point.coordinates)
                .setPopup(
                    new maplibregl.Popup({
                        offset: 25
                    }).setHTML(`
                        <div style="min-width: 130px; font-family: inherit;">
                            <div style="font-weight: 600; font-size: 13px; margin-bottom: 4px; color: #0f172a;">
                                ${point.name}
                            </div>
                            <div style="font-size: 12px; color: #64748b; margin-bottom: 6px;">
                                Spatial Coordinate Point
                            </div>
                            <div>
                                <span style="
                                    font-size: 10px;
                                    padding: 2px 8px;
                                    border-radius: 999px;
                                    background: #e0f2fe;
                                    color: #0284c7;
                                    font-weight: 500;
                                ">
                                    ACTIVE
                                </span>
                            </div>
                        </div>
                    `)
                )
                .addTo(map);

        });

        map.on('load', () => {

            // Line Layer
            map.addSource('line-source', {
                type: 'geojson',
                data: {
                    type: 'Feature',
                    geometry: {
                        type: 'LineString',
                        coordinates: points.map(point => point.coordinates)
                    }
                }
            });

            map.addLayer({
                id: 'line-layer',
                type: 'line',
                source: 'line-source',
                paint: {
                    'line-color': '#3b82f6',
                    'line-width': 4,
                    'line-opacity': 0.85
                }
            });

            // Polygon Layer
            map.addSource('polygon-source', {
                type: 'geojson',
                data: {
                    type: 'Feature',
                    geometry: {
                        type: 'Polygon',
                        coordinates: [[
                            [106.61, -6.24],
                            [106.67, -6.24],
                            [106.67, -6.28],
                            [106.61, -6.28],
                            [106.61, -6.24]
                        ]]
                    }
                }
            });

            map.addLayer({
                id: 'polygon-fill',
                type: 'fill',
                source: 'polygon-source',
                paint: {
                    'fill-color': '#22c55e',
                    'fill-opacity': 0.15
                }
            });

            map.addLayer({
                id: 'polygon-outline',
                type: 'line',
                source: 'polygon-source',
                paint: {
                    'line-color': '#22c55e',
                    'line-width': 2.5
                }
            });

        });

    });
</script>

@endsection