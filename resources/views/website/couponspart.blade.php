<article
x-data="{ showTerms: false }"
 class="coupon-card w-full flex flex-col  bg-white shadow-[0_0_5px_3px_rgba(0,0,0,0.07)] rounded-3xl p-3 sm:p-6  hover:shadow-lg transition-shadow duration-300"
  data-type="{{ $coupon->deals == 0 ? 'voucher' : 'sale' }}">
<div class="flex justify-between">

<div class="flex  items-center gap-3 sm:gap-6">
<div class="flex flex-col items-center rounded-full 
            {{-- {{ $coupon->deals == 0 ? 'border-[#ededed]' : 'border-[#ededed]' }} --}}
            "> 
  <img src="{{ $coupon->store['logo'] }}" 
       alt="{{ $coupon->store['name'] }}" 
       loading="lazy" 
       class="w-20 h-20 rounded-full shadow-md" />

  @if($coupon->deals == 0)
    <span class="text-[#0f0f0f] pt-2 uppercase w-full text-center text-xs sm:text-sm">
      Code
    </span>
  @else
    <span class="text-[#0f0f0f] pt-2 uppercase w-full text-center text-xs sm:text-sm">
      Deal
    </span>
  @endif

</div>
  <div class="flex flex-col  items-start gap-3 sm:gap-6">
   @if($coupon->verified)
        <iconify-icon icon="bitcoin-icons:verify-filled" width="32" height="32" class="text-[#0B453C]"></iconify-icon>
        @else
         <span class="text-[#0f0f0f]  uppercase px-1  text-xs rounded-2xl"></span>
    @endif
     <div class="flex flex-col justify-between items-start gap-3">
  <h2 class="text-[#0f0f0f] text-lg sm:text-xl">{{ $coupon['title'] }}</h2>

    <!-- Toggle button -->
    <p @click="showTerms = !showTerms" class="text-xs sm:text-sm text-[#0f0f0f] cursor-pointer">
        View Terms
    </p>

</div>
</div>
</div>
 
<div class="flex flex-col w-16 sm:w-48 items-end sm:items-center justify-between">
<span class="text-[#0f0f0f] bg-yellow-300 uppercase px-1  text-xs rounded-2xl"></span>
 @if($coupon->deals == 0) 
                        <button
      aria-label="Reveal Code"
      data-code="{{$coupon['code']}}"
      data-text=" Reveal Code"
    data-code="{{ $coupon->code }}"
    data-title="{{ $coupon->title }}"
    data-terms="{{ $coupon->terms }}"
    onclick="openCouponLink('{{ $coupon->store->link }}')"

      class="
        relative z-10 overflow-hidden 
       hidden md:inline-flex items-center justify-center 
        w-full px-6 py-2 rounded-full font-light text-white 
        bg-[#0B453C] shadow-md 
        before:content-[attr(data-code)] before:tracking-widest before:inline-flex 
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
    <button 
      aria-label="Reveal Code" 
      class="md:hidden w-10 h-10 flex items-center justify-end 
             rounded-full  text-[#0B453C] text-xl "
    >
     <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 256 512"><path fill="currentColor" d="M247.1 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L179.2 256L41.9 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg>
    </button>
    @else
 <button onclick="openCouponLink('{{ $coupon->store->link  }}')"
  data-code=""
    data-title="{{ $coupon->title }}"
    data-terms="{{ $coupon->terms }}"  
                    class="w-48 hidden md:inline-block  bg-[#0B453C] text-white px-4 py-2 rounded-full hover:bg-[#0B453C]">
                Get Deal
            </button>  
            <button 
      aria-label="Reveal Code" 
      class="md:hidden w-10 h-10 flex items-center justify-end 
             rounded-full  text-[#0B453C] text-xl "
    >
     <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 256 512"><path fill="currentColor" d="M247.1 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L179.2 256L41.9 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg>
    </button>            @endif

              @php
    $views = $coupon->view;
    if ($views >= 1000000) {
        $views = round($views / 1000000, 1) . 'M';
    } elseif ($views >= 1000) {
        $views = round($views / 1000, 1) . 'k';
    }
@endphp
   <p class="text-xs text-[#0f0f0f]/80"> {{ $views }} Used </p>
        </div> 
        </div>
             <div x-show="showTerms" 
         x-transition
         class="mt-3 border-t border-gray-200 text-gray-700 text-sm ">
        <p>
           {!! $coupon['trems'] !!}
        </p>
    </div>  
    </article>