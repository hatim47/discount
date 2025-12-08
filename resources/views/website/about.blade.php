@extends('website.layouts.app')

@push('styles')
<style>

.tab-item.active .icos{
   background-color:transparent;   
     color:#0B453C;
}
</style>
@endpush

@section('content')
    <section class="bg-[#F2FCFA] text-[#0F0F0F]">
        <div class="max-w-7xl mx-auto pt-24 pb-18 px-4 sm:px-6 flex flex-row items-center  justify-center gap-6">
            <div class="flex flex-col items-center gap-2 ms-3">
                    <h1 class="text-lg sm:text-5xl font-semibold text-gray-900">About Us</h1>
                    <p class="text-lg"> Deals / <span class="text-[#0B453C] font-semibold"> About us </span> </p>
            </div>
        </div>
    </section>

 <section class="bg-white text-[#0F0F0F]">
    <div class="max-w-7xl mx-auto py-28 px-4 sm:px-6 md:gap-13 lg:gap-16 flex flex-row items-center md:items-start justify-center">
    
    <div class="flex-1 md:flex hidden">
    <img src="{{asset('public/assets/images/all_image 1.png')}}" />
    </div>
    
      <div class="flex-1 flex flex-col  gap-4 items-center text-center">
         <div class="border w-fit lg:text-lg border-[#0B453C] py-1 px-5 rounded-full ">
      <p>Our Story, Your Savings </p>
      </div>
      <h2 class="text-2xl lg:text-5xl pb-8  text-[#0B453C] font-bold ">Built to bring you the best offers, Shop more.</h2>
        
         <div class="flex-1 flex md:hidden ">
    <img src="{{asset('public/assets/images/all_image 1.png')}}" />
    </div>
        
        <div class="flex pt-5 sm:pt-0 items-center gap-2 pb-8">
 <div class="flex md:gap-2 lg:gap-3">
 <div class="flex  md:w-3/12 lg:w-full">
<img class="w-10/12" src="{{asset('public/assets/images/icon.svg1.svg')}}" />
        </div>
 <div class="flex flex-col">
 <h5 class="md:text-xl lg:text-4xl text-[#0B453C] font-bold">654.5K</h5>
<p class="text-[#0B453C]">Total Coupons</p>
        </div>

        </div>
<div class="w-px h-14 mx-2 lg:mx-10 bg-[#0B453C]"> </div>
 <div class="flex md:gap-2 lg:gap-3">
 <div class="flex md:w-3/12 lg:w-full">
<img class="w-10/12" src="{{asset('public/assets/images/Group.svg')}}" />
        </div>
 <div class="flex flex-col">
 <h5 class="md:text-xl lg:text-4xl text-[#0B453C] font-bold">458.5K</h5>
<p class="text-[#0B453C]">Total Coupons</p>
        </div>

        </div>


        </div>
   <div class="flex flex-col gap-6 items-center md:items-start">
 <div class="flex items-center gap-4">
<iconify-icon class="text-[#0B453C]" icon="charm:circle-tick"width="20" height="20"></iconify-icon>
<p class="text-[#0B453C]">Verified Deals Daily</p>

     </div>

     <div class="flex items-center gap-4">
<iconify-icon class="text-[#0B453C]" icon="charm:circle-tick" width="20" height="20"></iconify-icon>
<p class="text-[#0B453C]">Fast Cashback System</p>

     </div>


     <div class="flex items-center gap-4">
<iconify-icon class="text-[#0B453C]" icon="charm:circle-tick" width="20" height="20"></iconify-icon>
<p class="text-[#0B453C]">User-Friendly Experience</p>
     </div>
     
     </div>


      </div>
    
    </div>
  </section>

 <section class="bg-white  text-[#0F0F0F]">
  <div class="max-w-7xl bg-[#F2FCFA] mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-16 ">

  <!-- LEFT: TABS -->
  <div class="space-y-6">
    <h2 class="md:text-3xl lg:text-5xl font-bold text-[#0B453C]">How to get cashback?</h2>

    <div class="space-y-4">

      <!-- Tab item -->
      <button data-tab="1" class="tab-item flex items-center gap-4 px-0 py-4 cursor-pointer ">
        <div class="icos w-28 md:w-37 lg:w-19 h-12 text-white rounded-full border border-[#0B453C] bg-[#0B453C] flex items-center justify-center active:bg-[#0B453C] font-semibold">
          1
        </div>
        <div class="text-left">
          <p class="md:text-xl lg:text-2xl text-[#0B453C] font-semibold">Register on Our Site</p>
          <p class="md:text-base/5 lg:text-lg/5 text-gray-900">Join now to unlock exclusive coupons, earn cashback, and start saving instantly — it’s free and only takes a minute!</p>
        </div>
      </button>

      <button data-tab="2" class="tab-item flex items-center gap-4 px-0 py-4 cursor-pointer ">
        <div class="icos w-26 md:w-36 lg:w-17 h-12 text-white rounded-full border border-[#0B453C] bg-[#0B453C] flex items-center justify-center font-semibold">
          2
        </div>
        <div class="text-left">
          <p class="md:text-xl lg:text-2xl text-[#0B453C] font-semibold">Choose Offer and Buy It</p>
          <p class="md:text-base/5 lg:text-lg/5 text-gray-900">You’ll receive cashback points in your account once your purchase is verified and approved by our team.</p>
        </div>
      </button>

      <button data-tab="3" class="tab-item flex items-center gap-4 px-0 py-4 cursor-pointer">
        <div class="icos w-27 md:w-35 lg:w-18 h-12 text-white rounded-full border border-[#0B453C] bg-[#0B453C] flex items-center justify-center font-semibold">
          3
        </div>
        <div class="text-left">
          <p class="md:text-xl lg:text-2xl text-[#0B453C] font-semibold">Request Money</p>
          <p class="md:text-base/5 lg:text-lg/5 text-gray-900">Go to your profile section, find the “Request” button, and click on it to submit your cashback or service request.</p>
        </div>
      </button>

    </div>

  </div>

  <!-- RIGHT: IMAGE -->
  <div class="relative w-full flex justify-center md:justify-end">
    <img id="tab-image" 
      src="{{asset('public/assets/images/Group 169.png')}}"
      class="w-10/12 lg:w-full h-auto   transition-all duration-300 opacity-100"
      alt=""
    />
  </div>

</div>



  </section>

 <section class="bg-white text-[#0F0F0F]">
  <div class="max-w-7xl mx-auto pt-22 px-4 sm:px-6 flex flex-col items-center text-center justify-center">
  <h4 class="text-2xl lg:text-5xl pb-8 text-[#0B453C] font-bold ">How It`s Works</h4>
<p>It is a long established fact that a reader will be distracted by the readable content of a <br> page when looking at its layout.</p>
  </div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-3 gap-18 items-center py-16">

<div class="flex flex-col items-center text-center gap-4">
<img class="w-2/12" src="{{asset('public/assets/images/Group.png')}}" />
     <div class="text-2xl lg:text-6xl text-[#0B453C] flex items-center justify-center font-extrabold">
          01
        </div>
 <p class="text-xl l-pt-2 lg:text-4xl text-[#0B453C] ">Create an Account</p>
           <p class="text-base/5 lg:text-lg/5 text-gray-900 text-center">It is a long established fact that a reader will be distracted by the readable content of a  page when looking at its layout.</p>

</div>


<div class="flex flex-col items-center text-center gap-5 pt-3">
<img class="w-2/12" src="{{asset('public/assets/images/icon.svg - 2025-1.png')}}" />
     <div class=" text-2xl lg:text-6xl text-[#0B453C] flex items-center justify-center font-extrabold">
          02
        </div>
 <p class="text-xl -pt-2 lg:text-4xl text-[#0B453C] ">Refer and Share</p>
           <p class="text-base/5 lg:text-lg/5 text-gray-900 text-center">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>

</div>



<div class="flex flex-col items-center text-center gap-5 pt-3">
<img class="w-2/12" src="{{asset('public/assets/images/icon.svg - 20251.png')}}" />
     <div class="text-2xl lg:text-6xl text-[#0B453C] flex items-center justify-center font-extrabold">
          03
        </div>
 <p class=" text-xl -pt-2 lg:text-4xl text-[#0B453C] ">Get Earning</p>
           <p class="text-base/5 lg:text-lg/5 text-gray-900 text-center">It is a long established fact that a reader will be distracted by the readable content of a  page when looking at its layout.</p>

</div>


</div>
 </section>


<section class="bg-white text-[#0F0F0F]">
  <div class="max-w-7xl bg-[#F2FCFA] mx-auto pt-22 px-4 sm:px-6 flex flex-col items-center text-center justify-center">
  <h4 class="text-2xl lg:text-5xl pb-8 text-[#0B453C] font-bold ">Our Promising Deals & Vouchers</h4>
<p>It is a long established fact that a reader will be distracted by the readable content of a <br> page when looking at its layout.</p>
  </div>
  <div class="max-w-7xl bg-[#F2FCFA] mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-3 gap-11  items-center py-16">

<div class="flex flex-col items-center text-center gap-1 px-2 py-15 bg-[#0B453C] rounded-[30px]">

     <div class="text-2xl lg:text-4xl text-white flex items-center justify-center font-extrabold">
        6.33K
        </div>
 <p class="text-xl l-pt-2 lg:text-2xl text-white ">Offers used this week</p>

</div>
<div class="flex flex-col items-center text-center gap-1 px-2 py-15 bg-[#0B453C] rounded-[30px]">

     <div class="text-2xl lg:text-4xl text-white flex items-center justify-center font-extrabold">
        18
        </div>
 <p class="text-xl l-pt-2 lg:text-2xl text-white ">Offers used this week</p>

</div>
<div class="flex flex-col items-center text-center gap-1 px-2 py-15 bg-[#0B453C] rounded-[30px]">

     <div class="text-2xl lg:text-4xl text-white flex items-center justify-center font-extrabold">
       £57m
        </div>
 <p class="text-xl l-pt-2 lg:text-2xl text-white ">Offers used this week</p>

</div>






</div>
 </section>

@endsection
@push('scripts')
<script>
const images = {
    1: "{{ asset('public/assets/images/Group 169.png') }}",
    2: "{{ asset('public/assets/images/Group 160.png') }}",
    3: "{{ asset('public/assets/images/Group 169.png') }}",
  };

  const imgEl = document.getElementById("tab-image");

  document.querySelectorAll(".tab-item").forEach(btn => {
    btn.addEventListener("click", () => {
      const id = btn.dataset.tab;

      imgEl.classList.add("opacity-0");

      setTimeout(() => {
        imgEl.src = images[id];
        imgEl.classList.remove("opacity-0");
        imgEl.classList.add("opacity-100");
      }, 200);
    });
  });

document.querySelectorAll(".tab-item").forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelectorAll(".tab-item").forEach(b => b.classList.remove("active"));
    btn.classList.add("active");
  });
});
</script>
@endpush
