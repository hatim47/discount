{{-- resources/views/components/header.blade.php --}}
<header class="bg-[#FAF9F5] border-b-2 border-[#1EC27E] sticky top-0 z-10 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        {{-- Logo/Brand Name --}}
        <a href="{{ url('/') }}" class="text-3xl font-extrabold text-primary-700 hover:text-primary-600 transition">
            FindsCoupon
        </a>

        {{-- Navigation Links --}}
        <nav class="hidden md:flex space-x-6">
         <div class="container mx-auto px-4 "> <!-- IMPORTANT: relative -->
    <div class="flex items-center justify-between py-3">
      <div class="flex items-center space-x-6">
        <!-- Categories wrapper -->
        <div class=" group">
          <a href="{{ url('/categories') }}" class="text-gray-600 hover:text-primary-600 transition">
            Categories
          </a>

          <!-- Dropdown: width equals the container because parent (.container) is relative -->
          <div class="absolute left-0 hidden group-hover:block z-30 bg-white border-b-2 border-b-[#1EC27E]  shadow-lg mt-2 p-4 w-full">
            <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-2 max-w-4xl mx-auto">
              @foreach($categories as $category)
                <li>
                  <a href="{{ route('categ.page', $category->slug) }}"
                     class="block px-3 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-md text-sm">
                    {{ $category->name }}
                  </a>
                      <div class="flex flex-wrap gap-4 mb-6">
        @foreach ($category->stores->where('ismenu', 1)->take(3) as $store)
            @if ($store->ismenu === 1)
                <div class="flex flex-col items-center justify-center ">
               
                   <a href="{{ route('store.website', $store->slug) }}"
                     class="block  text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-md text-sm">
                    {{ $store->name }}
                  </a>
                </div>
            @endif
        @endforeach
    </div>
                </li>
              @endforeach
            </ul>
          </div>
        </div>

 <a href="{{ url('/featured') }}" class="text-gray-600 hover:text-primary-600 transition">Featured Deals</a>
<a href="{{ url('/about') }}" class="text-gray-600 hover:text-primary-600 transition">About Us</a>

      </div>
    </div>
  </div>
           
        </nav>

        {{-- Action Button --}}
        <a href="{{ url('/login') }}" class="bg-primary-600 text-black px-4 py-2 rounded-lg hover:bg-primary-700 transition duration-200 shadow-md">
            Login / Sign Up
        </a>
    </div>
</header>
