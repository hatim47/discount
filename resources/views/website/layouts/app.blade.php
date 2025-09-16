{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', config('website.company.name'))">
    <title>@yield('title', config('website.company.name'))</title>

    <!-- Schema JSON-LD -->
<script type="application/ld+json">
{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'Organization',
  'name' => 'MyWebsite',
  'url' => url('/'),
  'logo' => asset('images/logo.png'),
  'contactPoint' => [[
      '@type' => 'ContactPoint',
      'email' => 'contact@mywebsite.com',
      'telephone' => '+1 (555) 123-4567',
      'contactType' => 'customer service',
  ]],
  'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => '123 Business St, City, Country',
  ],
], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>

    @vite('resources/css/app.css')
    <style>
    .main-nav {
  position: relative;
}

.main-nav .nav-item {
  position: relative;
}

.main-nav .nav-link {
  display: inline-block;
  padding: 10px 15px; 
  text-decoration: none;
}

.main-nav .nav-link:hover {
  
}

/* Dropdown */
.main-nav .dropdown {
  display: none;
  position: absolute;
  top: 100%;   /* just below parent */
  left: 0;
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  min-width: 160px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  z-index: 999;
}

.main-nav .dropdown-item {
  display: block;
  padding: 8px 12px;
  color: #333;
  text-decoration: none;
}

.main-nav .dropdown-item:hover {
  background: #f5f5f5;
}

/* Show dropdown on hover */
.main-nav .nav-item:hover .dropdown {
  display: block;
}
    </style>
</head>
<body class="bg-[#F3F4F6]">

    <!-- 🌐 Header -->
    <header class="bg-[#7F1D1D] shadow sticky top-0 z-50 text-white">
        <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-white">
                {{ config('website.company.name') }}
            </a>

            <!-- Navigation -->
           <nav class="hidden md:flex space-x-6 main-nav">
    @if(is_array(config('website.menus')))
        @foreach(config('website.menus') as $menu)
            @if(isset($menu['children']) && is_array($menu['children']))
                <div class="nav-item text-white">
                    <!-- Parent -->
                    <a href="{{ $menu['url'] }}" class="nav-link text-white">
                        {{ $menu['title'] }}
                    </a>

                    <!-- Dropdown -->
                    <div class="dropdown">
                        @foreach($menu['children'] as $child)
                            <a href="{{ $child['url'] }}" class="dropdown-item">
                                {{ $child['title'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <a href="{{ $menu['url'] }}" class="px-4 py-2 hover:text-white">
                    {{ $menu['title'] }}
                </a>
            @endif
        @endforeach
    @endif
</nav>

<!-- Mobile Button -->
    <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none">
      ☰
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="menu" class="hidden md:hidden bg-gray-100 px-4 pb-4 space-y-2">
    <a href="#features" class="block hover:text-white">Features</a>
    <a href="#pricing" class="block hover:text-white">Pricing</a>
    <a href="#about" class="block hover:text-white">About</a>
    <a href="#contact" class="block hover:text-white">Contact</a>
  </div>
            <!-- CTA -->

        </div>
    </header>

    <!-- 🌐 Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- 🌐 Footer -->
    <footer class="bg-gray-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-8">
            <div>
                <h2 class="text-xl font-bold text-white">{{ config('website.company.name') }}</h2>
                <p class="mt-2 text-sm">Helping businesses grow with powerful marketing tools.</p>
            </div>
            <div>
                <h3 class="font-semibold text-white">Quick Links</h3>
                <ul class="mt-2 space-y-2">
                    @if(is_array(config('website.menus')))
                        @foreach(config('website.menus') as $menu)
                            <li><a href="{{ $menu['url'] }}" class="hover:underline">{{ $menu['title'] }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-white">Contact</h3>
                <p class="mt-2 text-sm">{{ config('website.company.address') }}</p>
                <p class="text-sm">Email: {{ config('website.company.email') }}</p>
                <p class="text-sm">Phone: {{ config('website.company.phone') }}</p>
            </div>
        </div>
        <div class="border-t border-gray-700 text-center py-4 text-sm">
            © {{ date('Y') }} {{ config('website.company.name') }}. All rights reserved.
            @if(is_array(config('website.footer_links')))
                @foreach(config('website.footer_links') as $link)
                    <span> · <a href="{{ $link['url'] }}" class="hover:underline">{{ $link['title'] }}</a></span>
                @endforeach
            @endif
        </div>
    </footer>
<script>
  document.getElementById('menu-btn').addEventListener('click', () => {
    document.getElementById('menu').classList.toggle('hidden');
  });
</script>
    @vite('resources/js/app.js')
</body>
</html> --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body>
    <div id="root"><div class="flex items-center justify-center min-h-screen text-2xl text-gray-700">Loading...</div></div>
</body>
</html>