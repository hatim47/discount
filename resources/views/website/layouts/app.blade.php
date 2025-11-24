<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, initial-scale=1.0">
   <title>{{ $title ?? '' }}@yield('title'){{ (!isset($title) && !View::hasSection('title')) ? config('app.name', 'My Marketing Site') : '' }}</title>
<meta name="description"
      content="{{ trim(($meta_description ?? '') . ' ' . (View::hasSection('meta_description') ? trim($__env->yieldContent('meta_description')) : '') . ' ' . date('F Y')) }}">
    {{-- <meta name="keywords" content="{{ $meta_keywords ? $meta_keywords : $settings['config_meta_keywords']->value }}" /> --}}

    <link rel="icon" type="image/png" sizes="32x32" href="{{ env('APP_ASSETS') }}/img/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ env('APP_ASSETS') }}/img/favicon.ico">
     <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="format-detection" content="telephone=no">
    <link rel="canonical" href="{{url()->current()}}">
        <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $og_image ?? env('APP_ASSETS') .'/img/favicon.ico' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="TopVouchersCode">
    <meta name="og:title" content="{{ $title ?? '' }}@yield('title'){{ (!isset($title) && !View::hasSection('title')) ? config('app.name', 'My Marketing Site') : '' }} ">
<meta name="og:description" content="{{ ($meta_description ?? '') }}@yield('meta_description') {{ date('F Y') }}">
  @include('website.layouts.seoheader')

    {{-- Tailwind & Vite --}}
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])

    {{-- Custom CSS per page --}}
    @stack('styles')
    @php
    // Get the current region from session (fallback to default)
    $currentRegion = session('region', config('app.default_region', 'usa'));
@endphp
</head>
<body class="bg-white flex flex-col min-h-screen"  x-data="storeSearch('{{ $currentRegion }}')" >
    @include('website.layouts.header')
    {{-- Header --}}
   @include('website.layouts.schema', ['meta_description' => $meta_description])
    {{-- Main content --}}
    @include('website.store-search')
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
      @include('website.popup')
    @include('website.layouts.footer')
   <script src="{{ asset('public/assets/js/lib/iconify-icon.min.js') }}"></script>
    {{-- Custom JS per page --}}

    <script>
if (sessionStorage.getItem('showPopup') === '1') {
    sessionStorage.removeItem('showPopup');
    openModal(); // your popup function
}


document.addEventListener("DOMContentLoaded", () => {

    // Check if popup should be shown
    if (localStorage.getItem('showPopup') === '1') {

        // Reset so it only shows once
        localStorage.removeItem('showPopup');

        // Get stored coupon data
        const data = JSON.parse(sessionStorage.getItem('couponData') || '{}');

        // Fill modal fields
        if (data.title) {
            document.getElementById("couponTitle").textContent = data.title;
        }

        if (data.isCodeCoupon) {
            document.getElementById("couponCodeSection").classList.remove("hidden");
            document.getElementById("couponCode").textContent = data.code;
            document.getElementById("dealSection").classList.add("hidden");
        } else {
            document.getElementById("dealSection").classList.remove("hidden");
            document.getElementById("couponCodeSection").classList.add("hidden");
        }

        document.getElementById("couponTerms").textContent = data.terms;

        // SHOW THE POPUP
        openModal();
    }
});





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