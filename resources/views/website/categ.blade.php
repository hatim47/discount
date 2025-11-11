@extends('website.layouts.app')

@section('title', 'Welcome to ' . config('website.company.name'))
@section('meta_description', 'Best marketing platform to grow your business.')
@push('styles')
  <link rel="stylesheet"  href="{{ asset('assets/css/lib/slick.css') }}">
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
  background: #1EC27E; /* your brand green */
  
  border-radius: 12px;
}

/* Hover effect */
.slick-dots li button:hover {
  background: #6ee7b7; /* lighter green */
}
</style>
@endpush

@section('content')

    <section class="bg-[#FAF9F5] text-[#0F0F0F]">

        <div
            class="max-w-7xl mx-auto py-5 px-4 sm:px-6 flex flex-col  items-start  justify-start gap-6">
            <!-- Left Section -->
            <div class="flex  gap-4 ms-3">
                <div>
                    <!-- Breadcrumb -->
                    <nav class="text-sm mb-1 text-gray-500">
                        <a href="{{ route('home') }}" class="hover:underline">Home</a>
                        <span class=" sm:mx-2">&gt;</span>
                        <a href="Categories"  class=" hover:underline">Categories</a>
                        <span class=" sm:mx-2">&gt;</span>
                        <span class="text-[#1ec27e] hover:font-medium hover:underline">{{ $store->name }}</span>
                    </nav>
                </div>
            </div>

 <div class="container mx-auto px-4 ">
  <div id="store-slider" class="slick-slider">
    @foreach($feature as $coupon)
      <div>
        <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 mx-2 my-5">
          <div class="relative w-full">
            <img src="{{ $coupon['image'] }}" alt="{{ $coupon->store['name'] }}" class="w-full h-40 object-cover"/>
            <img src="{{ $coupon->store['logo'] }}" alt="{{ $coupon->store['name'] }}" class="w-12 h-12 rounded-full absolute bottom-3 left-3 border-2 border-white shadow-md"/>
          </div>

          <div class="p-4 flex flex-col justify-between ">
            <div class="flex justify-between items-center mb-1">
              <h2 class="text-gray-900 font-semibold text-sm">{{ $coupon->store['name'] }}</h2>
              @if($coupon->verified)
                <span class="text-[#0f0f0f] bg-[#1EC27E]/20 uppercase px-2 text-xs rounded-2xl">Verified</span>
              @endif
            </div>
            <h6 class="text-neutral-900 font-semibold text-sm mb-1">{{ $coupon['title'] }}</h6>
            <p class="text-xs text-neutral-700">View all <span class="underline">{{ $coupon->store['name'] }} deals</span></p>
          </div>
        </article>
      </div>
    @endforeach
  </div>
</div>
        </div>

    </section>

 <section class="bg-[#F2F0E6] text-[#0F0F0F]">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6  gap-6  grid grid-cols-1 lg:grid-cols-10">
     {{-- column one start  --}}
    <div class="flex flex-col ms-3 gap-6 lg:col-span-7">
     <div id="coupon-list"  class="flex flex-col ms-3 gap-6  lg:col-span-7"> 
   

   
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
  {{-- @foreach ($store->dynacontents as $index => $relateds)
 <div class="bg-white rounded-xl w-full my-5 shadow overflow-hidden" id="{{$index}}">
    <h3 class="border-gray-800/20 border-b px-8 text-xl py-4 font-bold text-[#0f0f0f0] ">{{$relateds->heading}} 
</h3>
    <div class="flex flex-col  text-[#0f0f0f0] p-8">
       

{!! $relateds->description !!}

    </div>
  </div>
    @endforeach --}}
</div> 

     </div> 

    
          {{-- column one end  --}}

          {{-- column two start --}}
    <div class="inline-flex flex-wrap me-3 gap-x-0 gap-y-5 content-start lg:col-span-3 ">
    
    



  

  <!-- Filter Section -->
  <div class="bg-white w-full rounded-xl shadow p-4" id="filter-options">
    <h3 class="font-bold text-lg text-gray-900 mb-2">Filter by</h3>

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

  <!-- Quick Links -->
  <div class="bg-white w-full rounded-xl shadow overflow-hidden">
    <div class="bg-green-100 px-4 text py-2 font-bold text-gray-900">About {{$store->name}}</div>
   <div class="flex flex-wrap text-sm text-gray-700 p-2">
        {!! $store->shrt_content !!}
     
  </div>

  </div>

@if ( $relatedStores->isNotEmpty() )
    

  <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-green-100 px-4 py-2 font-bold text-[#0f0f0f0]">Related Stores</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
       
    @foreach ($relatedStores as $relateds )
      <li><a href="#" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#1EC27E]/15">
  
      {{$relateds->name}}
      </a></li>
    @endforeach

    </ul>
  </div>
@endif
  
  <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-green-100 px-4 py-2 font-bold text-[#0f0f0f0]">Related Categories</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
       
    @foreach ($categories as $relateds )
     <li><a href="#" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#1EC27E]/15">
     
      {{$relateds->name}}
      </a></li>
    @endforeach

    </ul>
  </div>
   <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-green-100 px-4 py-2 font-bold text-[#0f0f0f0]">Browse By Store</div>
    @php
    $letters = array_merge(range('A', 'Z'), ['0-9']);
@endphp

<ul class="flex flex-wrap text-sm text-gray-700 p-2">
    @foreach ($letters as $letter)
        <li>
            <a href="{{route('store.menu', strtolower($letter))}}"
               class="flex items-center justify-center px-3 py-2 m-1 bg-gray-100 rounded-md hover:bg-[#1EC27E]/15 font-semibold">
                {{ $letter }}
            </a>
        </li>
    @endforeach
</ul>

  </div>
  @if ( $trendingWith->isNotEmpty() )
   <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-green-100 px-4 py-2 font-bold text-[#0f0f0f0]">Trending Brands</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
     
    @foreach ($trendingWith as $relateds )
      <li><a href="#" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#1EC27E]/15">
      {{$relateds->name}}
      </a></li>
    @endforeach

    </ul>
  </div>
@endif

  @if ( $likes->isNotEmpty() )
 <div class="bg-white rounded-xl w-full shadow overflow-hidden">
    <div class="bg-green-100 px-4 py-2 font-bold text-[#0f0f0f0]">{{$store->name}} shoppers also like
</div>
    <ul class="flex flex-col  text-gray-700 py-2">
    @foreach ($likes as $relateds )
    <li><a href="#" class="flex  items-center gap-5 px-4 py-2 rounded-md hover:bg-gray-50">
      <img class="w-16 rounded-lg border border-[#1EC27E]" src="{{$relateds->logo}}" />
       <div class="flex flex-col items-start  " >
        <p>{{$relateds->name}}</p>
        <span class="font-bold text-[#1EC27E]">{{$relateds->coupons_with_code_count}}Discount Available</span>
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
  <h1 class="text-5xl font-medium">{{ $store->name }}</h1>
@endsection
@push('scripts')
 <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
 <script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>
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
  const filters = document.querySelectorAll('input[name="filter"]');

  // Function to filter visible coupons
  function applyFilter(selected) {
    const coupons = document.querySelectorAll('#coupon-list .coupon-card'); // requery each time

    coupons.forEach(coupon => {
      const type = coupon.dataset.type;

      if (selected === 'all' || selected === type) {
        coupon.style.display = '';
      } else {
        coupon.style.display = 'none';
      }
    });
  }

  // Listen for filter changes
  filters.forEach(filter => {
    filter.addEventListener('change', () => {
      applyFilter(filter.value);
    });
  });

  // Also listen for new coupons after Load More click
  document.addEventListener('couponsLoaded', () => {
    const activeFilter = document.querySelector('input[name="filter"]:checked').value;
    applyFilter(activeFilter);
  });
});
</script>

@endpush
