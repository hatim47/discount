@extends('website.layouts.app')

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
        "name" => "Contact",
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
                        <a href="{{region_route('featured') }}" class="hover:underline">Contact Us</a>
                    </nav>

                    <!-- Title -->
                    <h1 class="text-lg sm:text-2xl font-bold text-gray-900">Contact Us </h1>
                    <!-- Description -->
                    {{-- <p class="text-gray-600 text-sm mt-1">
                       {!! $store->description !!}
                    </p> --}}
                </div>
            </div>

         
        </div>
    </section>

 <section class="bg-[#F2FCFA] text-[#0F0F0F]">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 gap-6 flex flex-col sm:flex-row ">
    
    <div class="flex w-full justify-center md:w-1/2">
   <img class="w-full lg:w-7/12" src="{{asset('public/assets/images/all_image 1.png')}}" />
    </div>

  <div class="flex w-full md:w-1/2">
  
    <form class="flex flex-col gap-6 justify-between w-full">

    <!-- Name + Email -->
    <div class="flex flex-col sm:flex-row gap-6">
      <input
        type="text"
        name="name"
        placeholder="First Name"
        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0B453C]"
      />
       <input
        type="text"
        name="name"
        placeholder="Last Name"
        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0B453C]"
      />

    </div>
     <div class="flex flex-col sm:flex-row gap-6">
<input
        type="email"
        name="email"
        placeholder="Email Address"
        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0B453C]"
      />
    <!-- Subject -->
    <input
      type="text"
      name="subject"
      placeholder="Subject"
      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0B453C]"
    />
 </div>
    <!-- Message -->
    <textarea
      name="message"
      rows="5"
      placeholder="Your Message..."
      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0B453C]"
    ></textarea>

    <!-- Button -->
    <button
      type="submit"
      class="w-full bg-[#0B453C] text-[#F2FCFA] px-10 lg:px-16 py-3 rounded-full font-semibold text-sm hover:scale-105 transition-transform self-start"
    >
      Send Message
    </button>
  </form>
    </div>

      </div> 
 

  </section>





@endsection
@push('scripts')

<script>


</script>
@endpush
