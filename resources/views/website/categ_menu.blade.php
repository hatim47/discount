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
              
                <!-- Text Content -->
                <div>
                    <!-- Breadcrumb -->
                    <nav class="text-sm mb-1 text-gray-500">
                        <a href="{{ route('home') }}" class="hover:underline">Home</a>
                        <span class="sm:mx-2">&gt;</span>
                        <a href="categories"  class="text-[#1ec27e] hover:font-medium hover:underline">Categories</a>
                    </nav>
                    <!-- Title -->
                    <h1 class="text-lg sm:text-2xl font-bold text-gray-900">
                       Browse By Categories
                    </h1>
                </div>
            </div>
        </div>
    </section>
 <section class="bg-[#F2F0E6] py-10 text-[#0F0F0F]">
        <div
            class="max-w-7xl mx-auto bg-white flex flex-col rounded-2xl">

@foreach ($categories as $category )

 <div class="flex flex-col items-start border-b border-gray-300 text-gray-700 text-sm font-medium p-6">
 <div class="flex justify-between w-full ">
 <h1 class="text-2xl font-bold text-[#0F0F0F]">{{$category->name}}</h1>
{{-- {{region_route('store.website', ['slug' => $coupon->store['slug'] ]) }} --}}
{{-- {{$category->slug}} --}}

<a href="{{region_route('categ.page', ['slug' => $category->slug] ) }}"class="text-lg font-bold text-[#0F0F0F]" >View All </a>
   </div>
<div class="flex flex-col px-3 py-6 ">

    <div class="flex flex-wrap gap-4 mb-6">
        @foreach ($category->stores as $store)
            @if ($store->ismenu === 1)
                <div class="flex flex-col items-center justify-center w-20 h-20 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition">
                    <img src="{{ $store->logo }}" 
                         alt="{{ $store->name }}" 
                         loading="lazy"
                         class="w-20 h-20 rounded-lg object-contain">
                </div>
            @endif
        @endforeach
    </div>
     <div class="grid grid-cols-2 sm:grid-cols-3 auto-cols-min md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-7 gap-y-3 gap-x-9">
        @foreach ($category->stores->take(56) as $store)
            <a  href="{{route('store.website', $store->slug)}}"  class="text-sm text-gray-700 hover:text-[#1ec27e] cursor-pointer">
                {{ $store->name }}
            </a>
        @endforeach
    </div>
</div>
    </div>
@endforeach
       </div> 
    </section>



@endsection
@push('scripts')


@endpush
