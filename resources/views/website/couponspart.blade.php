<article class="w-full flex justify-between bg-white shadow-[0_0_5px_3px_rgba(0,0,0,0.07)] rounded-xl p-3 sm:p-6  hover:shadow-lg transition-shadow duration-300">


<div class="flex  items-center gap-3 sm:gap-6">
<div class="flex flex-col items-center border-2 rounded-md 
            {{ $coupon->deals == 0 ? 'border-yellow-300' : 'border-sky-300' }}"> 
  <img src="{{ $coupon->store['logo'] }}" 
       alt="{{ $coupon->store['name'] }}" 
       loading="lazy" 
       class="w-20 h-20 rounded-md shadow-md" />

  @if($coupon->deals == 0)
    <span class="text-[#0f0f0f] bg-yellow-300 uppercase w-full text-center text-xs sm:text-sm">
      Code
    </span>
  @else
    <span class="text-[#0f0f0f] bg-sky-300 uppercase w-full text-center text-xs sm:text-sm">
      Deal
    </span>
  @endif

</div>
  <div class="flex flex-col  items-start gap-3 sm:gap-6">

   @if($coupon->verified)
        <span class="text-[#0f0f0f] bg-yellow-300 uppercase px-1  text-xs rounded-2xl">Verified</span>
        @else
         <span class="text-[#0f0f0f] bg-yellow-300 uppercase px-1  text-xs rounded-2xl"></span>
    @endif
     <div class="flex flex-col justify-between items-start gap-3">
  <h2 class="text-[#0f0f0f] text-lg sm:text-xl">{{ $coupon['title'] }}</h2>
 <p class="text-xs sm:text-sm text-[#0f0f0f]">View Terms</p>

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
      class="
        relative z-10 overflow-hidden 
       hidden md:inline-flex items-center justify-center 
        w-full px-6 py-2 rounded-lg font-light text-white 
        bg-[#1EC27E] shadow-md 
        before:content-[attr(data-code)] before:tracking-widest before:inline-flex 
        before:absolute before:top-0 before:right-0 before:h-full before:w-16 
        before:items-center before:justify-end before:pr-3
        before:border-2 before:border-dashed before:border-l-0 before:border-[#1EC27E]
        before:rounded-r-lg before:bg-[#F2F0E6] before:text-[#0F0F0F] before:uppercase before:text-sm 
         before:-z-1 after:content-[''] after:absolute after:top-0 after:right-[34px] after:h-[calc(100%+2px)] after:w-full
        after:bg-[#1EC27E] after: after:transition-all after:duration-200 after:ease-in-out  after:-z-1
        font-normal text-base  after:skew-x-[25deg] hover:after:right-[45px] hover:after:shadow-[5px_0_5px_0_rgba(0,0,0,0.25)]
      "
    > 
      Reveal Code
      <!-- Mobile Arrow -->
    
    </button>
    <button 
      aria-label="Reveal Code" 
      class="md:hidden w-10 h-10 flex items-center justify-end 
             rounded-full  text-[#1EC27E] text-xl "
    >
     <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 256 512"><path fill="currentColor" d="M247.1 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L179.2 256L41.9 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg>
    </button>
    @else
 <button onclick="copyCode('{{ $coupon->code }}')" 
                    class="w-48 hidden md:inline-block  bg-[#1EC27E] text-white px-4 py-2 rounded hover:bg-[#1EC27E]">
                Get Deal
            </button>  
            <button 
      aria-label="Reveal Code" 
      class="md:hidden w-10 h-10 flex items-center justify-end 
             rounded-full  text-[#1EC27E] text-xl "
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
    </article>