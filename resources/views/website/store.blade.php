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
                <div
                    class="w-20 sm:w-24 md:w-28 lg:w-32 aspect-square rounded-full border border-[#0B453C] flex items-center justify-center bg-white shadow-sm overflow-hidden">
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


                <!-- Visit Button -->
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



  <!-- Quick Links -->
   @if ( $store->dynacontents ->isNotEmpty() )
  <div class="bg-white w-full rounded-xl shadow overflow-hidden">
    <div class="bg-[#0B453C] px-4 py-2 font-semibold text-white">Quick Links</div>
    <ul class="divide-y divide-gray-200 text-sm text-gray-700">
  @foreach ($store->dynacontents as $index => $relateds)
      <li><a href="#{{$index}}" class="block px-4 py-2 hover:bg-gray-50">{{$relateds->heading }}</a></li>
      @endforeach  
  </div>
@endif


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
