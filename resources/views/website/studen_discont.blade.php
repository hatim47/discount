@extends('website.layouts.app')

@section('title', $title)
@section('meta_description', $meta_description)
@push('styles')


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
        "name" => ($heading),
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
            class="max-w-7xl mx-auto py-12 px-4 sm:px-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <!-- Left Section -->
            <div class="flex items-center gap-4 ms-3">

                <!-- Text Content -->
                <div>
                    <!-- Breadcrumb -->
                    <nav class="text-sm mb-1 text-gray-500">
                        <a href="{{ region_route('home') }}" class="hover:underline">Home</a>
                        <span class="sm:mx-2">&gt;</span>
                        <a href="#"  class="text-[#0B453C]  hover:font-medium hover:underline"> {{$heading}}</a>
                    </nav>
                    <!-- Title -->
                    <h1 class="text-lg sm:text-2xl font-bold text-gray-900">
                   {{$heading}}
                    </h1>
                     <p>  {{$subheading}}</p>
                </div>
            </div>
        </div>
    </section>

 <section class="bg-[#F2FCFA] py-10 text-[#0F0F0F]">
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 px-2 pb-10">
            @foreach($category->stores as $store)
                    @foreach($store->coupons as $coupon)
          <div class="bg-white border border-gray-100 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <a href=" {{region_route('store.website', ['slug' => $store['slug'] ]) }}" class=" flex justify-center py-4 ">
  <img src="{{ $store['logo'] }}" alt="{{$store['name'] }}" loading="lazy" class="w-11/12 rounded-3xl  h-40 object-cover" />
</a>
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
  <p data-termsa="{!! $coupon->trems !!}" onclick="openTerms(this)" class="text-sm text-[#0f0f0f]">View Terms</p>
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
    data-terms="{{ $coupon->trems }}"
    onclick="openCouponLink('{{ $store['link'] }}')"
      class="
        relative z-10 overflow-hidden 
        inline-flex items-center justify-center 
        w-full px-6 py-2 rounded-full font-light text-white 
        bg-[#0B453C] shadow-md hover:after:bg-[#3c6a63] hover:before:border-[#3c6a63]
        before:content-[attr(data-code)] before:inline-flex 
        before:absolute before:top-0 before:right-0 before:h-full before:w-16 
        before:items-center before:justify-end before:pr-3
        before:border-2 before:border-dashed before:border-l-0 before:border-[#0B453C]
        before:rounded-r-full before:bg-[#F2FCFA] before:text-[#0F0F0F] before:uppercase before:text-sm 
         before:-z-1 after:content-[''] after:absolute after:top-0 after:right-[34px] after:h-[calc(100%+2px)] after:w-full
        after:bg-[#0B453C] after: after:transition-all after:duration-200 after:ease-in-out  after:-z-1
        font-normal text-base after:skew-x-[25deg] hover:after:right-[45px] hover:after:shadow-[5px_0_5px_0_rgba(0,0,0,0.25)]
      "
    > 
    Reveal Code
    </button>
    @else
 <button onclick="openCouponLink('{{ $store['link'] }}')"
  data-code=""
    data-title="{{ $coupon->title }}"
    data-terms="{{ $coupon->trems }}" 
                    class="inline-block bg-[#0B453C] text-white px-4 py-2 rounded-full transition delay-150 duration-300 ease-in-out hover:bg-[#3c6a63]">
                Get Deal
            </button>
              @endif
                </div>
    </div>
            @endforeach 


             @endforeach 
        </div>
 
  @endforeach 

    </section>


</div>
    </section>



@endsection
@push('scripts')


@endpush
