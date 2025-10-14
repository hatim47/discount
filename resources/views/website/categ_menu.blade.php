@extends('website.layouts.app')

@section('title', 'Welcome to ' . config('website.company.name'))
@section('meta_description', 'Best marketing platform to grow your business.')
@push('styles')


@endpush

@section('content')
    <section class="bg-[#FAF9F5] text-[#0F0F0F]">
        <div
            class="max-w-7xl mx-auto py-12 px-4 sm:px-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <!-- Left Section -->
            <div class="flex items-center gap-4 ms-3">
                <!-- Logo -->
                <div
                    class="w-20 sm:w-24 md:w-28 lg:w-32 aspect-square rounded-full border flex items-center justify-center bg-white shadow-sm overflow-hidden">
                    <img src="{{ $store->logo }}" alt="Clarks" class="w-full h-full object-contain p-2" />
                </div>
                <!-- Text Content -->
                <div>
                    <!-- Breadcrumb -->
                    <nav class="text-sm mb-1 text-gray-500">
                        <a href="{{ route('home') }}" class="hover:underline">Home</a>
                        <span class=" sm:mx-2">&gt;</span>
                        <a href="/brands" class="hover:underline">All Brands</a>
                        <span class=" sm:mx-2">&gt;</span>
                        <span class="text-[#1ec27e] font-medium">{{ $store->name }}</span>
                    </nav>
                    <!-- Title -->
                    <h1 class="text-lg sm:text-2xl font-bold text-gray-900">
                        Clarks UK Discount Code September 2025
                    </h1>
                    <!-- Description -->
                    <p class="text-gray-600 text-sm mt-1">
                        Save money with these 6 Clarks UK voucher codes &amp; deals
                    </p>
                </div>
            </div>

            <!-- Right Section -->
            <div class="hidden sm:flex flex-col items-end gap-2 me-3">
                <!-- Popularity -->
                <div class="flex items-center bg-green-100 text-gray-700 text-sm font-medium px-3 py-1 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-3-3h-4a9 9 0 00-9 9v1h6v-1a3 3 0 013-3h2a3 3 0 013 3v1h2v-4z" />
                    </svg>
                    65.6K
                </div>
                <!-- Visit Button -->
                <a href="#"
                    class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    Visit Site
                </a>
            </div>

        </div>

    </section>



    




@endsection
@push('scripts')


@endpush
