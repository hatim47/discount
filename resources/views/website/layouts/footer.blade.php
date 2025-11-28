{{-- resources/views/components/footer.blade.php --}}
@php
    $footerData = [
        'SAVING' => [
            ['label' => 'Get Inspired', 'link' => '/get-inspired'],
            ['label' => 'Student Offers', 'link' => '/student-offers'],
            ['label' => 'App', 'link' => '/app'],
            ['label' => 'Deal Seeker', 'link' => '/deal-seeker'],
        ],
        'HELP' => [
            ['label' => 'All Events', 'link' => region_route('event.all')],
            ['label' => 'Black Friday Offers', 'link' => '/black-friday'],
            ['label' => 'Cyber Monday Offers', 'link' => '/cyber-monday'],
            ['label' => 'Christmas Deals', 'link' => '/christmas'],
        ],
        'ABOUT' => [
            ['label' => 'About us', 'link' => '/about'],
            ['label' => 'Advertise With Us', 'link' => '/advertise'],
            ['label' => 'Privacy Policy', 'link' => '/privacy-policy'],
            ['label' => 'Site map', 'link' => '/sitemap'],
            ['label' => 'Contact us', 'link' => '/contact'],
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

<footer class="bg-gray-50 border-t mt-10">
    <div class="max-w-6xl mx-auto px-6 py-10 grid grid-cols-2 md:grid-cols-5 gap-8">
        {{-- Dynamic Sections --}}
        @foreach($footerData as $section => $items)
            <div>
                <h3 class="text-[#0B453C] font-semibold mb-3">
                    {{ str_replace('_', ' ', $section) }}
                </h3>
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
    <div class="flex justify-center space-x-6 py-4">
        <a href="https://facebook.com" class="hover:opacity-70">
            <iconify-icon icon="entypo-social:facebook-with-circle" width="28" height="28"></iconify-icon>
        </a>
        <a href="https://instagram.com" class="hover:opacity-70">
            <iconify-icon icon="entypo-social:instagram-with-circle" width="28" height="28"></iconify-icon>
        </a>
        <a href="https://linkedin.com" class="hover:opacity-70">
            <iconify-icon icon="entypo-social:linkedin-with-circle" width="28" height="28"></iconify-icon>
        </a>
        <a href="https://youtube.com" class="hover:opacity-70">
            <iconify-icon icon="entypo-social:youtube-with-circle" width="28" height="28"></iconify-icon>
        </a>
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
