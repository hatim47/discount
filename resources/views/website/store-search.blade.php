{{-- 
<div  class=" w-full  mx-auto z-90">
  
    <div 
        x-show="searchpopup"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click.self="searchpopup = false"
        class="fixed  bg-white bg-opacity-50 z-50 w-full flex items-start justify-center "
        style="display: none;"
    >
        <div 
            @click.away="searchpopup = false"
            class="bg-white rounded-2xl shadow-2xl max-w-4xl  h-full  "
        >
       
            <div class="p-6 border-b border-gray-200">
                <div class="relative">
                    <input
                        type="text"
                        x-model="searchQuery"
                        placeholder="Search"
                        class="h-12 w-full px-6 pr-16 rounded-full border-2 border-[#0B453C] bg-white focus:outline-none focus:ring-2 focus:ring-[#0B453C] focus:ring-opacity-50 text-gray-700"
                        x-ref="searchInput"
                    />
                    <button 
                        @click="searchpopup = false"
                        class="absolute right-2 top-2 text-gray-400 hover:text-gray-600"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

          
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8 overflow-y-auto ">
    }
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">TRENDING OFFERS</h2>
                    <div class="space-y-4">
                        @php
                            $trendingOffers = [
                                ['brand' => 'RED CANDY', 'logo' => '🍬', 'offer' => '5% Off Sitewide', 'type' => 'Code'],
                                ['brand' => 'OCEAN LIGHTING', 'logo' => '💡', 'offer' => '12% Off Enzo Lighting', 'type' => 'Code'],
                                ['brand' => 'BRANTANO', 'logo' => '👟', 'offer' => '10% Off Sitewide', 'type' => 'Code'],
                                ['brand' => 'KNOWSLEY SAFARI PARK', 'logo' => '🦁', 'offer' => 'Up To 50% Off Online Booking', 'type' => 'Deal'],
                                ['brand' => 'LOVEIT COVERIT', 'logo' => '🛡️', 'offer' => 'Up To 50% Off On Personal Property Insurance', 'type' => 'Deal'],
                            ];
                        @endphp

                        @foreach($trendingOffers as $offer)
                            <div class="flex items-start gap-4 p-4 hover:bg-gray-50 rounded-lg transition-colors cursor-pointer border border-gray-100">
                                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center text-3xl flex-shrink-0">
                                    {{ $offer['logo'] }}
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-[#0B453C] font-bold text-sm mb-1">{{ $offer['brand'] }}</h3>
                                    <p class="text-gray-800 font-semibold text-base mb-2">{{ $offer['offer'] }}</p>
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-medium {{ $offer['type'] === 'Code' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                        {{ $offer['type'] }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

         
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">BRANDS</h2>
                    <div class="space-y-3">
                        @php
                            $brands = [
                                ['name' => 'Red Candy', 'offers' => 7],
                                ['name' => 'Ocean Lighting', 'offers' => 7],
                                ['name' => 'Brantano', 'offers' => 8],
                                ['name' => 'Knowsley Safari Park', 'offers' => 7],
                                ['name' => 'Loveit Coverit', 'offers' => 7],
                            ];
                        @endphp

                        @foreach($brands as $brand)
                            <div class="flex justify-between items-center p-4 hover:bg-gray-50 rounded-lg transition-colors cursor-pointer border border-gray-100">
                                <h3 class="text-[#0B453C] font-semibold text-lg">{{ $brand['name'] }}</h3>
                                <span class="text-gray-600 text-sm">View {{ $brand['offers'] }} offers</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {

    });
</script>
@endpush --}}
{{-- Store Search Component - Laravel Blade --}}

@php
    // Get the current region from session (fallback to default)
    $currentRegion = session('region', config('app.default_region', 'usa'));
   $routePattern = route('store.website', ['slug' => '__SLUG__']);
@endphp


    
    {{-- Search Button --}}
       {{-- <button @click="openSearch()" class="px-4 py-2 bg-[#0B453C] text-white rounded-lg">Search Stores</button> --}}


    {{-- Popup Modal --}}
    <div
        x-show="searchpopup"
        x-transition
        @click.self="closeSearch()"
        class="fixed inset-0 bg-white/50 bg-opacity-50 z-50 flex items-start justify-center overflow-auto"
        style="display: none;"
    >
        <div @click.away="closeSearch()" class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full p-6">
            
            {{-- Search Input --}}
            <div class="mb-6">
                <div class="relative">
                    <input type="text" x-model="searchQuery" @input.debounce.300ms="searchStores" placeholder="Search stores..." class="h-12 w-11/12 px-6 pr-16 rounded-full border-2 border-[#0B453C]" x-ref="searchInput" />
                    <button @click="closeSearch()" class="absolute right-2 top-2 text-gray-400 hover:text-gray-600"><iconify-icon icon="system-uicons:cross" width="21" height="21"></iconify-icon></button>
                </div>
            </div>

            {{-- Region Buttons --}}
            <div class="mb-6 flex flex-wrap gap-3">
                <template x-for="region in regions" :key="region.slug">
                    <button @click="filterRegion(region.slug)"
                        :class="{'bg-[#0B453C] text-white': selectedRegion === region.slug, 'bg-gray-100 text-gray-700': selectedRegion !== region.slug}"
                        class="px-4 py-2 rounded-full text-sm font-medium"
                        x-text="region.name">
                    </button>
                </template>
            </div>

            {{-- Popup content (Trending Offers + Brands) --}}
            <div x-show="!searchQuery.length" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- TRENDING OFFERS --}}
                <div>
                    <h2 class="text-2xl font-bold mb-6">TRENDING OFFERS</h2>
                    <template x-for="offer in offers" :key="offer.id">
                        <a :href="`{{ $routePattern }}`.replace('__SLUG__', offer.store.slug)" class="flex items-start gap-4 p-4 hover:bg-gray-50 rounded-lg border border-gray-100">
                           <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
    <img :src="offer.store.logo" alt="" class="w-full h-full object-cover">
</div>
                            <div class="flex-1">
                                <h3 class="text-[#0B453C] font-bold text-sm mb-1" x-text="offer.brand"></h3>
                                <p class="text-gray-800 font-semibold text-base mb-2" x-text="offer.title"></p>

                            </div>
                        </a>
                    </template>
                </div>

                {{-- BRANDS --}}
                <div>
                    <h2 class="text-2xl font-bold mb-6">BRANDS</h2>
                    <template x-for="brand in brands" :key="brand.id">
                        <a :href="`{{ $routePattern }}`.replace('__SLUG__', brand.slug)" class="flex justify-between items-center p-4 hover:bg-gray-50 rounded-lg border border-gray-100">
                            <h3 class="text-[#0B453C] font-semibold text-lg" x-text="brand.name"></h3>
                            <span class="text-gray-600 text-sm" x-text="'View ' + brand.coupons_count + ' offers'"></span>
                        </a>
                    </template>
                </div>
            </div>

            {{-- Search Results --}}
            <div x-show="searchQuery.length" class="space-y-4">
                <template x-for="store in searchResults" :key="store.id">
                  <a :href="`{{ $routePattern }}`.replace('__SLUG__', store.slug)" class="flex items-center gap-4 p-4 border rounded hover:bg-gray-50 cursor-pointer">
    <!-- Logo Thumbnail -->
    <div class="w-16 h-16 bg-gray-100 rounded-lg flex-shrink-0 overflow-hidden">
        <img :src="store.logo" alt="" class="w-full h-full object-cover" />
    </div>

    <!-- Store Info -->
    <div>
        <h3 class="font-bold text-lg" x-text="store.name"></h3>
        <p class="text-gray-700 text-sm" x-text="store.description"></p>
    </div>
</a>
                </template>
                <div x-show="searchQuery.length && !searchResults.length" class="text-gray-500">
                    No stores found.
                </div>
            </div>

        </div>
    </div>


@push('scripts')
<script>
function storeSearch(currentRegion = null, defaultRegion = 'usa', regions = []) {
    return {
        searchpopup: false,
        searchQuery: '',
        selectedRegion: currentRegion,
        defaultRegion: defaultRegion,
        offers: [],
        brands: [],
        regions: regions,
        searchResults: [],

        openSearch() {
            this.searchpopup = true;
            this.$nextTick(() => this.$refs.searchInput.focus());
            this.loadPopupData(); // ⚡ Load trending offers & brands
        },

        closeSearch() {
            this.searchpopup = false;
            this.searchQuery = '';
            this.searchResults = [];
        },

        filterRegion(regionSlug) {
            this.selectedRegion = regionSlug;
            this.loadPopupData();
            if(this.searchQuery.length) this.searchStores(); // refresh search if typing
        },

        // 🔹 Fetch data for popup (Trending Offers + Brands)
        loadPopupData() {
            let url = '/discount/popupsearch';
            if (this.selectedRegion && this.selectedRegion !== this.defaultRegion) {
                url = '/discount/' + this.selectedRegion + '/popupsearch';
            }
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    this.offers = data.offers || [];
                    this.brands = data.brands || [];
                });
                console.log(this.offers);
        },

        // 🔹 Fetch stores when user types
        searchStores() {
            if(!this.searchQuery.length) return; // skip if empty
            let url = '/discount/search?query=' + encodeURIComponent(this.searchQuery);
            if (this.selectedRegion && this.selectedRegion !== this.defaultRegion) {
                url = '/discount/' + this.selectedRegion + '/search?query=' + encodeURIComponent(this.searchQuery);
            }
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    this.searchResults = data.stores || [];
                });
        }
    }
}


</script>
@endpush
