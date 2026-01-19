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
                        <a href="{{ region_route('home') }}" class="hover:underline">Home</a>
                        <span class="sm:mx-2">&gt;</span>
                        <a href="{{region_route('store.menusa') }}" class="text-[#0B453C] hover:font-medium hover:underline">Stores</a>
                      
                    </nav>
                    <!-- Title -->
                    <h1 class="text-lg sm:text-2xl font-bold text-gray-900">
                     All Brands
                    </h1>
                </div>
            </div>
        </div>

    </section>

 <section class="bg-[#F2FCFA] py-10 text-[#0F0F0F]">
        <div class="max-w-7xl mx-auto bg-white flex flex-col rounded-t-2xl pt-6 pb-0">
@php
    $letters = array_merge(['0-9'],range('A', 'Z'));
@endphp
<ul class="flex flex-wrap justify-center border-b-2 border-gray-300 text-sm text-gray-700 pb-6 px-6">
    @foreach ($letters as $letter)
        <li>
            <a href="{{region_route('store.menu',['slug' => strtolower($letter)])}}"
               class="flex items-center justify-center px-4 py-2 m-1 bg-[#f4fcef] rounded-md hover:bg-[#dcfcc7] font-semibold">
                {{ $letter }}
            </a>
        </li>
    @endforeach
</ul>
 </div>
<div class="max-w-7xl mx-auto bg-white flex flex-col p-6">
 {{-- <h1 class="text-2xl my-4 uppercase font-bold text-[#0F0F0F] ">{{$slug}}</h1> --}}
 <div class="grid grid-cols-2 sm:grid-cols-3 auto-cols-min md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-7 gap-y-3 gap-x-6">
@foreach ($categories as $category )
 <div class="flex flex-col items-start">
<a href="{{region_route('store.website', $category->slug)}}" class="text-[#0F0F0F] hover:text-[#0B453C] transition duration-300 ease-in-out " >{{$category->name}} </a>
   </div>    
@endforeach
</div>  

<div class="flex py-12 flex-col hiptip items-start ">
        {!! $setting->home_m_content !!}  
        </div>

  </div> 
    </section>



@endsection
@push('scripts')


@endpush
