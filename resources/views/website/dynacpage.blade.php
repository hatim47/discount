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
</style>
@endpush

@section('content')

    <section class="bg-[#F2FCFA] text-[#0F0F0F]">
        <div
            class="max-w-7xl mx-auto py-12 px-4 sm:px-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <!-- Left Section -->
            <div class="flex items-center gap-4 ms-3">
                <!-- Logo -->
                <div
                    class="w-20 sm:w-24 md:w-28 lg:w-32 aspect-square rounded-full border flex items-center justify-center bg-white shadow-sm overflow-hidden">
                    <img src="{{ $event->banner }}" alt="Clarks" class="w-full h-full object-contain p-2" />
                </div>
                <!-- Text Content -->
                <div>
                    <!-- Breadcrumb -->                 
                    <!-- Title -->
                    <h1 class="text-lg sm:text-2xl font-bold text-gray-900">{{$event->heading}}</h1>
                    <p>  {!! $event->shortdiscription !!} </p>
                    <!-- Description -->
                </div>
            </div>
            <!-- Right Section -->         
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
     </div> 

    
          {{-- column one end  --}}

          {{-- column two start --}}
    <div class="inline-flex flex-wrap me-3 gap-x-0 gap-y-5 content-start lg:col-span-3 ">
    
    



<div class="bg-white w-full rounded-xl shadow overflow-hidden">
    <div class="bg-green-100 px-4 text py-2 font-bold text-gray-900">{{$event->title}} Event</div>
   <div class="flex flex-wrap text-sm text-gray-700 p-2">
        {!! $event->longdiscription !!}
     
  </div>

  </div>

  <!-- Offer Summary -->


  <!-- Filter Section -->
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
    <div class="bg-green-100 px-4 py-2 font-bold text-[#0f0f0f0]">Related Store</div>
    <ul class="flex flex-wrap text-sm text-gray-700 p-2">
        {{-- {{dd ($store->relatedStores);}} --}}
    @foreach ($trends as $relateds )
     <li><a href="{{ region_route('store.website', ['slug' => $relateds->slug]) }}" class="flex items-center bg-gray-100 p-2 rounded-md m-1 hover:bg-[#0B453C]/15">
      {{-- <img class="w-16 rounded-lg border border-[#0B453C] " src="{{$relateds->logo}}" /> --}}
      {{$relateds->name}}
      </a></li>
  @endforeach

    </ul>
  </div>

 

  
    
      </div> 
    {{-- column two end --}} 
    </div>

  </section>


  




@endsection
@push('scripts')

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
