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
    <main class="flex-grow ">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('website.layouts.footer')
   <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
    {{-- Custom JS per page --}}

    <script>
    function megaMenu() {
    return {
      open: false,
      closeTimer: null,
      closeDelay: 150, // ms; tweak to preference (100-250ms is common)
      init() {
        // optional: close on ESC
        window.addEventListener('keydown', (e) => {
          if (e.key === 'Escape') this.closeImmediately();
        });
      },
      openWithCancel() {
        this.clearCloseTimer();
        this.open = true;
      },
      startCloseTimer() {
        this.clearCloseTimer();
        this.closeTimer = setTimeout(() => {
          this.open = false;
          this.clearCloseTimer();
        }, this.closeDelay);
      },
      clearCloseTimer() {
        if (this.closeTimer) {
          clearTimeout(this.closeTimer);
          this.closeTimer = null;
        }
      },
      closeImmediately() {
        this.clearCloseTimer();
        this.open = false;
      }
    }
  }
    </script>
    @stack('scripts')
    
</body>
</html>