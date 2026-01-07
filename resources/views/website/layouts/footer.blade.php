{{-- resources/views/components/footer.blade.php --}}
@php
    $footerData = [
    ' ' => [
        [
            'img' => $setting->web_logo,
            'name' => $setting->web_name,
            'link' => region_route('home'),
            'text' => 'Disclosure: If you buy a product or service after clicking one of our links, we may be paid a commission.'
        ]
    ],

       
        'HELP' => [
            ['label' => 'All Events', 'link' => region_route('event.all')],
            ['label' => 'Black Friday Offers', 'link' =>  region_route('event', ['slug' => 'black-friday' ])],
            ['label' => 'Cyber Monday Offers', 'link' =>  region_route('event', ['slug' => 'cyber-monday' ])],
            ['label' => 'Christmas Deals', 'link' =>  region_route('event', ['slug' => 'christmas-deals' ])],
        ],
        'ABOUT' => [
            ['label' => 'About us', 'link' => region_route('aboutus')],
            ['label' => 'Search Store', 'link' => region_route('store.menusa')],
            ['label' => 'Our Blogs', 'link' => '/blogs'],
        ],
             'INFORMATION' => [
            ['label' => 'Advertise With Us', 'link' => region_route('advertise')],
          //  ['label' => 'Privacy Policy', 'link' => '/privacy-policy'], 
            ['label' => 'Contact us', 'link' => route('contact')],
        ],
        
        
      
    ];
@endphp

<footer class="bg-[#F2FCFA] pt-10">
    <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-2 md:grid-cols-4 gap-8">
        {{-- Dynamic Sections --}}
        @foreach($footerData as $section => $items)
            <div>
                <h4 class="text-[#0B453C] font-semibold mb-3">
                    {{ str_replace('_', ' ', $section) }}
                </h4>
                <ul class="space-y-2 text-gray-700">
                    @foreach($items as $item)
                        @if(isset($item['label']))
                            <li>
                                <a href="{{ $item['link'] }}" class="hover:underline cursor-pointer">
                                    {{ $item['label'] }}
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $item['link'] }}">
                                    <img src="{{ $item['img'] }}" alt="{{ $item['name'] }}" class="w-36">
                                </a>

                            </li>
                            <li>
                            <p> {{ $item['text'] }}</p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

    {{-- Social Icons --}}
 @php
    // Decode if stored as JSON string
    $socials = is_string($setting->socails) ? json_decode($setting->socails, true) : $setting->socails;
    
    // Define social media platforms with Entypo circle icons
    $socialPlatforms = [
        'facebook' => ['icon' => 'entypo-social:facebook-with-circle'],
        'instagram' => ['icon' => 'entypo-social:instagram-with-circle'],
        'lnikedin' => ['icon' => 'entypo-social:linkedin-with-circle'],
        'youtube' => ['icon' => 'entypo-social:youtube-with-circle'],
        'twitter' => ['icon' => 'entypo-social:twitter-with-circle'],
        'pinterest' => ['icon' => 'entypo-social:pinterest-with-circle'],
        'snapchat' => ['icon' => 'entypo-social:qq-with-circle'],
        'tiktok' => ['icon' => 'mage:tiktok-circle'], // Entypo doesn't have TikTok, using alternative
    ];
@endphp

<div class="flex  justify-center items-center space-x-6">
    @foreach ($socialPlatforms as $platform => $details)
        @if (!empty($socials[$platform]))
            <a href="{{ $socials[$platform] }}" 
               target="_blank" 
               rel="noopener noreferrer"
               class="hover:opacity-70 transition-opacity"
               title="{{ ucfirst($platform) }}">
                <iconify-icon icon="{{ $details['icon'] }}"
                 width="{{ $platform === 'tiktok' ? '32' : '28' }}" 
                    height="{{ $platform === 'tiktok' ? '32' : '28' }}"
                 ></iconify-icon>
            </a>
        @endif
    @endforeach
</div>

    {{-- Disclaimer --}}
    {{-- <p class="text-center text-gray-500 text-sm px-4">
        Disclosure: If you buy a product or service after clicking one of our links, we may be paid a commission
    </p> --}}

    {{-- Logo --}}
    {{-- <div class="flex justify-center py-6">
        <h1 class="text-2xl font-bold">TopVouchersCode</h1>
    </div> --}}
<div class="flex justify-center py-6  border-t-1 border-t-black/10 ">
    <p class="text-center text-gray-400 text-xs ">
        Copyright codendiscount.com. All rights reserved.
    </p>
     </div>
</footer>
