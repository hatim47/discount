{{-- resources/views/components/header.blade.php --}}
<header class="bg-[#FAF9F5] border-b-2 border-[#1EC27E] sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        {{-- Logo/Brand Name --}}
        <a href="{{ url('/') }}" class="text-3xl font-extrabold text-primary-700 hover:text-primary-600 transition">
            FindsCoupon
        </a>

        {{-- Navigation Links --}}
        <nav class="hidden md:flex space-x-6">
            <a href="{{ url('/categories') }}" class="text-gray-600 hover:text-primary-600 transition">Categories</a>
            <a href="{{ url('/featured') }}" class="text-gray-600 hover:text-primary-600 transition">Featured Deals</a>
            <a href="{{ url('/about') }}" class="text-gray-600 hover:text-primary-600 transition">About Us</a>
        </nav>

        {{-- Action Button --}}
        <a href="{{ url('/login') }}" class="bg-primary-600 text-black px-4 py-2 rounded-lg hover:bg-primary-700 transition duration-200 shadow-md">
            Login / Sign Up
        </a>
    </div>
</header>
