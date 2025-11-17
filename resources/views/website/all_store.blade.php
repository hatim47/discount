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
                        <a href="{{ region_route('home') }}" class="hover:underline">Home</a>
                        <span class="sm:mx-2">&gt;</span>
                        <a href="Categories"  class="text-[#1ec27e]  hover:font-medium hover:underline">Categories</a>
                      
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
 <div class="grid grid-cols-2 sm:grid-cols-3 auto-cols-min md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-7 gap-y-3 gap-x-6 ">
@foreach ($categories as $category )
 <div class="flex flex-col items-start">
<a href="{{region_route('store.website', $category->slug)}}" class="text-[#0F0F0F] hover:text-[#1ec27e] transition duration-300 ease-in-out " >{{$category->name}} </a>
   </div>    
@endforeach
</div>     
  </div> 
    </section>



@endsection
@push('scripts')


@endpush
