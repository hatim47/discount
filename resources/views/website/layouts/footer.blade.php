{{-- resources/views/components/footer.blade.php --}}
@php
    $footerData = [
        'SAVING' => ['Get Inspired', 'Student Offers', 'App', 'Deal Seeker'],
        'HELP' => ['All Events', 'Black Friday Offers', 'Cyber Monday Offers', 'Christmas Deals'],
        'ABOUT' => ['About us', 'Advertise With Us', 'Privacy Policy', 'Site map', 'Contact us'],
        'MOBILE_APP' => [
            ['name' => 'App Store', 'img' => '/apple-store.png', 'link' => '#'],
            ['name' => 'Google Play', 'img' => '/google-play.png', 'link' => '#'],
        ],
        'BROWSER_EXTENSION' => [
            ['name' => 'Chrome Web Store', 'img' => '/chrome-store.png', 'link' => '#'],
        ],
    ];

    $socialLinks = [
        ['icon' => 'mdi:facebook', 'link' => '#'],
        ['icon' => 'mdi:twitter', 'link' => '#'],
        ['icon' => 'mdi:instagram', 'link' => '#'],
        ['icon' => 'mdi:pinterest', 'link' => '#'],
        ['icon' => 'mdi:youtube', 'link' => '#'],
        ['icon' => 'mdi:linkedin', 'link' => '#'],
    ];
@endphp

<footer class="bg-gray-50 border-t mt-10">
    <div class="max-w-6xl mx-auto px-6 py-10 grid grid-cols-2 md:grid-cols-5 gap-8">
        {{-- Dynamic Sections --}}
        @foreach($footerData as $section => $items)
            <div>
                <h3 class="text-green-600 font-semibold mb-3">
                    {{ str_replace('_', ' ', $section) }}
                </h3>
                <ul class="space-y-2 text-gray-700">
                    @foreach($items as $item)
                        @if(is_string($item))
                            <li class="hover:underline cursor-pointer">{{ $item }}</li>
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
    <div class="flex justify-center space-x-6 py-4">
        @foreach($socialLinks as $s)
            <a href="{{ $s['link'] }}" class="text-gray-600 hover:text-green-600 text-2xl">
                <i class="{{ $s['icon'] }}"></i> {{-- Replace with proper icon library for Blade --}}
            </a>
        @endforeach
    </div>

    {{-- Disclaimer --}}
    <p class="text-center text-gray-500 text-sm px-4">
        Disclosure: If you buy a product or service after clicking one of our links, we may be paid a commission
    </p>

    {{-- Logo --}}
    <div class="flex justify-center py-6">
        <h1 class="text-2xl font-bold">TopVouchersCode</h1>
    </div>

    <p class="text-center text-gray-400 text-xs pb-6">
        Copyright Topvoucherscode.co.uk. All rights reserved.
    </p>
</footer>
