@extends('website.layouts.app')

@section('title', 'Welcome to ' . config('website.company.name'))
@section('meta_description', 'Best marketing platform to grow your business.')
@push('styles')


@endpush

@section('content')
<div class="min-h-screen bg-[#F2F0E6] flex ">
<div class=" flex flex-col lg:flex-row mx-auto max-w-7xl ">

  <!-- Sidebar -->
  <aside class=" w-full lg:w-64 p-6 border-r border-gray-200">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">User Portal</h2>
    <nav class="flex flex-col gap-3">
      <button class="text-white font-medium px-4 py-2 rounded-xl bg-[#1EC27E] text-left w-full">My Profile</button>
      <button class="text-gray-700 font-medium px-4 py-2 rounded-xl shadow-md bg-white  transition duration-300 ease-in-out hover:bg-[#1EC27E] hover:text-white text-left w-full">Favourite Brands</button>
      <button class="text-gray-700 font-medium px-4 py-2 rounded-xl shadow-md bg-white  transition duration-300 ease-in-out hover:bg-[#1EC27E] hover:text-white text-left w-full">Saved Offers</button>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6">
    <!-- Header / Identity -->
    <div class="flex items-center gap-4 mb-8">
      <div class="w-16 h-16 rounded-full bg-brown-500 text-white flex items-center justify-center text-2xl font-bold">H</div>
      <div>
        <h1 class="text-2xl font-semibold text-gray-800">Hey hatim noor</h1>
        <p class="text-gray-600">hatimnoon47@gmail.com</p>
        <p class="text-gray-500 text-sm">Joined September 30, 2025</p>
      </div>
    </div>

    <!-- Profile Form -->
    <form class="bg-white p-6 rounded-lg shadow-md max-w-3xl space-y-4">
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 mb-1 font-medium">First Name</label>
          <input type="text" value="hatim" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
        </div>
        <div>
          <label class="block text-gray-700 mb-1 font-medium">Last Name</label>
          <input type="text" value="noor" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
        </div>
      </div>

      <div>
        <label class="block text-gray-700 mb-1 font-medium">Email Address</label>
        <input type="email" value="hatimnoon47@gmail.com" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
      </div>

      <div class="flex justify-end mb-4">
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Change Password</button>
      </div>

      <!-- Date of Birth -->
      <div class="grid grid-cols-3 gap-4">
        <div>
          <label class="block text-gray-700 mb-1 font-medium">Day</label>
          <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <!-- Add up to 31 -->
          </select>
        </div>
        <div>
          <label class="block text-gray-700 mb-1 font-medium">Month</label>
          <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
            <option>January</option>
            <option>February</option>
            <option>March</option>
            <!-- All months -->
          </select>
        </div>
        <div>
          <label class="block text-gray-700 mb-1 font-medium">Year</label>
          <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
            <option>1990</option>
            <option>1991</option>
            <option>1992</option>
            <!-- Add as needed -->
          </select>
        </div>
      </div>

      <!-- Gender -->
      <div>
        <label class="block text-gray-700 mb-1 font-medium">Gender</label>
        <div class="flex gap-4">
          <label class="flex items-center cursor-pointer">
            <input type="radio" name="gender" class="sr-only peer" checked>
            <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-green-500 peer-checked:bg-green-500 transition-all"></div>
            <span class="ml-2 text-gray-700">Male</span>
          </label>
          <label class="flex items-center cursor-pointer">
            <input type="radio" name="gender" class="sr-only peer">
            <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-green-500 peer-checked:bg-green-500 transition-all"></div>
            <span class="ml-2 text-gray-700">Female</span>
          </label>
          <label class="flex items-center cursor-pointer">
            <input type="radio" name="gender" class="sr-only peer">
            <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-green-500 peer-checked:bg-green-500 transition-all"></div>
            <span class="ml-2 text-gray-700">Other</span>
          </label>
        </div>
      </div>

      <!-- Bio -->
      <div>
        <label class="block text-gray-700 mb-1 font-medium">Bio</label>
        <textarea rows="5" placeholder="Write something about yourself..." class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none"></textarea>
      </div>

      <!-- Save Changes -->
      <div class="flex justify-end">
        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">Save Changes</button>
      </div>

    </form>
  </main>
</div>
</div>
@endsection