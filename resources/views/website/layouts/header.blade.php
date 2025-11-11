{{-- resources/views/components/header.blade.php --}}
<header class="bg-[#FAF9F5] border-b-2 border-[#1EC27E] top-0 z-20 relative" x-data="{ showLogin:false, showSignup:false, showPassword:false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center z-2">
        {{-- Logo/Brand Name --}}
        <a href="{{ url('/') }}" class="text-3xl font-extrabold text-primary-700 hover:text-primary-600 transition">
            FindsCoupon
        </a>
<!-- NAVBAR -->
<nav class="hidden md:flex space-x-6">
  <div class="container mx-auto px-4">
    <div class="flex items-center justify-between py-3">
      <div class="flex items-center space-x-6">
 <div x-data="megaMenu()" x-init="init()" class="relative">
  <!-- Trigger -->
  <a href="{{ url('/categories') }}"
     @mouseenter="openWithCancel()"
     @mouseleave="startCloseTimer()"
     class="text-gray-600 hover:text-[#1EC27E] transition font-semibold">
    Categories
  </a>

  <!-- FULLSCREEN MODAL OVERLAY -->
  <!-- Important: overlay is fixed and listens for mouseenter/mouseleave -->
  <div
    x-show="open"
    x-transition.opacity.duration.200ms
    @mouseenter="clearCloseTimer()"
    @mouseleave="startCloseTimer()"
    class="fixed inset-0 z-[9999] bg-black/20 flex items-start justify-center pointer-events-auto"
    x-cloak
  >
    <!-- Panel -->
    <div
      class="bg-white w-full max-w-6xl mt-24 rounded-lg border-t-4 border-[#1EC27E] shadow-2xl p-6 overflow-y-auto"
      @mouseenter="clearCloseTimer()"
      @mouseleave="startCloseTimer()"
      role="region"
      aria-label="Categories"
    >
      <!-- Content: your grid -->
      <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
        @foreach($categoryies->where('ismenu', 1)->take(9) as $category)
          <li>
            <a href="{{ route('categ.page', $category->slug) }}"
               class="block text-gray-900 hover:text-[#1EC27E] font-bold rounded-md text-sm mb-2">
              {{ $category->name }}
            </a>

            <div class="flex flex-col space-y-1">
              @foreach ($category->stores->where('ismenu', 1)->take(3) as $store)
                @if ($store->ismenu === 1)
                  <a href="{{ route('store.website', $store->slug) }}"
                     class="block text-gray-700 hover:text-[#1EC27E] rounded-md text-sm">
                    {{ $store->name }}
                  </a>
                @endif
              @endforeach

              <a href="{{ route('categ.page', $category->slug) }}"
                 class="flex items-center text-gray-700 hover:text-[#1EC27E] text-sm mt-1">
                <span>More Brands</span>
                <span class="bg-[#1EC27E] text-white rounded-full p-1 ml-1">
                  <iconify-icon icon="lucide:chevron-right"></iconify-icon>
                </span>
              </a>
            </div>
          </li>
        @endforeach

        <!-- EXTRA COLUMN -->
        <li>
          <a href="{{ route('categ.page','Entertainment') }}"
             class="block text-gray-900 font-bold hover:text-[#1EC27E] text-sm mb-2">
            More Categories
          </a>
          <div class="flex flex-col space-y-1">
            <a href="{{ route('store.website','Entertainment') }}" class="text-gray-700 hover:text-[#1EC27E] text-sm">Entertainment</a>
            <a href="{{ route('store.website','Electronics') }}" class="text-gray-700 hover:text-[#1EC27E] text-sm">Electronics</a>
            <a href="{{ route('store.website','Services') }}" class="text-gray-700 hover:text-[#1EC27E] text-sm">Services</a>
            <a href="{{ route('categ.page','Entertainment') }}"
               class="flex items-center text-gray-700 hover:text-[#1EC27E] text-sm mt-1">
              <span>More Brands</span>
              <span class="bg-[#1EC27E] text-white rounded-full p-1 ml-1">
                <iconify-icon icon="lucide:chevron-right"></iconify-icon>
              </span>
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

        <!-- OTHER NAV LINKS -->
        <a href="{{ url('/featured') }}" class="text-gray-600 hover:text-[#1EC27E] transition font-semibold">
          Featured Deals
        </a>
        <a href="{{ url('/about') }}" class="text-gray-600 hover:text-[#1EC27E] transition font-semibold">
          About Us
        </a>

      </div>
    </div>
  </div>
</nav>


        {{-- Action Button --}}
      <a href="javascript:void(0)"
           @click="showLogin = true"
           class="bg-primary-600 text-black px-4 py-2 rounded-lg hover:bg-primary-700 transition duration-200 shadow-md">
            Login / Sign Up
        </a>


 <div x-show="showLogin"
       x-transition.opacity
      x-data="{ email: '', password: '', showPassword: false, error: '' }"
       class="fixed inset-0 bg-[#f2f0e6] flex items-center justify-center z-[10000]"
       x-cloak>

    <div x-show="showLogin"
         x-transition
         class="relative  p-8 w-full max-w-lg">

      <!-- Close -->
      <button @click="showLogin = false"
              class="absolute top-4 right-4 text-red-500 hover:text-red-600 text-xl font-bold">
          ✕
      </button>

      <h2 class="text-2xl font-semibold text-center text-gray-800 mb-2">Log In</h2>
      <p class="text-center text-gray-600 text-sm mb-4">
        Don’t have an account?
        <a href="javascript:void(0)" 
           @click="showLogin=false; showSignup=true"
           class="text-red-500 font-medium hover:underline">Sign Up.</a>
      </p>

      <!-- Google -->
      <button class="w-full border border-gray-300 rounded-full py-2 flex items-center justify-center gap-2 hover:bg-gray-50 transition mb-5">
        <img src="https://www.gstatic.com/images/branding/product/1x/gsa_512dp.png" class="w-5 h-5">
        <span class="text-gray-700 font-medium">Continue with Google</span>
      </button>

      <div class="flex items-center my-4">
        <hr class="flex-grow border-gray-300">
        <span class="text-gray-400 px-2 text-sm">OR</span>
        <hr class="flex-grow border-gray-300">
      </div>

   <form @submit.prevent="
    error = '';
    axios.post('{{ route('login') }}', {
        email: email,
        password: password,
        _token: '{{ csrf_token() }}'
    })
    .then(response => {
        if(response.data.success) {
            window.location.href = response.data.redirect; // redirect after login
        }
    })
    .catch(err => {
        error = err.response.data.message || 'Invalid credentials';
    });
">
    
    <template x-if="error">
      <div class="mb-3 text-sm text-red-600" x-text="error"></div>
    </template>

    <input x-model="email" type="text" placeholder="Email Address / Username"
           class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-3 focus:ring-2 focus:ring-[#1EC27E] focus:outline-none">

    <div class="relative mb-4">
      <input x-model="password" :type="showPassword ? 'text' : 'password'" placeholder="Password"
             class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-10 focus:ring-2 focus:ring-[#1EC27E] focus:outline-none">
      <button type="button" @click="showPassword = !showPassword"
              class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
            <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/> </svg> <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 013.348-4.568m3.063-1.62A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-1.249 2.312M15 12a3 3 0 11-6 0 3 3 0 016 0z"/> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/> </svg>

      </button>
    </div>

    <button type="submit" class="w-full bg-[#1EC27E] text-white py-2 rounded-lg font-semibold hover:bg-[#17A46B] transition">
      Sign In
    </button>
</form>

      <p class="text-center text-gray-500 text-sm mt-3 cursor-pointer hover:text-gray-700">Forgot Password?</p>

      <p class="text-center text-xs text-gray-500 mt-4">
        By continuing, I agree to FindsCoupon’s<br>
        <a href="#" class="text-[#1EC27E] hover:underline">Terms & Conditions</a> and 
        <a href="#" class="text-[#1EC27E] hover:underline">Privacy Policy</a>.
      </p>
    </div>
  </div>

  <!-- ========== SIGNUP MODAL ========== -->
<div x-show="showSignup"
     x-transition.opacity
     class="fixed inset-0 bg-[#f2f0e6] flex items-center justify-center z-[10000]"
     x-cloak>
    
    <div x-show="showSignup"
         x-transition
         class="relative p-8 w-full max-w-4xl"
         x-data="{ first_name: '', last_name: '', email: '', username: '', password: '',password_confirmation: '', dob: '', gender: '',showPassword: false, error: '', successMessage: '' }">

        <!-- Close -->
        <button @click="showSignup = false"
                class="absolute top-4 right-4 text-red-500 hover:text-red-600 text-xl font-bold">✕</button>

        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-2">Sign Up</h2>
        <p class="text-center text-gray-600 text-sm mb-4">
            Already have an account?
            <a href="javascript:void(0)" @click="showSignup=false; showLogin=true" class="text-red-500 font-medium hover:underline">Log In.</a>
        </p>

       <form @submit.prevent="
    error = '';
    successMessage = '';
    axios.post('{{ route('register') }}', {
        name: first_name,
        lname: last_name,
        email: email,
        username: username,
        password: password,
        password_confirmation: password_confirmation,
        dob: dob,
        gender: gender,
        _token: '{{ csrf_token() }}'
    })
    .then(res => {
        if(res.data.success){
            successMessage = res.data.message || 'Registration successful! You can now log in.';
        }
    })
    .catch(err => {
        if(err.response.data.errors){
            error = Object.values(err.response.data.errors).flat().join(', ');
        } else {
            error = err.response.data.message || 'Registration failed';
        }
    });
">    <template x-if="successMessage">
        <div class="mb-3 text-sm text-green-600 flex items-center">
            <p x-text="successMessage"></p>
            <button @click="showSignup=false; showLogin=true" 
                    class="mt-2  inline-block bg-[#1EC27E] text-white px-4 py-1 rounded hover:bg-[#1EC27E] transition">
                Login Now
            </button>
        </div>
    </template>

            <template x-if="error">
                <div class="mb-3 text-sm text-red-600" x-text="error"></div>
            </template>

            <div class="grid grid-cols-2 gap-3 mb-3">
                <input x-model="first_name" type="text" placeholder="First Name" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#1EC27E] focus:outline-none">
                <input x-model="last_name" type="text" placeholder="Last Name" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#1EC27E] focus:outline-none">
             <input x-model="email" type="email" placeholder="Email Address" class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-3 focus:ring-2 focus:ring-[#1EC27E] focus:outline-none">
            <input x-model="username" type="text" placeholder="Username" class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-3 focus:ring-2 focus:ring-[#1EC27E] focus:outline-none">

           
          
           <div class="relative mb-4" x-data="{ showPassword: false }">
    <input x-model="password" :type="showPassword ? 'text' : 'password'" placeholder="Password"
           class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-10 focus:ring-2 focus:ring-[#1EC27E] focus:outline-none">

    <button type="button" @click="showPassword = !showPassword"
            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
       <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/> </svg> <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 013.348-4.568m3.063-1.62A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-1.249 2.312M15 12a3 3 0 11-6 0 3 3 0 016 0z"/> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/> </svg>
    </button>
</div>
           
       
<div class="relative mb-4">
    <input x-model="password_confirmation" :type="showPassword ? 'text' : 'password'" placeholder="Confirm Password"
           class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-10 focus:ring-2 focus:ring-[#1EC27E] focus:outline-none">

    <button type="button" @click="showPassword = !showPassword"
            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
      <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/> </svg> <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 013.348-4.568m3.063-1.62A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-1.249 2.312M15 12a3 3 0 11-6 0 3 3 0 016 0z"/> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/> </svg>
    </button>
</div>    


           <div class="mb-3">
                <label class="block text-gray-700 mb-1">Date of Birth</label>
                <input x-model="dob" type="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#1EC27E] focus:outline-none">
            </div>

            <div class="mb-4">
    <label class="block text-gray-700 mb-2 font-medium">Gender</label>
    <div class="flex gap-4">
        <label class="flex items-center cursor-pointer">
            <input type="radio" x-model="gender" value="male" class="sr-only peer">
            <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-[#1EC27E] peer-checked:bg-[#1EC27E] transition-all"></div>
            <span class="ml-2 text-gray-700">Male</span>
        </label>
        <label class="flex items-center cursor-pointer">
            <input type="radio" x-model="gender" value="female" class="sr-only peer">
            <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-[#1EC27E] peer-checked:bg-[#1EC27E] transition-all"></div>
            <span class="ml-2 text-gray-700">Female</span>
        </label>
        <label class="flex items-center cursor-pointer">
            <input type="radio" x-model="gender" value="other" class="sr-only peer">
            <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-[#1EC27E] peer-checked:bg-[#1EC27E] transition-all"></div>
            <span class="ml-2 text-gray-700">Other</span>
        </label>
    </div>
</div>
            </div>

          



            <button type="submit" class="w-full bg-[#1EC27E] text-white py-2 rounded-lg font-semibold hover:bg-[#17A46B] transition">
                Create Account
            </button>
        </form>
    </div>
</div>



























        
    </div>
</header>

