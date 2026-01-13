@extends('website.layouts.app')
@section('title', $title)
@section('meta_description', $meta_description)
@push('styles')
<link rel="stylesheet"  href="{{ asset('public/assets/css/lib/slick.css') }}">
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
    background-color: #F2FCFA; /* Light gray background */
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
    background-color: #F2FCFA; /* Very light subtle contrast */
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
.slick-dots {
  display: flex !important;
  justify-content: center;
  align-items: center;
  flex-direction: row !important;
  list-style: none;
  margin-top: 1.5rem;
  gap: 0.5rem;
  padding: 0;
  position: static !important;
}

/* Each dot wrapper */
.slick-dots li {
  display: inline-flex !important;
  align-items: center;
  justify-content: center;
}

/* Hide the number text inside buttons */
.slick-dots li button {
  font-size: 0; /* hides 1, 2, 3... */
  line-height: 0;
  color: transparent;
  background: #d1d5db; /* gray-300 */
  border: none;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  transition: all 0.3s ease;
}

/* Active dot style */
.slick-dots li.slick-active button {
  background: #0B453C; /* your brand green */
  
  border-radius: 12px;
}

/* Hover effect */
.slick-dots li button:hover {
  background: #6ee7b7; /* lighter green */
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
        "name" => "All Events",
        "item" =>  region_route('event.all') 
    ],
    [
        "@type" => "ListItem",
        "position" => 3,
        "name" => ($event->title),
        "item" => url()->current()
    ]
];
// Store + Breadcrumb schema
$schema = [
    "@context" => "https://schema.org",
    "@graph" => [
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
            class="max-w-7xl mx-auto py-12 px-4 sm:px-6 flex flex-col  items-start justify-between gap-6">
            <div class="flex items-center  gap-4 ms-3">
                <div
                    class="w-20 sm:w-24 md:w-28 lg:w-32 aspect-square rounded-full border flex items-center justify-center bg-white shadow-sm overflow-hidden">
                    <img src="{{ $event->banner }}" alt="Clarks" class="w-full h-full object-contain p-2" />
                </div>
                
                <div class="flex flex-col justify-between">
                 <nav class="text-sm mb-1 text-gray-500">
                        <a href="{{ region_route('home') }}" class="hover:underline">Home</a>
                        <span class="sm:mx-2">&gt;</span>
                        <a href="{{ region_route('event.all') }}"  class="text-[#0B453C]  hover:font-medium hover:underline">All Events</a>
                       <span class="sm:mx-2">&gt;</span>
                         <a href="#"  class="text-[#0B453C]  hover:font-medium hover:underline">{{$event->title}}</h1>
               </a>
                    </nav>
                    <h1 class="text-lg sm:text-2xl font-bold text-gray-900">{{$event->heading}}</h1>
                </div>
           </div>
            <!-- Right Section -->    


 <div class="container mx-auto px-4 ">
  <div id="store-slider" class="slick-slider">
    @foreach($feature as $coupon)
      <div>
        <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 mx-2 my-5">
          <div class="relative p-4 w-full">
            <img src="{{ $coupon['image'] }}" alt="{{ $coupon->store['name'] }}" class="w-full rounded-3xl h-40 object-cover"/>
           <a href="{{region_route('store.website', ['slug' => $coupon->store['slug'] ]) }}"><img src="{{ $coupon->store['logo'] }}" alt="{{ $coupon->store['name'] }}" class="w-12 h-12 rounded-full absolute bottom-3 left-3 border-2 border-[#0B453C] shadow-md"/></a>
          </div>

          <div class="p-4 flex flex-col justify-between ">
            <div class="flex justify-between items-center mb-1">
              <h2 class="text-gray-900 font-semibold py-2 text-sm">{{ $coupon->store['name'] }}</h2>
              @if($coupon->verified)
                 <iconify-icon icon="bitcoin-icons:verify-filled" width="32" height="32" class="text-[#0B453C]"></iconify-icon>
              @endif
            </div>
            <h6 class="text-neutral-900 font-semibold text-sm mb-1">{{ $coupon['title'] }}</h6>
            <a href="{{region_route('store.website', ['slug' => $coupon->store['slug'] ]) }}" class="text-xs text-neutral-700">View all <span class="underline">{{ $coupon->store['name'] }} deals</span></a>
          </div>
        </article>
      </div>
    @endforeach
  </div>
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
<button id="loadMore" data-next-page="{{ $coupons->nextPageUrl() }}" 
class="bg-[#0B453C] text-white px-6 py-2 rounded-lg hover:bg-[#3c6a63]"
        >            Load More        </button>
    </div>
@endif
  
@if  ($event->top_events)
  <div class="bg-white w-full rounded-xl shadow overflow-hidden">
   <div class="flex flex-col flex-wrap gap-2 text-sm hiptip text-gray-700 py-6 px-4">
        {!! $event->top_events !!}
  </div>
  </div>
@endif
    </div> 


    <div class="inline-flex flex-wrap me-3 gap-x-0 gap-y-5 content-start lg:col-span-3 ">
    
    



<div class="bg-white w-full rounded-xl shadow overflow-hidden">
    <div class="bg-[#0B453C] px-4 text py-2 font-bold text-white">{{$event->title}} Event</div>
   <div class="flex flex-col flex-wrap text-sm gap-2  text-gray-700 p-2">
        {!! $event->description !!}
     
  </div>

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

  
    <div class="bg-white w-full rounded-xl shadow p-4" id="filter-options">
    <h6 class="font-bold text-lg text-gray-900 mb-2">Filter by</h6>

    <div class="flex flex-col gap-2 text-sm text-gray-700">
      <label class="flex items-center justify-between cursor-pointer">
        <span>All</span>
        <input type="radio" name="filter" value="all" checked class="accent-green-500" />
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





 
  <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-[#0B453C] px-4 py-2 font-bold text-white">Related Events</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
        {{-- {{dd ($store->relatedStores);}} --}}
    @foreach ($allevent as $relateds )
     <li><a href="{{ region_route('event', ['slug' => $relateds->slug]) }}" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#0B453C]/15">
      {{-- <img class="w-16 rounded-lg border border-[#0B453C] " src="{{$relateds->logo}}" /> --}}
      {{$relateds->title}}
      </a></li>
  @endforeach
    </ul>
  </div>

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



<div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-[#0B453C] px-4 py-2 font-bold text-white">Browse By Store</div>
    @php
    $letters = array_merge(range('A', 'Z'), ['0-9']);
@endphp

<ul class="flex flex-wrap text-sm text-gray-700 p-2">
    @foreach ($letters as $letter)
        <li>
            <a href="{{region_route('store.menu', ['slug' => strtolower($letter)])}}"
               class="flex items-center justify-center px-3 py-2 m-1 bg-gray-100 rounded-md hover:bg-[#0B453C]/15 font-semibold">
                {{ $letter }}
            </a>
        </li>
    @endforeach
</ul>
 </div>
 
  

    @if ( $trendingWith->isNotEmpty() )
   <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-[#0B453C] px-4 py-2 font-bold text-white">Trending Brands</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
     
    @foreach ($trendingWith as $relateds )
      <li><a href="{{region_route('store.website', ['slug' => $relateds->slug] ) }}" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#0B453C]/15">
      {{$relateds->name}}
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
 <script src="{{ asset('public/assets/js/lib/jquery-3.7.1.min.js') }}"></script>
 <script src="{{ asset('public/assets/js/lib/slick.min.js') }}"></script>
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
$(document).ready(function(){
  $('#store-slider').slick({
    slidesToShow: 4,          // Large screens default
    arrows: false,             // show next/prev arrows
    dots: true,               // show pagination dots
    infinite: false,          // set true if you want looping
    draggable: true,
    swipeToSlide: true,
    responsive: [
      {
        breakpoint: 1024,     // large screens
        settings: { slidesToShow: 4 }
      },
      {
        breakpoint: 768,      // medium screens
        settings: { slidesToShow: 3 }
      },
      {
        breakpoint: 640,      // small screens
        settings: { slidesToShow: 2 }
      },
      {
        breakpoint: 480,      // mobile
        settings: { slidesToShow: 1 }
      }
    ]
  });
});

</script>
<script>
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





</script>
@endpush
