@extends('website.layouts.app')

@section('title', $title)
@section('meta_description', $meta_description)
@push('styles')


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
                        <a href="Categories"  class="text-[#0B453C]  hover:font-medium hover:underline">Categories</a>
                      
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

<div class="max-w-7xl mx-auto  flex flex-col p-6">

 <h1 class="text-2xl my-4 uppercase font-bold text-[#0F0F0F] ">Event</h1>
 <div class="grid grid-cols-1 sm:grid-cols-2 auto-cols-min md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-y-6 gap-x-6 ">
{{-- @foreach ($categories as $category)
 <div class="flex flex-col items-start   ">
<a href="{{region_route('store.website', ['slug' =>  $category->slug])}}" class=" text-[#0F0F0F] hover:text-[#0B453C] transition duration-300 ease-in-out " >{{$category->name}} </a>
   </div>    
@endforeach --}}
 @foreach ($event as $category)
<div class="flex bg-[#F2FCFA] flex-col items-center justify-between gap-6 shadow-[0_0_5px_3px_rgba(0,0,0,0.07)] rounded-xl p-5">
<h3 class="text-xl font-semibold">{{$category->title}}</h3>
<img class="w-12/12 shadow-sm rounded-3xl" src="{{ $category['banner'] }}" alt="{{ $category->title }}" loading="lazy">
 <a href="{{ region_route('event', ['slug' => $category->slug]) }}" class="inline-block bg-[#0B453C] text-white text-center w-full px-4 py-2 rounded hover:bg-[#0B453C]">View</a>
</div>
@endforeach 

</div>     
  </div> 
    </section>



@endsection
@push('scripts')


@endpush
