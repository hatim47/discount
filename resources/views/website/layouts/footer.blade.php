{{-- resources/views/components/footer.blade.php --}}
@php
    $footerData = [
        'SAVING' => [
            ['label' => 'Get Inspired', 'link' => '/get-inspired'],
            ['label' => 'Student Offers', 'link' => '/student-offers'],
            ['label' => 'Deal Seeker', 'link' => '/deal-seeker'],
        ],
        'HELP' => [
            ['label' => 'All Events', 'link' => region_route('event.all')],
            ['label' => 'Black Friday Offers', 'link' => '/black-friday'],
            ['label' => 'Cyber Monday Offers', 'link' => '/cyber-monday'],
            ['label' => 'Christmas Deals', 'link' => '/christmas'],
        ],
        'ABOUT' => [
            ['label' => 'About us', 'link' => region_route('aboutus')],
            ['label' => 'Advertise With Us', 'link' => region_route('advertise')],
            ['label' => 'Privacy Policy', 'link' => '/privacy-policy'],
            ['label' => 'Contact us', 'link' => route('contact')],
        ],
        'MOBILE_APP' => [
            ['name' => 'App Store', 'img' => '/apple-store.png', 'link' => 'https://apple.com'],
            ['name' => 'Google Play', 'img' => '/google-play.png', 'link' => 'https://play.google.com'],
        ],
        'BROWSER_EXTENSION' => [
            ['name' => 'Chrome Web Store', 'img' => '/chrome-store.png', 'link' => 'https://chromewebstore.google.com'],
        ],
    ];
@endphp

<footer class="bg-[#F2FCFA] pt-10">
    <div class="max-w-6xl mx-auto px-6 py-10 grid grid-cols-2 md:grid-cols-5 gap-8">
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
        Copyright Topvoucherscode.co.uk. All rights reserved.
    </p>
     </div>
</footer>
