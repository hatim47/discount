@extends('website.layouts.app')

@section('title', 'Welcome to ' . config('website.company.name'))
@section('meta_description', 'Best marketing platform to grow your business.')
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
    border-bottom: 2px solid #1EC27E; /* Separator line below header */
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
    border-bottom: 1px solid #1EC27E; /* Light separator line for rows */
}

/* Alternating row colors (zebra stripping) */
 tbody tr:nth-child(even) {
    background-color: #FAF9F5; /* Very light subtle contrast */
}

/* Hover effect for rows */
 tbody tr:hover {
   
    cursor: default; /* Optional: indicates interactivity */
}

h4{
    font-weight:600;
font-size:22px;
}

h3{
  font-weight:700;
font-size:30px;

}
</style>
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

 <section class="bg-[#F2F0E6] text-[#0F0F0F]">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6  gap-6  grid grid-cols-1 lg:grid-cols-10">
     {{-- column one start  --}}
    <div class="flex flex-col ms-3 gap-6 lg:col-span-7">
     <div id="coupon-list" class="flex flex-col ms-3 gap-6  lg:col-span-7"> 
   

    @foreach($coupons as $coupon)
        @include('website.couponspart', ['coupon' => $coupon])
    @endforeach

    </div> 
    
     
     @if ($coupons->hasMorePages())
    <div class="text-center mt-6">
        <button 
            id="loadMore" 
            data-next-page="{{ $coupons->nextPageUrl() }}" 
            class="bg-[#1EC27E] text-white px-6 py-2 rounded-lg hover:bg-green-600"
        >
            Load More
        </button>
    </div>
@endif


<div class="card">
  @foreach ($store->dynacontents as $index => $relateds)
 <div class="bg-white rounded-xl w-full my-5 shadow overflow-hidden" id="{{$index}}">
    <h3 class="border-gray-800/20 border-b px-8 text-xl py-4 font-bold text-[#0f0f0f0] ">{{$relateds->heading}} 
</h3>
    <div class="flex flex-col  text-[#0f0f0f0] p-8">
        {{-- {{dd ($store->likes);}} --}}

{!! $relateds->description !!}

    </div>
  </div>
    @endforeach
</div> 

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
  <div class="bg-white w-full rounded-xl shadow p-4">
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
  <div class="bg-white w-full rounded-xl shadow p-4">
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
  <div class="bg-white w-full rounded-xl shadow overflow-hidden">
    <div class="bg-green-100 px-4 py-2 font-semibold text-gray-900">Quick Links</div>
    <ul class="divide-y divide-gray-200 text-sm text-gray-700">
  @foreach ($store->dynacontents as $index => $relateds)
      <li><a href="#{{$index}}" class="block px-4 py-2 hover:bg-gray-50">{{$relateds->heading }}</a></li>
      @endforeach
  
  </div>


  <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-green-100 px-4 py-2 font-bold text-[#0f0f0f0]">Related Stores</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
        {{-- {{dd ($store->relatedStores);}} --}}
    @foreach ($store->relatedStores as $relateds )
      <li><a href="#" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#1EC27E]/15">
      {{-- <img class="w-16 rounded-lg border border-[#1EC27E] " src="{{$relateds->logo}}" /> --}}
      {{$relateds->name}}
      </a></li>
    @endforeach

    </ul>
  </div>
  <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-green-100 px-4 py-2 font-bold text-[#0f0f0f0]">Related Categories</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
        {{-- {{dd ($store->relatedStores);}} --}}
    @foreach ($store->categories as $relateds )
     <li><a href="#" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#1EC27E]/15">
      {{-- <img class="w-16 rounded-lg border border-[#1EC27E] " src="{{$relateds->logo}}" /> --}}
      {{$relateds->name}}
      </a></li>
    @endforeach

    </ul>
  </div>
   <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-green-100 px-4 py-2 font-bold text-[#0f0f0f0]">Trending Brands</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
        {{-- {{dd ($store->relatedStores);}} --}}
    @foreach ($store->trendingWith as $relateds )
      <li><a href="#" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#1EC27E]/15">
      {{-- <img class="w-16 rounded-lg border border-[#1EC27E] " src="{{$relateds->logo}}" /> --}}
      {{$relateds->name}}
      </a></li>
    @endforeach

    </ul>
  </div>
 <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-green-100 px-4 py-2 font-bold text-[#0f0f0f0]">{{$store->name}} shoppers also like
</div>
    <ul class="flex flex-col  text-gray-700 py-2">
        {{-- {{dd ($store->likes);}} --}}
    @foreach ($store->likes as $relateds )
    <li><a href="#" class="flex  items-center gap-5 px-4 py-2 rounded-md hover:bg-gray-50">
    
      <img class="w-16 rounded-lg border border-[#1EC27E] " src="{{$relateds->logo}}" />
       <div class="flex flex-col items-start  " >
        <p>{{$relateds->name}}</p>
        <span class="font-bold text-[#1EC27E]">{{$relateds->coupons_with_code_count}} Discount Available</span>
        </div>
      </a></li>
    @endforeach

    </ul>
  </div>

    
      </div> 
    {{-- column two end --}} 
    </div>

  </section>


    <h1 class="text-5xl font-medium">{{ $store->name }}</h1>




@endsection
@push('scripts')

<script>
document.addEventListener("DOMContentLoaded", function () {
    let loadMoreBtn = document.getElementById("loadMore");

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener("click", function () {
            let url = this.getAttribute("data-next-page");

            if (!url) return;

            fetch(url)
                .then(response => response.text())
                .then(data => {
                    let parser = new DOMParser();
                    let html = parser.parseFromString(data, "text/html");

                    let newCoupons = html.querySelectorAll("#coupon-list article");
                    newCoupons.forEach(coupon => {
                        document.getElementById("coupon-list").appendChild(coupon);
                    });

                    // Update next page URL
                    let newBtn = html.querySelector("#loadMore");
                    if (newBtn) {
                        loadMoreBtn.setAttribute("data-next-page", newBtn.getAttribute("data-next-page"));
                    } else {
                        loadMoreBtn.remove(); // remove button if no more pages
                    }
                })
                .catch(error => console.error(error));
        });
    }
});
</script>
@endpush
