@extends('website.layouts.app')

@section('title', 'Welcome to ' . config('website.company.name'))
@section('meta_description', 'Best marketing platform to grow your business.')

@section('content')
    <section class="text-center py-20 bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl md:text-6xl font-bold">Grow Your Business Faster 🚀</h1>
        <p class="mt-4 text-lg">All-in-one marketing solutions tailored for your brand.</p>
        <a href="#pricing" class="mt-6 inline-block px-6 py-3 bg-white text-white font-semibold rounded-lg shadow hover:bg-gray-200">
            Get Started
        </a>
         </div>
    </section>
@endsection
