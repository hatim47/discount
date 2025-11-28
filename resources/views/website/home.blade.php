@extends('website.layouts.app')
@section('title', 'Welcome to ' . config('website.company.name'))
@section('meta_description', 'Best marketing platform to grow your business.')
@push("style")
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
@endpush
@section('content')
{{-- Hero Section --}}
<section class="bg-[#F2FCFA] text-[#0F0F0F]">
    <div class="max-w-7xl mx-auto flex  text-center min-[787px]:text-left items-center justify-center pt-10 min-[787px]:justify-between px-4">
     <div class="">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-semibold mb-4 capitalize">Stop Wasting Time <br>
        Hunting for <span class="text-[#0B453C] font-bold">Discounts!</span></h1>
        <p class="text-xl mb-4">Get Free Voucher Codes & Promo Codes on Brands You Crave For.</p>  
       <div class="hidden max-[787px]:flex justify-around">
<img src="{{asset('public/assets/images/Group 160.png')}}" class="w-10/12" />
</div> 
       <div class="relative">
        <input type="text" class="h-14 w-full px-4 rounded-full border-2 relative border-[#0B453C] bg-white"  @click="openSearch()" />
  <div class="text-[#0B453C] w-15 h-15 rounded-full absolute flex justify-center items-center font-semibold -top-1" @click="openSearch()" >
    <iconify-icon icon="flowbite:search-outline" width="28" height="28" class="text-[#0B453C] absolute z-2"></iconify-icon>
</div>
 <button class="bg-[#0B453C] px-10 lg:px-16 py-2 rounded-full text-white absolute z-2 top-2 right-2" @click="openSearch()">Search</button>
</div>
<div class="grid grid-cols-3 md:grid-cols-3 gap-3 md:gap-8 text-left py-5">
<!-- All Codes Verified -->
<div class="flex items-center space-x-3">
<img src="{{asset('public/assets/images/icon.svg - 2025-11-25T215548.414 1.png')}}" alt="Verified Codes" class="w-10 h-10">
<div class="flex flex-col text-left">
<p class="font-semibold text-lg">All Codes</p>
<p class="text-sm text-gray-600">Verified</p>
</div>
</div>
<!-- 20000+ Discounts -->
<div class="flex items-center space-x-3">
<img src="{{asset('public/assets/images/icon.svg - 2025-11-25T220208.269 1.png')}}" alt="Discounts" class="w-10 h-10">
<div class="flex flex-col text-left">
<p class="font-semibold text-lg">20000+</p>
<p class="text-sm text-gray-600">Discounts</p>
</div>
</div>
<!-- Upto 50% Cashback -->
<div class="flex items-center space-x-3">
<img src="{{asset('public/assets/images/icon.svg - 2025-11-25T230742.957 1.png')}}" alt="Cashback" class="w-10 h-10">
<div class="flex flex-col text-left">
<p class="font-semibold text-lg">Upto 50%</p>
<p class="text-sm text-gray-600">Cashback</p>
</div>
</div>
</div>
   </div>
<div class="hidden min-[787px]:flex justify-end">
<img src="{{asset('public/assets/images/Group 160.png')}}" class="w-10/12" />
</div>   
    </div>
</section>
{{-- Featured Coupons Grid --}}
<section class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 ">
    <h2 class="text-3xl font-bold text-[#0F0F0F] mb-8 pb-2">Featured Discount Voucher Offers</h2>

    {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 featured_slider"> --}}
   <div x-data="slider()" x-init="init()" class="relative py-5 w-full overflow-hidden">
    <!-- Slides wrapper -->
    <div
        class="flex py-5 transition-transform duration-500"
        :style="`transform: translateX(-${currentIndex * 100}%);`"
        @mousedown="startDrag($event)"
        @touchstart="startDrag($event)"
        @mouseup="endDrag()"
        @touchend="endDrag()"
        @mousemove="drag($event)"
        @touchmove="drag($event)"
    >
   @foreach($feature as $coupon)      
<article class="bg-white border border-gray-100 rounded-2xl flex-shrink-0 w-full md:w-6/12 lg:w-[23.7%] mx-2 shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
      <div class="relative p-4">
  <img src="{{ $coupon['image'] }}" alt="{{ $coupon->store['name'] }}" loading="lazy" class="w-full rounded-3xl h-40 object-cover" />
 <a href="{{region_route('store.website', ['slug' => $coupon->store['slug'] ]) }}"> <img src="{{ $coupon->store['logo'] }}" alt="{{ $coupon->store['name'] }}" loading="lazy"
  class="w-14 h-14 rounded-full absolute bottom-0 left-3 border-2 border-[#0B453C] shadow-md"
  /></a>
</div>

<div class="p-4 pt-3 flex flex-col justify-between h-[170px]">
  <div class="flex justify-between items-center">
  <h3 class="text-gray-800 text-start font-semibold text-base mb-2">{{ $coupon['title'] }}</h3>
   @if($coupon->verified)
       <iconify-icon icon="bitcoin-icons:verify-filled" width="32" height="32" class="text-[#0B453C]"></iconify-icon>
   @endif
</div>

  
    <div class="flex justify-between">
  <p class="text-sm text-[#0f0f0f]">View Terms</p>
  @php
    $views = $coupon->view;
    if ($views >= 1000000) {
        $views = round($views / 1000000, 1) . 'M';
    } elseif ($views >= 1000) {
        $views = round($views / 1000, 1) . 'k';
    }
@endphp
   <p class="text-sm text-[#0f0f0f]"> {{ $views }} Used
  </p></div>
 @if($coupon->deals == 0) 
                        <button
      aria-label="Reveal Code"
      data-code="{{$coupon['code']}}"
      data-text=" Reveal Code"
    data-title="{{ $coupon->title }}"
    data-terms="{{ $coupon->terms }}"
    onclick="openCouponLink('{{ $coupon->store['link']}}')"
      class="
        relative z-10 overflow-hidden 
        inline-flex items-center justify-center 
        w-full px-6 py-2 rounded-full font-light text-white 
        bg-[#0B453C] shadow-md 
        before:content-[attr(data-code)] before:inline-flex 
        before:absolute before:top-0 before:right-0 before:h-full before:w-16 
        before:items-center before:justify-end before:pr-3
        before:border-2 before:border-dashed before:border-l-0 before:border-[#0B453C]
        before:rounded-r-full before:bg-[#F2FCFA] before:text-[#0F0F0F] before:uppercase before:text-sm 
         before:-z-1 after:content-[''] after:absolute after:top-0 after:right-[34px] after:h-[calc(100%+2px)] after:w-full
        after:bg-[#0B453C] after: after:transition-all after:duration-200 after:ease-in-out  after:-z-1
        font-normal text-base  after:skew-x-[25deg] hover:after:right-[45px] hover:after:shadow-[5px_0_5px_0_rgba(0,0,0,0.25)]
      "
    > 
      Reveal Code
    </button>
    @else
 <button onclick="openCouponLink('{{ $coupon->store->link  }}')"
  data-code=""
    data-title="{{ $coupon->title }}"
    data-terms="{{ $coupon->terms }}" 
                    class="inline-block bg-[#0B453C] text-white px-4 py-2 rounded-full hover:bg-[#0B453C]">
                Get Deal
            </button>
              @endif
                </div>
    </article>

        {{-- <div class="bg-white rounded-xl shadow-md p-4">
            <h3 class="font-bold text-lg">{{ $coupon['store'] }}</h3>
            <p class="text-sm">{{ $coupon['discount'] }} - {{ $coupon['category'] }}</p>
            <span class="font-semibold">Code: {{ $coupon['code'] }}</span>
        </div>--}}
        @endforeach 
         </div>
       <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 flex space-x-2">
    <template x-for="page in totalPages()" :key="page">
        <button class="w-3 h-3 rounded-full border-[#0B453C] border"
            :class="currentIndex === (page-1) ? 'bg-[#0B453C] w-6' : 'bg-white'"
            @click="goToSlide(page-1)"></button>
    </template>
</div>
    </div> 
</section>

{{-- Featured Stores Carousel --}}
<section class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-3xl font-bold text-[#0F0F0F] mb-8 pb-2">Featured Store</h2>
    <div class="flex gap-4 flex-wrap justify-center">
  
        <div id="store-slider" 
     class="flex overflow-x-auto space-x-9 scrollbar-hide cursor-grab active:cursor-grabbing px-4 py-6">
    @foreach($stores as $store)
        <div class="flex-shrink-0 rounded-3xl border my-2 mx-4">
            <img src="{{ $store['logo'] }}" 
                 alt="{{ $store['name'] }}" 
                 class="w-34 h-24 rounded-3xl object-cover" />
        </div>
    @endforeach
</div>

<style>
/* Hide scrollbar */
.scrollbar-hide::-webkit-scrollbar { display: none; }
.scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

/* Prevent selecting text/images */
#store-slider, 
#store-slider * {
    user-select: none;
    -webkit-user-drag: none;
}
</style>
    </div>
</section>

{{-- Stats / About Section --}}
<section class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 text-center">
 <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        
        <!-- About Card -->
        <div class="bg-[#0B453C] rounded-3xl p-10 text-white text-left relative overflow-hidden md:row-span-2 min-h-[300px] md:min-h-[620px]">
            <div class="relative z-10">
                <h2 class="text-3xl font-normal mb-1">About</h2>
                <h1 class="text-5xl/11 font-extrabold  mb-4">Top Vouchers<br>Code</h1>
                <p class="text-sm lg:text-base leading-relaxed mb-8 opacity-90">
                    Top Vouchers Code contains affiliate links to products. We may receive a commission for purchases made through these links.
                </p>
                <button class="bg-[#F2FCFA] text-[#0B453C] px-10 lg:px-16 py-3 rounded-full font-semibold text-sm hover:scale-105 transition-transform">
                    Get Deal
                </button>
            </div>
            <img src="{{asset('public/assets/images/Mask group (15) (1).png')}}" 
                 alt="Shopping woman" 
                 class="absolute bottom-0 right-0 w-8/12 h-auto object-cover">
        </div>

        <!-- Style Drop Card -->
        <div class="bg-gradient-to-br from-orange-400 to-amber-300 rounded-3xl overflow-hidden relative min-h-[300px]">
            <img src="{{asset('public/assets/images/Mask group (13).png')}}" 
                 alt="Style drop promotion" 
                 class="w-full h-full object-cover">
        </div>

        <!-- Discount Card -->
        <div class="bg-[#FCF9F2] m-0 p-0 rounded-3xl flex justify-center items-center">
        <div class="flex flex-col p-5 text-left m-0">
            <h1 class="text-4xl font-bold text-[#0B453C] mb-4 leading-tight">
                Enjoy 55% off limited time
            </h1>
            <p class="text-sm lg:text-base text-black mb-6 leading-relaxed">
                Top Vouchers Code contains affiliate links to products.
            </p>
            <button class="bg-[#0B453C] text-white px-10 lg:px-16 py-3 rounded-full font-semibold text-sm hover:scale-105 transition-transform self-start">
                Get Deal
            </button>
</div>
            <div class=" rounded-r-3xl p-0 m-0 overflow-hidden w-full h-full">
            <img src="{{asset('public/assets/images/Mask group (14).png')}}" 
                 alt="Happy shopping woman" 
                 class="relative left-6  w-full h-full object-cover ">
        </div>
        </div>

        <!-- Shopping Card -->
        
    </div>
</section>

{{-- Deals Section --}}
<div class="bg-white">
    <section class="max-w-7xl mx-auto py-12 px-4 sm:px-6 text-center">
    @foreach($categories as $category)
        <div class="group flex justify-between gap-3 items-center mt-8 mb-4 pt-2 pb-1 px-4">
            <a href="{{ region_route('categ.page', ['slug' => $category->slug]) }}" class="font-bold text-[#0F0F0F] text-3xl m-0 p-0">{{ $category->name }}</a>
            <a href="{{ region_route('categ.page', ['slug' => $category->slug]) }}" class="text-[#0B453C] font-bold underline underline-offset-6">See All</a>
        </div>
   @php        // collect all coupons from stores in this category
        $allCoupons = $category->stores->flatMap->coupons;
        // only trending & pick max 4
        $trendingCoupons = $allCoupons->where('trend', 1)->take(4);
    @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 px-2">
            @foreach($category->stores as $store)
                    @foreach($store->coupons as $coupon)
          <a href=" {{region_route('store.website', ['slug' => $store['slug'] ]) }}" class="bg-white border border-gray-100 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 ">
      <div class="relative rounded-3xl p-4 ">
  <img src="{{ $store['logo'] }}" alt="{{$store['name'] }}" loading="lazy" class="w-full rounded-3xl  h-40 object-cover" />
  
</div>
<div class="p-4 pt-3 flex flex-col justify-between h-[170px]">
  <div class="flex justify-between items-center">
  {{-- <h2 class="text-gray-900 font-semibold text-sm">{{$store['name'] }}</h2> --}}
    <h3 class="text-gray-800 text-start font-semibold text-base mb-2">{{ $coupon['title'] }}</h3>

   @if($coupon->verified)
       <iconify-icon icon="bitcoin-icons:verify-filled" width="32" height="32" class="text-[#0B453C]"></iconify-icon>
    @endif
</div>

  {{-- <h3 class="text-gray-800 text-start font-semibold text-base mb-2">{{ $coupon['title'] }}</h3> --}}
    <div class="flex justify-between">
  <p class="text-sm text-[#0f0f0f]">View Terms</p>
  @php
    $views = $coupon->view;
    if ($views >= 1000000) {
        $views = round($views / 1000000, 1) . 'M';
    } elseif ($views >= 1000) {
        $views = round($views / 1000, 1) . 'k';
    }
@endphp
   <p class="text-sm text-[#0f0f0f]"> {{ $views }} Used
  </p></div>
 @if($coupon->deals == 0) 
                        <button
      aria-label="Reveal Code"
      data-code="{{$coupon['code']}}"
      data-text=" Reveal Code"
    data-code="{{ $coupon->code }}"
    data-title="{{ $coupon->title }}"
    data-terms="{{ $coupon->terms }}"
    onclick="openCouponLink('{{ $store['link'] }}')"
      class="
        relative z-10 overflow-hidden 
        inline-flex items-center justify-center 
        w-full px-6 py-2 rounded-full font-light text-white 
        bg-[#0B453C] shadow-md 
        before:content-[attr(data-code)] before:inline-flex 
        before:absolute before:top-0 before:right-0 before:h-full before:w-16 
        before:items-center before:justify-end before:pr-3
        before:border-2 before:border-dashed before:border-l-0 before:border-[#0B453C]
        before:rounded-r-full before:bg-[#F2FCFA] before:text-[#0F0F0F] before:uppercase before:text-sm 
         before:-z-1 after:content-[''] after:absolute after:top-0 after:right-[34px] after:h-[calc(100%+2px)] after:w-full
        after:bg-[#0B453C] after: after:transition-all after:duration-200 after:ease-in-out  after:-z-1
        font-normal text-base  after:skew-x-[25deg] hover:after:right-[45px] hover:after:shadow-[5px_0_5px_0_rgba(0,0,0,0.25)]
      "
    > 
    Reveal Code
    </button>
    @else
 <button onclick="openCouponLink('{{ $store['link'] }}')"
  data-code=""
    data-title="{{ $coupon->title }}"
    data-terms="{{ $coupon->terms }}" 
                    class="inline-block bg-[#0B453C] text-white px-4 py-2 rounded-full hover:bg-[#0B453C]">
                Get Deal
            </button>
              @endif
                </div>
    </a>
            @endforeach 


             @endforeach 
        </div>

@if($loop->iteration == 3)

<div class="bg-[#0B453C] rounded-3xl  mt-8 mb-4  px-6 py-3 flex flex-col md:flex-row items-center gap-10 h-[70vh] md:h-[40vh]"> 
<img class="object-cover px-auto w-7/12 md:w-5/12" src="{{asset('public/assets/images/image 2.png')}}" />
<div class="flex flex-col gap-3 text-left items-start py-6"> 
<h4 class="text-3xl font-semibold text-white">The Search for Discount Codes Ends Here</h4> 
<p class="text-white text-xl "> By adding thousands of store in a single place the Deal Seeker extension by TopVouchersCode, is the perfect haven for all the smart shoppers that love to save big on their sprees.</p>
 <button class="bg-[#F2FCFA] text-[#0B453C] px-10 lg:px-16 py-3 rounded-full font-semibold text-sm hover:scale-105 transition-transform self-start">
                Get Deal
            </button>
</div>
 </div>
@endif
@if($loop->remaining == 2) 
<div class="bg-[#F2FCFA] rounded-3xl  mt-8 mb-4  px-6 py-3 flex flex-col   md:flex-row-reverse  items-center gap-10 h-[70vh] md:h-[40vh]"> 
<img class="object-cover px-auto w-7/12 md:w-5/12" src="{{asset('public/assets/images/image 2.png')}}" />
<div class="flex flex-col gap-3 text-left items-start py-6"> 
<h4 class="text-3xl font-semibold text-[#0B453C]">The Search for Discount Codes Ends Here</h4> 
<p class="text-[#0B453C] text-xl "> By adding thousands of store in a single place the Deal Seeker extension by TopVouchersCode, is the perfect haven for all the smart shoppers that love to save big on their sprees.</p>
 <button class="bg-[#0B453C] text-[#F2FCFA] px-10 lg:px-16 py-3 rounded-full font-semibold text-sm hover:scale-105 transition-transform self-start">
                Get Deal
            </button>
</div>
 </div>
 @endif
  @endforeach 
  <div class="bg-[#0B453C] rounded-3xl  mt-8 mb-4 px-6 py-3 flex items-center justify-center gap-10 "> 

<div class="flex flex-col gap-3 text-center items-center py-6"> 
<h4 class="text-2xl lg:text-5xl font-semibold text-white">Sign-up To Get Latest <br> Voucher Codes First</h4> 
<p class="text-white text-xl ">Be the first one to get notified as soon as we update a new offer or discount.</p>
   <div class="relative w-full">
  <input type="text" class="h-14 w-full px-4 rounded-full border-2 relative border-[#0B453C] bg-white" placeholder="Enter your email address here" />
  <div class="text-[#0B453C] w-15 h-15 rounded-full absolute flex justify-center items-center font-semibold top-0 right-1"  >
    <iconify-icon icon="system-uicons:paper-plane-alt" width="34" height="34" class="text-[#0B453C] absolute z-2"></iconify-icon>
</div></div> 
            <p class="text-white text-sm  md:text-base ">By signing up I agree to topvoucherscode's <a href="" class="underline">Privacy Policy </a>and consent to receive emails about offers.</p>

</div>
 </div>
    </section>
</div>


@endsection
@push('scripts')

 <script src="{{ asset('public/assets/js/lib/jquery-3.7.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
function slider() {
    return {
        slides: Array.from(document.querySelectorAll('.flex-shrink-0')), // all slides
        currentIndex: 0,
        slidesPerView: 4, // change based on screen size if needed
        interval: null,
        startX: 0,
        dragging: false,

        init() {
            // Responsive slides per view
            this.updateSlidesPerView();
            window.addEventListener('resize', () => this.updateSlidesPerView());

            {{-- this.startAutoSlide(); --}}
        },

        updateSlidesPerView() {
            const width = window.innerWidth;
            if (width < 768) { // mobile
                this.slidesPerView = 1;
            } else if (width < 1024) { // tablet
                this.slidesPerView = 2;
            } else { // desktop
                this.slidesPerView = 6;
            }
        },

        totalPages() {
            return Math.ceil(this.slides.length / this.slidesPerView);
        },

        startAutoSlide() {
            this.interval = setInterval(() => {
                this.nextSlide();
            }, 3000);
        },

        stopAutoSlide() {
            clearInterval(this.interval);
        },

        nextSlide() {
            this.currentIndex = (this.currentIndex + 1) % this.totalPages();
        },

        goToSlide(page) {
            this.currentIndex = page;
            this.stopAutoSlide();
            this.startAutoSlide();
        },

        startDrag(e) {
            this.dragging = true;
            this.stopAutoSlide();
            this.startX = e.type.includes('mouse') ? e.clientX : e.touches[0].clientX;
        },

        drag(e) {
            if (!this.dragging) return;
        },

        endDrag() {
            if (!this.dragging) return;
            this.dragging = false;
            this.nextSlide();
            this.startAutoSlide();
        }
    }
}
  document.addEventListener("DOMContentLoaded", () => {
    const slider = document.getElementById("store-slider");
    let isDown = false;
    let startX, scrollLeft, lastX, velocity = 0, rafId;

    const momentum = () => {
        slider.scrollLeft -= velocity;
        velocity *= 0.95; // friction
        if (Math.abs(velocity) > 0.3) {
            rafId = requestAnimationFrame(momentum);
        }
    };
    const onDown = (pageX) => {
        isDown = true;
        startX = pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
        lastX = pageX;
        cancelAnimationFrame(rafId);
    };

    const onMove = (pageX) => {
        if (!isDown) return;
        const x = pageX - slider.offsetLeft;
        const walk = x - startX;
        slider.scrollLeft = scrollLeft - walk;
        velocity = pageX - lastX;
        lastX = pageX;
    };

    const onUp = () => {
        isDown = false;
        momentum();
    };

    // Mouse events
    slider.addEventListener("mousedown", (e) => onDown(e.pageX));
    slider.addEventListener("mousemove", (e) => onMove(e.pageX));
    slider.addEventListener("mouseup", onUp);
    slider.addEventListener("mouseleave", onUp);

    // Touch events
    slider.addEventListener("touchstart", (e) => onDown(e.touches[0].pageX));
    slider.addEventListener("touchmove", (e) => {
        onMove(e.touches[0].pageX);
        e.preventDefault();
    }, { passive: false });
    slider.addEventListener("touchend", onUp);
});
</script>
@endpush