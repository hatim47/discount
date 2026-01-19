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

.hiptip h3{
font-size:30px;
}
.hiptip h4{
font-weight:600;
font-size:25px;
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
                        <a href="{{region_route('advertise') }}" class="hover:underline">Advertise </a>
                    </nav>

                    <!-- Title -->
                    <h1 class="text-lg sm:text-5xl font-bold text-gray-900">{{$settings->heading}} </h1>
                    <!-- Description -->
                    <div class="flex flex-col hiptip items-start">
                       {!! $settings->subheading !!}
                    </div>
                </div>
            </div>

         
        </div>
    </section>

 <section class="bg-[#F2FCFA] text-[#0F0F0F]">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 gap-6 flex flex-col lg:flex-row ">
  <div class="flex w-full justify-center  lg:w-1/2">
   <img class="w-full h-fit md:w-8/12 " alt="discount offers" src="{{asset('public/assets/images/all_image 1.png')}}" />
  </div>
  <div class="flex flex-col hiptip gap-5 w-full lg:w-1/2 text-lg ">
      {!! $settings->contents !!}
</div>
      </div> 
 

 <div class="max-w-7xl mx-auto px-6 py-12 flex flex-col hiptip gap-5  text-lg ">
      {!! $settings->longdiscription !!}
</div>

  </section>

@endsection
@push('scripts')

<script>


</script>
@endpush
