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
                    <h1 class="text-lg sm:text-2xl font-bold text-gray-900">
                    {{$heading}}
                    </h1>
                     <p>  {{$subheading}}</p>
                </div>
            </div>
        </div>
    </section>

 <section class="bg-[#F2FCFA] py-10 px-4 sm:px-6 text-[#0F0F0F]">
<div class=" max-w-7xl mx-auto flex  justify-center items-center flex-wrap gap-10">
  
   <div class="flex-1 flex flex-col justify-center items-center bg-white shadow-md rounded-xl py-5 gap-3"> <h3 class="text-xl">1. Gender </h3>
    <div class="flex-1 flex gap-3">
   <label class="cursor-pointer">
    <input type="radio" name="gender" value="male" class="sr-only peer" />
    <div class="border rounded-lg p-4 w-36 text-center
                transition-all duration-300
                peer-checked:border-blue-500 peer-checked:bg-blue-50
                  hover:border-[#0B453C] hover:bg-[#b2f0e6]">
      <h3 class="font-semibold">Male</h3>
    </div>
  </label>

  <label class="cursor-pointer">
    <input type="radio" name="gender" value="female"  class="sr-only peer" />
    <div class="border rounded-lg p-4 w-36 text-center
                transition-all duration-300
                peer-checked:border-blue-500 peer-checked:bg-blue-50
                  hover:border-[#0B453C] hover:bg-[#b2f0e6]">
      <h3 class="font-semibold">Female</h3>
    </div>
  </label>


   </div>
    </div>
  <div class="flex-1 flex flex-col justify-center items-center bg-white shadow-md rounded-xl py-5 gap-3">  
     <h3 class="text-xl">2. Age </h3>
      <div class="flex-1 flex gap-3">
   <label class="cursor-pointer">
    <input type="radio" name="age" value="18-24" class="sr-only peer" />
    <div class="border rounded-lg p-3 w-18 text-center
                transition-all duration-300
                peer-checked:border-blue-500 peer-checked:bg-blue-50
                 hover:border-[#0B453C] hover:bg-[#b2f0e6]">
      <h3 class="font-semibold">18-24</h3>
    </div>
  </label>

    <label class="cursor-pointer">
    <input type="radio" name="age" value="25-34" class="sr-only peer" />
    <div class="border rounded-lg p-3 w-18 text-center
                transition-all duration-300
                peer-checked:border-blue-500 peer-checked:bg-blue-50
                 hover:border-[#0B453C] hover:bg-[#b2f0e6]">
      <h3 class="font-semibold">25-34</h3>
    </div>
  </label>
    <label class="cursor-pointer">
    <input type="radio" name="age" value="35-44" class="sr-only peer" />
    <div class="border rounded-lg p-3 w-18 text-center
                transition-all duration-300
                peer-checked:border-blue-500 peer-checked:bg-blue-50
                 hover:border-[#0B453C] hover:bg-[#b2f0e6]">
      <h3 class="font-semibold">35-44</h3>
    </div>
  </label>

  <label class="cursor-pointer">
    <input type="radio" name="age" value="45+" class="sr-only peer" />
    <div class="border rounded-lg p-3 w-18 text-center
                transition-all duration-300
                peer-checked:border-blue-500 peer-checked:bg-blue-50
                 hover:border-[#0B453C] hover:bg-[#b2f0e6]">
      <h3 class="font-semibold">45+</h3>
    </div>
  </label>
   </div>  
   </div>
   
    <div class="flex-1 flex flex-col justify-center items-center bg-white shadow-md rounded-xl py-5 gap-3"> 
      <h3 class="text-xl">3. Age </h3>
 <div class="flex-1 flex gap-3">
<button type="button" id="goDeal"  class="bg-[#0B453C]  text-white px-10 lg:px-16 py-3 rounded-full font-semibold text-sm hover:scale-105 transition-transform self-start" disabled>
                Get Dealsss
            </button>
 </div>
     </div>

</div> 


    </section>

 <section class="bg-white max-w-7xl mx-auto py-12 px-4 sm:px-6 text-center">
<h2 class="text-4xl font-bold pb-12"> Top Offers </h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 px-2 pb-10">
  @foreach($feature as $coupon)      
<article class="bg-white border border-gray-100 rounded-2xl flex-shrink-0 w-full  mx-2 shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
      <div class="relative p-4">
  <img src="{{ $coupon['image'] }}" alt="{{ $coupon->store['name'] }}" loading="lazy" class=" rounded-3xl h-40 object-cover" />
 <a href="{{region_route('store.website', ['slug' => $coupon->store['slug'] ]) }}"> <img src="{{ $coupon->store['logo'] }}" alt="{{ $coupon->store['name'] }}" loading="lazy"
  class="w-14 h-14  rounded-full absolute bottom-0 left-3 border-2 border-[#0B453C] shadow-md"
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
    data-title="{{ $coupon->title }}"
    data-terms="{{ $coupon->trems }}"
    onclick="openCouponLink('{{ $coupon->store['link']}}')"
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
        font-normal text-base  after:skew-x-[25deg] hover:after:right-[45px] hover:after:shadow-[5px_0_5px_0_rgba(0,0,0,0.25)]
      "
    > 
      Reveal Code
    </button>
    @else
 <button onclick="openCouponLink('{{ $coupon->store->link }}')"
  data-code=""
    data-title="{{ $coupon->title }}"
    data-terms="{{ $coupon->trems }}" 
                    class="inline-block bg-[#0B453C] text-white px-4 py-2 rounded-full transition delay-150 duration-300 ease-in-out hover:bg-[#3c6a63]">
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
</section>

 <section class="bg-white py-10 text-[#0F0F0F]">
 <div class="flex max-w-7xl lg:flex-row flex-col mx-auto px-4 sm:px-6 justify-between  gap-6">
 <div class="flex flex-col justify-between rounded-lg  gap-6">
 <h3 class="text-2xl font-bold">Recommended Stores</h3>
  <!-- LEFT TABS -->
  <div class="flex items-center sm:flex-row flex-col gap-6">
 <div class="w-64 space-y-3 ">
    @foreach($categories as $index => $category)
      <button
        onclick="openTab({{ $index }})"
        class="ring tab-btn w-full flex justify-between items-center px-4 py-4 rounded-lg bg-[#F2FCFA] font-semibold
        {{ $index === 0 ? 'ring-2 ring-[#0B453C]' : 'ring ring-[#0B453C]' }}">
        {{ $category->name }}
      </button>
    @endforeach
  </div>

  <div class="flex-1 bg-[#F2FCFA] rounded-xl py-2 px-7 ring ring-[#b1bdba]">
    @foreach($categories as $index => $category)
      <ul id="tab-{{ $index }}"
          class="tab-content grid grid-cols-2 gap-x-10 space-y-1 text-sm 
          {{ $index === 0 ? '' : 'hidden' }}">
        @foreach($category->stores as $store)
          <li class="hover:underline cursor-pointer text-nowrap">
          <a href="">   {{ $store->name }} </a>
          </li>
        @endforeach
         <li class="hover:underline cursor-pointer">
            
          </li>
         <li class="hover:underline cursor-pointer">
            View All
          </li>
      </ul>
    @endforeach
  </div>
  </div>
</div>
 <div class="flex  gap-6">
 <div class="bg-[#F2FCFA] shadow-sm p-6 flex items-center justify-center rounded-xl w-full  overflow-hidden">
  <div class="max-w-2xl w-full text-center space-y-6">
    
    <!-- Icon -->
    <div class="relative flex justify-center">
      <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center">
       <svg xmlns="http://www.w3.org/2000/svg" width="96.372" height="96.307" viewBox="0 0 96.372 96.307"><g transform="translate(-1486.746 -663.03)"><path d="M1490.69,798.457l61.613-21.086,5.529,7.767-31.925,31.6Z" transform="translate(-3.201 -92.807)" fill="#ffed16"/><path d="M1689,802.376l-2.692-3.784-34.02,32.888,4.774,2.48Z" transform="translate(-134.367 -110.031)" fill="#feda0d"/><path d="M1673.136,809.511,1715,768.633l-2.37,13.823-19.945,60.23-2.26.812Z" transform="translate(-151.286 -85.715)" fill="#f90"/><path d="M1774.184,826.861l-1.031-.763-20.127,59.631,2.244,4.412,2.26-.812,19.945-60.23Z" transform="translate(-216.13 -132.357)" fill="#f77c00"/><circle cx="15.479" cy="15.479" r="15.479" transform="translate(1550.441 664.752)" fill="#fc646f"/><circle cx="14.712" cy="14.712" r="14.712" transform="translate(1548.399 666.835)" fill="#fd8087"/><g transform="translate(1486.746 663.03)"><g transform="translate(0 0)"><path d="M1539.884,759.329a2.991,2.991,0,0,1-1.252-.4,4.875,4.875,0,0,1-1.9-2.241q-7.517-15.526-15.089-31.026a2.437,2.437,0,0,0-1.207-1.212q-15.557-7.559-31.105-15.136a4.392,4.392,0,0,1-2.476-2.54,2.523,2.523,0,0,1,.05-1.591,4.6,4.6,0,0,1,3.154-2.492q28.3-9.384,56.587-18.834c1.658-.553,1.414-.116,1.233-1.908a17.543,17.543,0,0,1,15.075-18.779c9.745-1.129,18.066,4.9,19.874,14.388a17.658,17.658,0,0,1-15.777,20.62,15.98,15.98,0,0,1-3.417-.036,1.147,1.147,0,0,0-1.239.785q-3.53,10.728-7.122,21.435-5.957,17.88-11.895,35.766a4.747,4.747,0,0,1-2.093,2.875,2.483,2.483,0,0,1-1.015.33A2.358,2.358,0,0,1,1539.884,759.329Zm-49.753-53.247c.408.215.673.363.945.5q15.434,7.527,30.877,15.037a5.121,5.121,0,0,1,2.512,2.514q6.187,12.8,12.44,25.568c1,2.048,2,4.092,3.014,6.151a1.469,1.469,0,0,0,.393-.8q9.51-28.514,19.03-57.024c.2-.594.125-.82-.5-1.077a17.251,17.251,0,0,1-9.656-9.6c-.311-.745-.591-.776-1.282-.545q-26.418,8.831-52.852,17.618C1493.46,704.955,1491.867,705.5,1490.13,706.081Zm75.352-39.887a14.445,14.445,0,1,0,14.41,14.421A14.475,14.475,0,0,0,1565.482,666.194Z" transform="translate(-1486.746 -663.03)"/><path d="M1519.337,998.945c-.024-1.27-.676-1.943-1.715-1.894-.981.046-1.531.742-1.51,1.982a13,13,0,0,1-1.207,5.831c-1.906,4.06-4.9,6.734-9.5,7.334-.671.088-.777-.066-.506-.674a17.668,17.668,0,0,0,1.088-3.486c1.591-7.391-3.063-13.279-10.273-12.8-3.626.239-6.531,1.849-8,5.43-.147.358-.156.763-.333,1.109l-.141,2.031a17.687,17.687,0,0,0,1.175,3.072,19.28,19.28,0,0,0,7.762,6.692,13.483,13.483,0,0,0,2.538,1.025c.529.15.739.3.324.855a41.527,41.527,0,0,1-8.875,9.053,1.605,1.605,0,0,0-.328,2.3h0a1.608,1.608,0,0,0,2.208.3,43.134,43.134,0,0,0,10.453-11.078,1.174,1.174,0,0,1,1.167-.547C1513.875,1015.669,1519.482,1006.519,1519.337,998.945Zm-17.935,12.6c-.181.374-.394.394-.747.3a16.867,16.867,0,0,1-8.908-5.781c-2.516-3.147-.908-5.979,2.027-7.146,4.71-1.873,9.35,1.23,9.358,6.529A16.345,16.345,0,0,1,1501.4,1011.544Z" transform="translate(-1487.154 -932.647)"/><path d="M1714.063,887.459a1.6,1.6,0,0,1,1.461,2.3,3.474,3.474,0,0,1-.645.795q-4.769,4.786-9.55,9.56a4,4,0,0,1-.56.5,1.586,1.586,0,0,1-2.193-2.238,4.479,4.479,0,0,1,.5-.553q4.776-4.779,9.553-9.557A2.143,2.143,0,0,1,1714.063,887.459Z" transform="translate(-1661.669 -845.191)"/><path d="M1782.081,842.246a1.49,1.49,0,0,1-1.485-.921,1.555,1.555,0,0,1,.343-1.814c.984-1,1.982-1.992,2.975-2.986.86-.861,1.711-1.734,2.587-2.579a1.611,1.611,0,1,1,2.249,2.274c-1.8,1.823-3.617,3.624-5.425,5.436A1.667,1.667,0,0,1,1782.081,842.246Z" transform="translate(-1725.13 -801.268)"/><path d="M1884,702.442a8.819,8.819,0,0,1-2.993.806,1.557,1.557,0,0,1-1.777-1.4,1.516,1.516,0,0,1,1.435-1.752,4.386,4.386,0,0,0,3.568-2.406,1.456,1.456,0,0,1,1.753-.764,1.519,1.519,0,0,1,1.214,1.579q0,9.579-.006,19.157a1.567,1.567,0,0,1-1.558,1.652,1.624,1.624,0,0,1-1.628-1.793c-.016-3.787-.007-7.575-.007-11.363Z" transform="translate(-1805.306 -690.488)"/></g></g></g><script xmlns=""/></svg>
      </div>
    </div>

    <!-- Heading -->
    <h2 class="text-2xl font-bold text-gray-900">
      Get Exclusive Deals Discounts & Daily Benefits
    </h2>

    <!-- Description -->
    <p class="text-gray-600 text-sm">
      Codendiscount brings you the best savings on high-end designer brands by providing you with a wide range of verified discount deals, coupon code offers, and vouchers. Enjoy category-rich deals, effortless browsing, and trusted discounts designed to give you real value with every purchase you make.
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
      By signing up I agree to Codendiscount's
      <a href="#" class="text-[#0B453C] underline">Privacy Policy</a>
      and consent to receive emails about offers.
    </p>

  </div>
</div>
</div>
</div>
 </section>
@endsection
@push('scripts')
<script>
function openTab(index) {
  document.querySelectorAll('.tab-content')
    .forEach(tab => tab.classList.add('hidden'));

  document.querySelectorAll('.tab-btn')
    .forEach(btn => btn.classList.remove('ring-2','ring-[#0B453C]'));

  document.getElementById(`tab-${index}`).classList.remove('hidden');
  document.querySelectorAll('.tab-btn')[index]
    .classList.add('ring-2','ring-[#0B453C]');
}



</script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const button = document.getElementById('goDeal');

    function toggleButton() {
        const genderSelected = document.querySelector('input[name="gender"]:checked');
        const ageSelected = document.querySelector('input[name="age"]:checked');

        if (genderSelected && ageSelected) {
            button.disabled = false;
            button.classList.remove('opacity-50', 'cursor-not-allowed');
        } else {
            button.disabled = true;
            button.classList.add('opacity-50', 'cursor-not-allowed');
        }
    }

    // Watch radio changes
    document.querySelectorAll('input[name="gender"], input[name="age"]').forEach(radio => {
        radio.addEventListener('change', toggleButton);
    });

    // Redirect on click
    button.addEventListener('click', () => {
        const gender = document.querySelector('input[name="gender"]:checked')?.value;
        const age = document.querySelector('input[name="age"]:checked')?.value;

        if (!gender || !age) return;

  let url = window.voucherRouteTemplate
            .replace('__GENDER__', gender)
            .replace('__AGE__', age);

        window.location.href = url;

        //window.location.href = `/voucher-codes/${gender}/${age}`;
    });

});


</script>
<script>
    window.voucherRouteTemplate = @json(
        route('inspiring', ['gender' => '__GENDER__', 'age' => '__AGE__'])
    );
</script>
@endpush
