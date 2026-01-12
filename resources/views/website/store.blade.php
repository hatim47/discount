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

h4{
font-weight:600;
font-size:22px;
}

h3{
font-weight:700;
font-size:30px;
}
.hiptip h3{
font-size:20px;
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

.description p {
    display: -webkit-box;
    -webkit-line-clamp: 3; /* number of lines to show */
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.description p.expanded {
    -webkit-line-clamp: unset;
}
</style>

@endpush
@section('content')
@php
// Build 3-level breadcrumbs (always present)
$breadcrumbs = [
    [
        "@type" => "ListItem",
        "position" => 1,
        "name" => "Home",
        "item" => url('/')
    ],
    [
        "@type" => "ListItem",
        "position" => 2,
        "name" => "All Store",
        "item" => url('/brands')
    ],
    [
        "@type" => "ListItem",
        "position" => 3,
        "name" => ($store->name),
        "item" => url()->current()
    ]
];
// Store + Breadcrumb schema
$schema = [
    "@context" => "https://schema.org",
    "@graph" => [
        [
            "@type" => "Store",
            "name" => ($store->name),
            "alternateName" => url()->current(),
            "url" => url()->current(),
            "image" => env('APP_FILES') . $store->logo,
            "description" => $store->m_descrip,
            "aggregateRating" => [
                "@type" => "AggregateRating",
                "bestRating" => "5",
                "worstRating" => "1",
                "ratingValue" => $existingRating,
                "reviewCount" => $store->view
            ]
        ],
        [
            "@type" => "BreadcrumbList",
            "itemListElement" => $breadcrumbs
        ]
    ]
];
$jsonLd = json_encode(
    $schema,
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
);
@endphp
<script type="application/ld+json">
{!! $jsonLd !!}
</script>
    <section class="bg-[#F2FCFA] text-[#0F0F0F]">
        <div
            class="max-w-7xl mx-auto py-12 px-4 sm:px-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <!-- Left Section -->
            <div class="flex items-center gap-4 ms-3 w-10/12 ">
                <!-- Logo -->
               <div class="w-20 sm:w-24 md:w-28 lg:w-32 aspect-square rounded-full border border-[#0B453C] flex items-center justify-center bg-white shadow-sm overflow-hidden">
                    <img src="{{ $store->logo }}" alt="Clarks" class="w-full h-full rounded-full object-contain " />
               </div>

                <!-- Text Content -->
                <div class="flex flex-col  w-10/12 ">
                    <!-- Breadcrumb -->
                    <nav class="text-sm mb-1 text-gray-500">
                        <a href="{{ region_route('home') }}" class="hover:underline">Home</a>
                        <span class=" sm:mx-2">&gt;</span>
                        <a href="{{region_route('store.menusa') }}" class="hover:underline">All Brands</a>
                        <span class=" sm:mx-2">&gt;</span>
                        <span class="text-[#0B453C] font-medium">{{ $store->name }}</span>
                    </nav>

                    <!-- Title -->
                    <h1 class="text-lg sm:text-2xl font-bold text-gray-900"> {{$store->heading}} </h1>
                    <!-- Description -->
                    <div class="text-gray-600 text-sm mt-1 description">
                       {!! $store->description !!}
                    </div>
                    @if ($store->description)
                    <button id="readMoreBtn" class="text-gray-900 hover:text-[#0B453C] hover:underline text-left text-sm mt-1">Read More</button>
                     @endif
                </div>
            </div>

            <!-- Right Section -->
            <div class="hidden sm:flex flex-col items-end gap-2 me-3">
                <!-- Popularity -->
                <a href="{{ $store->link }}"
                    class="flex items-center justify-center text-white bg-[#0B453C] hover:bg-gray-200 text-gray-800 text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    Visit Site
                </a>
            </div>
        </div>
    </section>

 <section class="bg-[#F2FCFA] text-[#0F0F0F]">
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
            class="bg-[#0B453C] text-white px-6 py-2 rounded-lg hover:bg-[#3c6a63]"
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
    <div class="inline-flex flex-wrap me-3 gap-x-0 gap-y-5 content-start lg:col-span-3 ">

<div id="rating-component" class=" bg-white rounded-xl shadow p-4 w-full flex flex-col items-start space-y-2">
    <h5 class="font-bold text-lg text-gray-900">Rate {{ $store->name }} Today!</h5>
    <div id="stars" class="flex space-x-1 cursor-pointer">
        <!-- Stars will be generated by JS -->
    </div>
    <p id="rating-text" class="text-sm text-gray-600">Rated 0 from 0 votes</p>
</div>
  <!-- Offer Summary -->
  <div class="bg-white w-full rounded-xl shadow p-4">
    <h5 class="font-bold text-lg text-gray-900">
      Today's Hand Tested Discount Code
    </h5>
    <p class="text-xs text-gray-500 mt-1">{{ now()->subDay()->format('d-M-Y') }}</p>
    <div class="mt-3 space-y-1 text-sm text-gray-700">
  <p>Voucher Codes: <span id="voucher-count" class="font-semibold">2</span></p>
<p>Deals: <span id="deal-count" class="font-semibold">4</span></p>
    </div>
    <div class="mt-3 bg-[#0B453C] px-3 py-2 rounded-md font-semibold text-white">
      Total Offers: <span id="total-count" class="ml-1">6</span>
    </div>
  </div>

  <!-- Filter Section -->
    <div class="bg-white w-full rounded-xl shadow p-4" id="filter-options">
    <h6 class="font-bold text-lg text-gray-900 mb-2">Filter by</h6>

    <div class="flex flex-col gap-2 text-sm text-gray-700">
      <label class="flex items-center justify-between cursor-pointer">
        <span>All</span>
        <input type="radio" name="filter" value="all" checked class="accent-[#0B453C]" />
      </label>
      <label class="flex items-center justify-between cursor-pointer">
        <span>Voucher Code</span>
        <input type="radio" name="filter" value="voucher" class="accent-gray-400" />
      </label>
      <label class="flex items-center justify-between cursor-pointer">
        <span>Online Sale</span>
        <input type="radio" name="filter" value="sale" class="accent-gray-400" />
      </label>
    </div>
  </div>

 @if ($store->specail)
@php
  $specail = json_decode($store->specail, true);
@endphp


 <div class="bg-white w-full rounded-xl shadow overflow-hidden space-y-4">
  <div class="bg-[#0B453C] px-4 py-2 font-semibold text-white"> What Makes {{ $store->name }}'s Special?</div>
 <div class="space-y-3 px-4 py-2">    
    <!-- Item 1 -->
    @if ($specail['free_deals'] == 'on')
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
          <iconify-icon icon="material-symbols-light:percent-discount-outline-rounded"
            width="24" height="24" style="color:#0B453C"></iconify-icon>
        </div>
        <span class="text-gray-800 text-sm font-medium">Free Deals</span>
      </div>
    @endif

    {{-- Free Delivery --}}
    @if ($specail['free_delivery'] === 'on')
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
          <iconify-icon icon="circum:delivery-truck"
            width="24" height="24" style="color:#0B453C"></iconify-icon>
        </div>
        <span class="text-gray-800 text-sm font-medium">Free Delivery</span>
      </div>
    @endif
  </div>
  </div>
 @endif
  @if ( $store->dynacontents ->isNotEmpty() )
  <div class="bg-white w-full rounded-xl shadow overflow-hidden">
    <div class="bg-[#0B453C] px-4 py-2 font-semibold text-white">Quick Links</div>
    <ul class="divide-y divide-gray-200 text-sm text-gray-700">
  @foreach ($store->dynacontents as $index => $relateds)
      <li><a href="#{{$index}}" class="block px-4 py-2 hover:bg-gray-50">{{$relateds->heading }}</a></li>
      @endforeach  
  </div>
@endif


  <div class="bg-white w-full rounded-xl shadow overflow-hidden">
    <div class="bg-[#0B453C] px-4 py-2 font-semibold text-white">{{ $store->name }}'s Social Media!</div>
   
    {{-- Social Media Links Section --}}
    @if ($store->socails)
      @php
        // Decode if stored as JSON string
        $socials = is_string($store->socails) ? json_decode($store->socails, true) : $store->socails;
        
        // Define social media platforms with their Iconify icons and colors
        $socialPlatforms = [
          'youtube' => ['icon' => 'entypo-social:youtube-with-circle', 'color' => 'text-gray-800', 'label' => 'YouTube'],
          'tiktok' => ['icon' => 'mage:tiktok-circle', 'color' => 'text-gray-800', 'label' => 'TikTok'],
          'snapchat' => ['icon' => 'entypo-social:qq-with-circle', 'color' => 'text-gray-800', 'label' => 'Snapchat'],
          'instagram' => ['icon' => 'entypo-social:instagram-with-circle', 'color' => 'text-gray-800', 'label' => 'Instagram'],
          'pinterest' => ['icon' => 'entypo-social:pinterest-with-circle', 'color' => 'text-gray-800', 'label' => 'Pinterest'],
          'twitter' => ['icon' => 'entypo-social:twitter-with-circle', 'color' => 'text-gray-800', 'label' => 'Twitter'],
          'facebook' => ['icon' => 'entypo-social:facebook-with-circle', 'color' => 'text-gray-800', 'label' => 'Facebook'],
          'lnikedin' => ['icon' => 'entypo-social:linkedin-with-circle', 'color' => 'text-gray-800', 'label' => 'LinkedIn'],
        ];
      @endphp
      
      <div class="px-4 py-3 border-t border-gray-200">
        <div class="flex flex-wrap gap-3">
          @foreach ($socialPlatforms as $platform => $details)
            @if (!empty($socials[$platform]))
              <a href="{{ $socials[$platform] }}" 
                 target="_blank" 
                 rel="noopener noreferrer"
                 class="flex items-center gap-2   hover:text-[#0B453C] transition-colors"
                 title="{{ $details['label'] }}">
                <iconify-icon icon="{{ $details['icon'] }}" class="{{ $details['color'] }} hover:text-[#0B453C]" width="28" height="28"></iconify-icon>
                
              </a>
            @endif
          @endforeach
        </div>
      </div>
    @endif
  </div>

@if ($store->hintip)

 <div class="bg-white w-full rounded-xl shadow overflow-hidden">   
   <div class="flex flex-col hiptip  gap-4 flex-wrap text-sm text-gray-700 p-2">
        {!! $store->hintip !!}
    </div>
  </div>
 @endif
   <div class="flex items-center justify-center rounded-xl w-full  overflow-hidden">
  <div class="max-w-md w-full text-center space-y-6">
    
    <!-- Icon -->
    <div class="relative flex justify-center">
      <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center">
       <svg xmlns="http://www.w3.org/2000/svg" width="96.372" height="96.307" viewBox="0 0 96.372 96.307"><g transform="translate(-1486.746 -663.03)"><path d="M1490.69,798.457l61.613-21.086,5.529,7.767-31.925,31.6Z" transform="translate(-3.201 -92.807)" fill="#ffed16"/><path d="M1689,802.376l-2.692-3.784-34.02,32.888,4.774,2.48Z" transform="translate(-134.367 -110.031)" fill="#feda0d"/><path d="M1673.136,809.511,1715,768.633l-2.37,13.823-19.945,60.23-2.26.812Z" transform="translate(-151.286 -85.715)" fill="#f90"/><path d="M1774.184,826.861l-1.031-.763-20.127,59.631,2.244,4.412,2.26-.812,19.945-60.23Z" transform="translate(-216.13 -132.357)" fill="#f77c00"/><circle cx="15.479" cy="15.479" r="15.479" transform="translate(1550.441 664.752)" fill="#fc646f"/><circle cx="14.712" cy="14.712" r="14.712" transform="translate(1548.399 666.835)" fill="#fd8087"/><g transform="translate(1486.746 663.03)"><g transform="translate(0 0)"><path d="M1539.884,759.329a2.991,2.991,0,0,1-1.252-.4,4.875,4.875,0,0,1-1.9-2.241q-7.517-15.526-15.089-31.026a2.437,2.437,0,0,0-1.207-1.212q-15.557-7.559-31.105-15.136a4.392,4.392,0,0,1-2.476-2.54,2.523,2.523,0,0,1,.05-1.591,4.6,4.6,0,0,1,3.154-2.492q28.3-9.384,56.587-18.834c1.658-.553,1.414-.116,1.233-1.908a17.543,17.543,0,0,1,15.075-18.779c9.745-1.129,18.066,4.9,19.874,14.388a17.658,17.658,0,0,1-15.777,20.62,15.98,15.98,0,0,1-3.417-.036,1.147,1.147,0,0,0-1.239.785q-3.53,10.728-7.122,21.435-5.957,17.88-11.895,35.766a4.747,4.747,0,0,1-2.093,2.875,2.483,2.483,0,0,1-1.015.33A2.358,2.358,0,0,1,1539.884,759.329Zm-49.753-53.247c.408.215.673.363.945.5q15.434,7.527,30.877,15.037a5.121,5.121,0,0,1,2.512,2.514q6.187,12.8,12.44,25.568c1,2.048,2,4.092,3.014,6.151a1.469,1.469,0,0,0,.393-.8q9.51-28.514,19.03-57.024c.2-.594.125-.82-.5-1.077a17.251,17.251,0,0,1-9.656-9.6c-.311-.745-.591-.776-1.282-.545q-26.418,8.831-52.852,17.618C1493.46,704.955,1491.867,705.5,1490.13,706.081Zm75.352-39.887a14.445,14.445,0,1,0,14.41,14.421A14.475,14.475,0,0,0,1565.482,666.194Z" transform="translate(-1486.746 -663.03)"/><path d="M1519.337,998.945c-.024-1.27-.676-1.943-1.715-1.894-.981.046-1.531.742-1.51,1.982a13,13,0,0,1-1.207,5.831c-1.906,4.06-4.9,6.734-9.5,7.334-.671.088-.777-.066-.506-.674a17.668,17.668,0,0,0,1.088-3.486c1.591-7.391-3.063-13.279-10.273-12.8-3.626.239-6.531,1.849-8,5.43-.147.358-.156.763-.333,1.109l-.141,2.031a17.687,17.687,0,0,0,1.175,3.072,19.28,19.28,0,0,0,7.762,6.692,13.483,13.483,0,0,0,2.538,1.025c.529.15.739.3.324.855a41.527,41.527,0,0,1-8.875,9.053,1.605,1.605,0,0,0-.328,2.3h0a1.608,1.608,0,0,0,2.208.3,43.134,43.134,0,0,0,10.453-11.078,1.174,1.174,0,0,1,1.167-.547C1513.875,1015.669,1519.482,1006.519,1519.337,998.945Zm-17.935,12.6c-.181.374-.394.394-.747.3a16.867,16.867,0,0,1-8.908-5.781c-2.516-3.147-.908-5.979,2.027-7.146,4.71-1.873,9.35,1.23,9.358,6.529A16.345,16.345,0,0,1,1501.4,1011.544Z" transform="translate(-1487.154 -932.647)"/><path d="M1714.063,887.459a1.6,1.6,0,0,1,1.461,2.3,3.474,3.474,0,0,1-.645.795q-4.769,4.786-9.55,9.56a4,4,0,0,1-.56.5,1.586,1.586,0,0,1-2.193-2.238,4.479,4.479,0,0,1,.5-.553q4.776-4.779,9.553-9.557A2.143,2.143,0,0,1,1714.063,887.459Z" transform="translate(-1661.669 -845.191)"/><path d="M1782.081,842.246a1.49,1.49,0,0,1-1.485-.921,1.555,1.555,0,0,1,.343-1.814c.984-1,1.982-1.992,2.975-2.986.86-.861,1.711-1.734,2.587-2.579a1.611,1.611,0,1,1,2.249,2.274c-1.8,1.823-3.617,3.624-5.425,5.436A1.667,1.667,0,0,1,1782.081,842.246Z" transform="translate(-1725.13 -801.268)"/><path d="M1884,702.442a8.819,8.819,0,0,1-2.993.806,1.557,1.557,0,0,1-1.777-1.4,1.516,1.516,0,0,1,1.435-1.752,4.386,4.386,0,0,0,3.568-2.406,1.456,1.456,0,0,1,1.753-.764,1.519,1.519,0,0,1,1.214,1.579q0,9.579-.006,19.157a1.567,1.567,0,0,1-1.558,1.652,1.624,1.624,0,0,1-1.628-1.793c-.016-3.787-.007-7.575-.007-11.363Z" transform="translate(-1805.306 -690.488)"/></g></g></g><script xmlns=""/></svg>
      </div>
    </div>

    <!-- Heading -->
    <h2 class="text-2xl font-bold text-gray-900">
      Sign-up To Get Latest Voucher Codes First
    </h2>

    <!-- Description -->
    <p class="text-gray-600 text-sm">
      Be the first one to get notified as soon as we update a new offer or discount.
    </p>

    <!-- Form -->
    <div class="flex items-center bg-white rounded-full shadow overflow-hidden">
      <input
        type="email"
        placeholder="Enter Your Email Address Here"
        class="flex-1 px-5 py-3 text-sm outline-none"
      />
      <button class="bg-[#0B453C] hover:bg-[#3c6a63] text-white px-6 py-3 rounded-full font-medium">
        Subscribe
      </button>
    </div>

    <!-- Footer text -->
    <p class="text-xs text-gray-600">
      By signing up I agree to topvoucherscode's
      <a href="#" class="text-[#0B453C] underline">Privacy Policy</a>
      and consent to receive emails about offers.
    </p>

  </div>
</div>

  <!-- Quick Links -->
 


  @if ( $store->relatedStores ->isNotEmpty())
  <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-[#0B453C] px-4 py-2 font-bold text-white">Related Stores</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
        {{-- {{dd ($store->relatedStores);}} --}}
    @foreach ($store->relatedStores as $relateds )
      <li><a href="{{region_route('store.website', ['slug' => $relateds->slug] ) }}" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#0B453C]/15">
      {{-- <img class="w-16 rounded-lg border border-[#0B453C] " src="{{$relateds->logo}}" /> --}}
      {{$relateds->name}}
      </a></li>
    @endforeach

    </ul>
  </div>
@endif

  @if ($store->categories ->isNotEmpty())
  <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-[#0B453C] px-4 py-2 font-bold text-white">Related Categories</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
        {{-- {{dd ($store->relatedStores);}} --}}
    @foreach ($store->categories as $relateds )
     <li><a href="{{region_route('categ.page', ['slug' => $relateds->slug] ) }}" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#0B453C]/15">
      {{-- <img class="w-16 rounded-lg border border-[#0B453C] " src="{{$relateds->logo}}" /> --}}
      {{$relateds->name}}
      </a></li>
    @endforeach

    </ul>
  </div>
@endif
  @if ($store->trendingWith ->isNotEmpty() )
   <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-[#0B453C] px-4 py-2 font-bold text-white">Trending Brands</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
        {{-- {{dd ($store->relatedStores);}} --}}
    @foreach ($store->trendingWith as $relateds )
      <li><a href="{{region_route('store.website', ['slug' => $relateds->slug] ) }}" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#0B453C]/15">
      {{-- <img class="w-16 rounded-lg border border-[#0B453C] " src="{{$relateds->logo}}" /> --}}
      {{$relateds->name}}
      </a></li>
    @endforeach
    </ul>
  </div>
  @endif

   @if ($store->likes->isNotEmpty() )
 <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-[#0B453C] px-4 py-2 font-bold text-white">{{$store->name}} shoppers also like
</div>
    <ul class="flex flex-col  text-gray-700 py-2">
    @foreach ($store->likes as $relateds )
    <li><a href="{{region_route('store.website', ['slug' => $relateds->slug] ) }}" class="flex  items-center gap-5 px-4 py-2 rounded-md hover:bg-gray-50">    
      <img class="w-16 rounded-lg border border-[#0B453C] " src="{{$relateds->logo}}" />
       <div class="flex flex-col items-start  " >
        <p>{{$relateds->name}}</p>
        <span class="font-bold text-[#0B453C]">{{$relateds->coupons_with_code_count}} Discount Available</span>
        </div>
      </a></li>
    @endforeach
    </ul>
  </div>
 @endif
    
      </div> 
    {{-- column two end --}} 
    </div>

  </section>

@endsection
@push('scripts')

<script>


const desc = document.querySelector('.description  p');
const btn = document.getElementById('readMoreBtn');

btn.addEventListener('click', () => {
    desc.classList.toggle('expanded');
    if(desc.classList.contains('expanded')){
        btn.textContent = 'Read Less';
    } else {
        btn.textContent = 'Read More';
    }
});
document.addEventListener("DOMContentLoaded", function () {
    let loadMoreBtn = document.getElementById("loadMore");

    // Load more coupons
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

                    // 🔔 Trigger event so filters & counts update
                    document.dispatchEvent(new Event('couponsLoaded'));
                })
                .catch(error => console.error(error));
        });
    }

    // Filter & counts
    const filters = document.querySelectorAll('input[name="filter"]');

    function applyFilter(selected) {
        const coupons = document.querySelectorAll('#coupon-list .coupon-card');
        coupons.forEach(coupon => {
            const type = coupon.dataset.type;
            coupon.style.display = (selected === 'all' || selected === type) ? '' : 'none';
        });
        updateCounts(); // update counts after filtering
    }

    filters.forEach(filter => {
        filter.addEventListener('change', () => {
            applyFilter(filter.value);
        });
    });

    // Initial counts
    updateCounts();

    // Update after new coupons loaded
    document.addEventListener('couponsLoaded', () => {
        const activeFilter = document.querySelector('input[name="filter"]:checked')?.value || 'all';
        applyFilter(activeFilter);
    });
});

function updateCounts() {
    const coupons = document.querySelectorAll('#coupon-list .coupon-card');

    let vouchers = 0;
    let deals = 0;

    coupons.forEach(coupon => {
        const type = coupon.dataset.type;
        if (type === 'voucher') vouchers++;
        if (type === 'sale') deals++;
    });

    const total = vouchers + deals;

    document.getElementById('voucher-count').textContent = vouchers;
    document.getElementById('deal-count').textContent = deals;
    document.getElementById('total-count').textContent = total;
}



document.addEventListener("DOMContentLoaded", function () {
    const starContainer = document.getElementById("stars");
    const ratingText = document.getElementById("rating-text");

    let currentRating = 0; // current selected rating
    let hoverRating = 0; // hover rating

    // Function to render stars
    function renderStars() {
        starContainer.innerHTML = '';
        for (let i = 1; i <= 5; i++) {
            const star = document.createElementNS("http://www.w3.org/2000/svg", "svg");
            star.setAttribute("viewBox", "0 0 24 24");
            star.setAttribute("class", "w-6 h-6 text-gray-300");
            star.innerHTML = `
                <defs>
                    <linearGradient id="grad-${i}">
                        <stop offset="0%" stop-color="gold"/>
                        <stop offset="100%" stop-color="gold"/>
                    </linearGradient>
                </defs>
                <path fill="currentColor" d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.4 8.174L12 18.897l-7.334 3.857 1.4-8.174L.132 9.21l8.2-1.192z"/>
            `;

            // Determine fill width (half/full)
            let fill = 0;
            if (hoverRating > 0) {
                fill = Math.min(Math.max(hoverRating - (i - 1), 0), 1);
            } else {
                fill = Math.min(Math.max(currentRating - (i - 1), 0), 1);
            }

            // Create overlay for filled part
            const wrapper = document.createElement("div");
            wrapper.classList.add("relative");
            wrapper.style.width = "24px"; // match svg width
            wrapper.style.height = "30px";
            const emptyStar = star.cloneNode(true);
            emptyStar.classList.remove("text-yellow-400");
            emptyStar.classList.add("text-gray-300");
            const fullStar = star.cloneNode(true);
            fullStar.classList.remove("text-gray-300");
            fullStar.classList.add("text-yellow-400");
            fullStar.style.position = "absolute";
            fullStar.style.top = "0";
            fullStar.style.left = "0";
            fullStar.style.width = `${fill * 100}%`;
            fullStar.style.overflow = "hidden";
            fullStar.style.clipPath = `inset(0 ${100 - fill * 100}% 0 0)`;
            wrapper.appendChild(emptyStar);
            wrapper.appendChild(fullStar);
            // Mouse events
            wrapper.addEventListener("mousemove", e => {
                const rect = wrapper.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const newHover = x < rect.width / 2 ? i - 0.5 : i;
                hoverRating = newHover;
                renderStars();
            });
            wrapper.addEventListener("mouseleave", () => {
                hoverRating = 0;
                renderStars();
            });
            wrapper.addEventListener("click", () => {
                currentRating = hoverRating || i;
                ratingText.textContent = `Rated ${currentRating} from 1 vote`; // replace vote count with dynamic
                // Here you can send AJAX to store rating
                console.log("Rating selected:", currentRating);
            });
            starContainer.appendChild(wrapper);
        }
    }
    renderStars();
});

</script>
@endpush
