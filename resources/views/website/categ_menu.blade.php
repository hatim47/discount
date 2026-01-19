@extends('website.layouts.app')

@section('title', $title)
@section('meta_description', $meta_description)
@push('styles')

<style>
 {
    overflow-x: auto;
}

/* Base table styling */
 table {
    width: 100%;
    border-collapse: collapse; /* Essential for clean borders */
    font-family: Arial, sans-serif;
    font-size: 14px;
    color: #333;
}

/* Header row styling */
 thead {
    background-color: #FAF9F5; /* Light gray background */
    border-bottom: 2px solid #0B453C; /* Separator line below header */
}

/* Header cell styling */
 th {
    padding: 12px 15px;
    text-align: left;
    font-weight: bold;
    color: #555;
    text-transform: uppercase;
}

/* Data cell styling */
 td {
    padding: 10px 15px;
    border-bottom: 1px solid #0B453C; /* Light separator line for rows */
}

/* Alternating row colors (zebra stripping) */
 tbody tr:nth-child(even) {
    background-color: #FAF9F5; /* Very light subtle contrast */
}

/* Hover effect for rows */
 tbody tr:hover {   
    cursor: default; /* Optional: indicates interactivity */
}

.hiptip h3{
font-size:30px;
}
.hiptip h4{
font-weight:600;
font-size:25px;
}
.hiptip ul li::marker {
    color: #0B453C;
}
.hiptip ul {
    list-style: none;
    padding-left: 20px;
}
.hiptip ul li {
    position: relative;
}
.hiptip ul li::before {
    content: "";
    width: 8px;
    height: 8px;
    background-color: #0B453C;
    border-radius: 50%;
    position: absolute;
    left: -18px;
    top: 0.4em;
}
</style>
@endpush

@section('content')
    <section class="bg-[#F2FCFA] text-[#0F0F0F]">
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
                        <a href="{{region_route('categ.menu') }}"  class="text-[#0B453C] hover:font-medium hover:underline">Categories</a>
                    </nav>
                    <!-- Title -->
                    <h1 class="text-lg sm:text-2xl font-bold text-gray-900">
                       Browse By Categories
                    </h1>
                </div>
            </div>
        </div>
    </section>
 <section class="bg-[#F2FCFA] py-10 text-[#0F0F0F]">
        <div
            class="max-w-7xl mx-auto bg-white flex flex-col rounded-2xl">

@foreach ($categories as $category )

 <div class="flex flex-col items-start border-b border-gray-300 text-gray-700 text-sm font-medium p-6">
 <div class="flex justify-between w-full ">
 <h1 class="text-2xl font-bold text-[#0F0F0F]">{{$category->name}}</h1>
{{-- {{region_route('store.website', ['slug' => $coupon->store['slug'] ]) }} --}}
{{-- {{$category->slug}} --}}

<a href="{{region_route('categ.page', ['slug' => $category->slug] ) }}"class="text-lg font-bold underline text-[#0B453C]" >View All </a>
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
            <a  href="{{region_route('store.website',['slug' => $store->slug])}}"  class="text-sm text-gray-700 hover:text-[#0B453C] cursor-pointer">
                {{ $store->name }}
            </a>
        @endforeach
    </div>
</div>
    </div>
@endforeach

<div class="flex py-12 flex-col hiptip items-start ">
        {!! $setting->cate_m_content !!}  
        </div>

       </div> 
    </section>



@endsection
@push('scripts')


@endpush
