@extends('website.layouts.app')

@section('title', 'Welcome to ' . config('website.company.name'))
@section('meta_description', 'Best marketing platform to grow your business.')

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

 <section class="bg-[#F2F0E6] text-[#0F0F0F]">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6  gap-6  grid grid-cols-1 lg:grid-cols-10">
     {{-- column one start  --}}
    <div class="flex flex-col ms-3 gap-6 lg:col-span-7"> 
    @foreach($coupons as $coupon)
<article class="w-full flex justify-between bg-white shadow-[0_0_5px_3px_rgba(0,0,0,0.07)] rounded-xl p-3 sm:p-6  hover:shadow-lg transition-shadow duration-300">
<div class="flex  items-center gap-3 sm:gap-6">
<div class="flex flex-col items-center border-2 rounded-md 
            {{ $coupon->deals == 0 ? 'border-yellow-300' : 'border-sky-300' }}"> 
  <img src="{{ $coupon->store['logo'] }}" 
       alt="{{ $coupon->store['name'] }}" 
       loading="lazy" 
       class="w-20 h-20 rounded-md shadow-md" />

  @if($coupon->deals == 0)
    <span class="text-[#0f0f0f] bg-yellow-300 uppercase w-full text-center text-xs sm:text-sm">
      Code
    </span>
  @else
    <span class="text-[#0f0f0f] bg-sky-300 uppercase w-full text-center text-xs sm:text-sm">
      Deal
    </span>
  @endif



</div>
  <div class="flex flex-col  items-start gap-3 sm:gap-6">

   @if($coupon->verified)
        <span class="text-[#0f0f0f] bg-yellow-300 uppercase px-1  text-xs rounded-2xl">Verified</span>
        @else
         <span class="text-[#0f0f0f] bg-yellow-300 uppercase px-1  text-xs rounded-2xl"></span>
    @endif
     <div class="flex flex-col justify-between items-start gap-3">
  <h2 class="text-[#0f0f0f] text-lg sm:text-xl">{{ $coupon['title']  }}</h2>


 <p class="text-xs sm:text-sm text-[#0f0f0f]">View Terms</p>

</div>
</div>
</div>
 



  <div class="flex flex-col w-16 sm:w-48 items-end sm:items-center justify-between">
<span class="text-[#0f0f0f] bg-yellow-300 uppercase px-1  text-xs rounded-2xl"></span>
 @if($coupon->deals == 0) 
                        <button
      aria-label="Reveal Code"
      data-code="{{$coupon['code']}}"
      data-text=" Reveal Code"
      class="
        relative z-10 overflow-hidden 
       hidden md:inline-flex items-center justify-center 
        w-full px-6 py-2 rounded-lg font-light text-white 
        bg-[#1EC27E] shadow-md 
        before:content-[attr(data-code)] before:tracking-widest before:inline-flex 
        before:absolute before:top-0 before:right-0 before:h-full before:w-16 
        before:items-center before:justify-end before:pr-3
        before:border-2 before:border-dashed before:border-l-0 before:border-[#1EC27E]
        before:rounded-r-lg before:bg-[#F2F0E6] before:text-[#0F0F0F] before:uppercase before:text-sm 
         before:-z-1 after:content-[''] after:absolute after:top-0 after:right-[34px] after:h-[calc(100%+2px)] after:w-full
        after:bg-[#1EC27E] after: after:transition-all after:duration-200 after:ease-in-out  after:-z-1
        font-normal text-base  after:skew-x-[25deg] hover:after:right-[45px] hover:after:shadow-[5px_0_5px_0_rgba(0,0,0,0.25)]
      "
    > 
      Reveal Code
      <!-- Mobile Arrow -->
    
    </button>
    <button 
      aria-label="Reveal Code" 
      class="md:hidden w-10 h-10 flex items-center justify-end 
             rounded-full  text-[#1EC27E] text-xl "
    >
     <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 256 512"><path fill="currentColor" d="M247.1 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L179.2 256L41.9 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg>
    </button>
    @else
 <button onclick="copyCode('{{ $coupon->code }}')" 
                    class="w-48 hidden md:inline-block  bg-[#1EC27E] text-white px-4 py-2 rounded hover:bg-[#1EC27E]">
                Get Deal
            </button>  
            <button 
      aria-label="Reveal Code" 
      class="md:hidden w-10 h-10 flex items-center justify-end 
             rounded-full  text-[#1EC27E] text-xl "
    >
     <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 256 512"><path fill="currentColor" d="M247.1 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L179.2 256L41.9 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg>
    </button>            @endif

              @php
    $views = $coupon->view;
    if ($views >= 1000000) {
        $views = round($views / 1000000, 1) . 'M';
    } elseif ($views >= 1000) {
        $views = round($views / 1000, 1) . 'k';
    }
@endphp
   <p class="text-xs text-[#0f0f0f]/80"> {{ $views }} Used
  </p>
        </div>       
    </article>

       
        @endforeach 
      
    
     </div> 
          {{-- column one end  --}}

          {{-- column two start --}}
    <div class="inline-flex flex-wrap me-3 gap-x-0 gap-y-5 content-start lg:col-span-3 ">
    
    

  <!-- Rating Card -->
  <div class="bg-white rounded-xl shadow p-4">
    <h3 class="font-bold text-lg text-gray-900">
      How Did We Do? Rate 1800 Battery Vouchers Today!
    </h3>

    <!-- Stars -->
    <div class="flex items-center text-red-500 text-xl mt-2">
      ★★★★★
    </div>

    <p class="text-sm text-gray-600 mt-1">Rated 3 from 2 votes</p>
  </div>

  <!-- Offer Summary -->
  <div class="bg-white rounded-xl shadow p-4">
    <h3 class="font-bold text-lg text-gray-900">
      Today's Hand Tested Discount Code
    </h3>
    <p class="text-xs text-gray-500 mt-1">Last updated: 22-Sep-2025</p>

    <div class="mt-3 space-y-1 text-sm text-gray-700">
      <p>Voucher Codes: <span class="font-semibold">2</span></p>
      <p>Deals: <span class="font-semibold">4</span></p>
    </div>

    <div class="mt-3 bg-green-100 px-3 py-2 rounded-md font-semibold text-gray-900">
      Total Offers: <span class="ml-1">6</span>
    </div>
  </div>

  <!-- Filter Section -->
  <div class="bg-white rounded-xl shadow p-4">
    <h3 class="font-bold text-lg text-gray-900 mb-2">Filter by</h3>

    <div class="flex flex-col gap-2 text-sm text-gray-700">
      <label class="flex items-center justify-between cursor-pointer">
        <span>All</span>
        <input type="radio" name="filter" checked class="accent-green-500" />
      </label>
      <label class="flex items-center justify-between cursor-pointer">
        <span>Voucher Code</span>
        <input type="radio" name="filter" class="accent-gray-400" />
      </label>
      <label class="flex items-center justify-between cursor-pointer">
        <span>Online Sale</span>
        <input type="radio" name="filter" class="accent-gray-400" />
      </label>
    </div>
  </div>

  <!-- Quick Links -->
  <div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="bg-green-100 px-4 py-2 font-semibold text-gray-900">Quick Links</div>
    <ul class="divide-y divide-gray-200 text-sm text-gray-700">
      <li><a href="#" class="block px-4 py-2 hover:bg-gray-50">About 1800 Battery</a></li>
      <li><a href="#" class="block px-4 py-2 hover:bg-gray-50">Hints and Tips</a></li>
      <li><a href="#" class="block px-4 py-2 hover:bg-gray-50">FAQs</a></li>
      <li><a href="#" class="block px-4 py-2 hover:bg-gray-50">1800 Battery Discount Codes</a></li>
      <li><a href="#" class="block px-4 py-2 hover:bg-gray-50">More About 1800 Battery</a></li>
      <li><a href="#" class="block px-4 py-2 hover:bg-gray-50">How to avail 1800 Battery promo codes?</a></li>
    </ul>
  </div>


    
      </div> 
    {{-- column two end --}} 
    </div>

  </section>


    <h1 class="text-5xl font-medium">{{ $store->name }}</h1>




@endsection
@push('scripts')
@endpush
