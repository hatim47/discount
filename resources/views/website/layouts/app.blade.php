<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'My Marketing Site') }}</title>

    {{-- Tailwind & Vite --}}
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])

    {{-- Custom CSS per page --}}
    @stack('styles')
</head>
<body class="bg-white flex flex-col min-h-screen">

    {{-- Header --}}
    @include('website.layouts.header')

    {{-- Main content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('website.layouts.footer')

    {{-- Custom JS per page --}}
    @stack('scripts')
</body>
</html>