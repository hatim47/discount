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
        "name" => "Advertise",
        "item" =>url()->current()
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
                <!-- Logo -->
               

                <!-- Text Content -->
                <div>
                    <!-- Breadcrumb -->
                    <nav class="text-sm mb-1 text-gray-500">
                        <a href="{{ region_route('home') }}" class="hover:underline">Home</a>
                        <span class=" sm:mx-2">&gt;</span>
                        <a href="{{region_route('advertise') }}" class="hover:underline">Advertise With Us</a>
                    </nav>

                    <!-- Title -->
                    <h1 class="text-lg sm:text-5xl font-bold text-gray-900">Advertise With Us </h1>
                    <!-- Description -->
                    {{-- <p class="text-gray-600 text-sm mt-1">
                       {!! $store->description !!}
                    </p> --}}
                </div>
            </div>

         
        </div>
    </section>

 <section class="bg-[#F2FCFA] text-[#0F0F0F]">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 gap-6 flex flex-col lg:flex-row ">
  <div class="flex w-full justify-center  lg:w-1/2">
   <img class="w-full h-fit md:w-8/12 " src="{{asset('public/assets/images/all_image 1.png')}}" />
  </div>
  <div class="flex flex-col gap-5 w-full lg:w-1/2 text-lg ">
      {!! $setting->advertise_contect !!}
</div>
      </div> 
 
  </section>

@endsection
@push('scripts')

<script>


</script>
@endpush
