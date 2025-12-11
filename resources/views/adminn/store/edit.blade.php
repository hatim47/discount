@extends('adminn.layout.layout')
@php
    $title = 'Basic Table';
    $subTitle = 'Basic Table';
    $script = '<script>
        let table = new DataTable("#dataTable");
    </script>
 <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script src="'.asset('vendor/laravel-filemanager/js/stand-alone-button.js').'"></script>
                <script>
                    var route_prefix = "'. url('/laravel-filemanager') .'";
                    $("#lfm").filemanager("image", {
                        prefix: route_prefix
                    });
                    $("#lfms").filemanager("image", {
                        prefix: route_prefix
                    });
                </script>';
@endphp

@section('content')
    <form action="{{ route('store.update', $store->id) }}" id="editStoreForm" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        <div class="row gy-3">
            {{-- <h1>{{ old('id', $store->id) }} </h1> --}}

            <div class="col-sm-2">
                <div class="mb-3">
                    <label class="form-label">Store Name </label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $store->name) }}">
                </div>
            </div>
            <div class="col-sm-3">
                <label class="form-label">Category Name*</label>
                <div class="position-relative">

                    <select name="category_id" class="form-control radius-8 form-select " id="depart">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $store->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-error"></div>
                </div>
            </div>

            <div class="col-sm-2">
                <label class="form-label">Logo</label>
                <div class="mb-3 d-flex">
                    <div class="input-group">
                        <input id="logo" class="form-control" type="hidden" name="logo"
                            value="{{ old('logo', $store->logo) }}">
                        <span class="input-group-btn">
                            <button type="button" id="lfm" data-input="logo" data-preview="holder"
                                class="btn btn-primary">
                                Choose
                            </button>
                        </span>
                    </div>
                    <div id="logo-holder " style="max-height:100px;">
                        @if ($store->logo)
                            <img src="{{ $store->logo }}" class="border border-4" width="80" class="mt-2">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <label class="form-label">Cover Image *</label>
                <div class="position-relative">
                    <div class="mb-3">

                        <div class="input-group">
                            <input id="image" class="form-control" type="hidden" name="image"
                                value="{{ old('image', $store->image) }}">
                            <span class="input-group-btn">
                                <button type="button" id="lfms" data-input="image" data-preview="holder"
                                    class="btn btn-primary">
                                    Choose
                                </button>
                            </span>
                        </div>
                        @if ($store->image)
                            <img src="{{ $store->image }}" id="holder" class="border border-4" width="80"
                                class="mt-2">
                        @endif
                    </div>
                    {{-- <input  class="form-control " type="file" placeholder="Enter Last Name" > --}}
                    <div class="form-error"></div>
                </div>
            </div>
        {{-- <hr class=" border-4 ">
         <hr class=" border-4 "> --}}
        </div>
           


        <div class="row gy-3">
            <h4 class="form-label ">Website Information</h4>
            
               {{-- <hr class=" border-4 ">
              <hr class=" border-4 "> --}}
            <div class="col-md-12  d-flex flex-column">
 <label class="form-label">Select one or more tags to highlight this coupon (e.g., Trending, Featured, Recommended, Deals, Verified, Exclusive).</label>

                                          <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    
                        <input type="checkbox" name="trend" class="btn-check" id="btncheck1" value="1" {{ old('trend', $store->trend) ? 'checked' : '' }}>                       
                        <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck1">Trending </label>
                       
                        <input type="checkbox" class="btn-check" name="feature" id="btncheck11" value="1" {{ old('feature', $store->feature) ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck11">Featured </label> 
                        
                        <input type="checkbox" class="btn-check" name="recom" id="btncheck12" value="1" {{ old('recom', $store->recom) ? 'checked' : '' }}>                        
                        <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck12">Recommended</label>

                          <input type="checkbox" class="btn-check" name="ismenu" id="btncheck134" value="1" {{ old('ismenu', $store->ismenu) ? 'checked' : '' }}>                        
                        <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck134">Is Menu</label>
                       
                
</div>
                    </div>
  <div class="col-12">
                <label class="form-label">Heading *</label>
                <div class="position-relative">
                    <div class="d-flex text-nowrap align-items-center">
                        <input type="text" class="form-control " name="heading"
                            value="{{ old('heading', $store->heading) }}" placeholder="Enter Category Name">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-dasharray="16" stroke-dashoffset="16"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M5 12h14">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.8s"
                                        values="16;0" />
                                </path>
                                <path d="M12 5v14">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.8s"
                                        values="16;0" />
                                </path>
                            </g>
                        </svg>
                        <h6>{{ \Carbon\Carbon::now()->format('F Y') }}</h6>
                    </div>
                    <div class="form-error"></div>
                </div>
            </div>

            <div class="col-12">
                <label class="form-label">Description Content*</label>
                <div class="position-relative">
                    <textarea id="editor2" name="description" class="form-control" rows="8">{{ old('description', $store->description) }}</textarea>

                    <div class="form-error"></div>
                </div>
            </div>

            <div class="col-md-4">
                <label class="form-check-label">
                    <input type="checkbox" name="relat_store" class="form-check-input"
                        onchange="toggleDropdown(this, 'dropdown1')" {{ $store->relat_store ? 'checked' : '' }}>
                    Related Stores
                </label>

                <div class="dropdown w-100" style="{{ $store->relat_store ? '' : 'display:none;' }}" id="dropdown1">
                    <!-- Button -->
                    <button class="btn btn-outline-primary w-100 d-flex justify-content-between align-items-center"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown1-btn">

                        <span id="dropdown1-label">Select Stores</span>
                        <span class="badge bg-secondary ms-2" id="dropdown1-count">0</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <ul class="dropdown-menu p-3 w-100" aria-labelledby="dropdown1-btn">

                        <!-- Search -->
                        <input type="text" id="store-search" class="form-control mb-2"
                            placeholder="Search stores...">

                        <!-- Select All toggle -->
                        <button type="button" id="select-all-toggle" class="btn btn-sm btn-link mb-2">
                            Select All / Deselect All
                        </button>

                        <!-- Store list -->
                        <ul id="store-list" class="list-unstyled ms-13  mb-0"
                            style="max-height: 200px; overflow-y: auto;">

                            <!-- more li with checkboxes... -->
                        </ul>

                    </ul>
                </div>
            </div>
            <!-- Second Column -->
            <div class="col-md-4">
                <label class="form-check-label">
                    <input type="checkbox" name="relat_cate" class="form-check-input"
                        onchange="toggleDropdown(this, 'dropdown2')" {{ $store->relat_cate ? 'checked' : '' }}>
                    Related Categories
                </label>
                <div class="dropdown w-100 mt-3" id="dropdown2" style="{{ $store->relat_cate ? '' : 'display:none;' }}">
                    <!-- Button -->
                    <button class="btn btn-outline-primary w-100 d-flex justify-content-between align-items-center"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown2-btn">

                        <span id="dropdown2-label">Select Options</span>
                        <span class="badge bg-secondary ms-2" id="dropdown2-count">0</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <ul class="dropdown-menu p-3 w-100" aria-labelledby="dropdown2-btn">

                        <!-- Search -->
                        <input type="text" id="dropdown2-search" class="form-control mb-2"
                            placeholder="Search options...">

                        <!-- Toggle all -->
                        <button type="button" id="dropdown2-toggle" class="btn btn-sm btn-link mb-2">
                            Select All / Deselect All
                        </button>

                        <!-- Options list -->
                        <ul id="dropdown2-list" class="list-unstyled ms-13  mb-0"
                            style="max-height: 200px; overflow-y: auto;">
                            @foreach ($categories as $index => $category)
                                <li>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input multi-option" type="checkbox"
                                            id="opt{{ $index + 1 }}" name="relat_cate_options[]" value="{{ $category->id }}"
                                            {{ $store->categories->contains($category->id) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="opt{{ $index + 1 }}">{{ $category->name }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </ul>
                </div>





            </div>

            <!-- Third Column -->
            <div class="col-md-4">
                <label class="form-check-label">
                    <input type="checkbox" name="like_store" class="form-check-input"
                        onchange="toggleDropdown(this, 'dropdown3')" {{ $store->like_store ? 'checked' : '' }}>
                    shoppers also like
                </label>
                <div class="dropdown w-100 mt-3" id="dropdown3" style="{{ $store->like_store ? '' : 'display:none;' }}">
                    <!-- Button -->
                    <button class="btn btn-outline-primary w-100 d-flex justify-content-between align-items-center"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown3-btn">

                        <span id="dropdown3-label">Select Options</span>
                        <span class="badge bg-secondary ms-2" id="dropdown3-count">0</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <ul class="dropdown-menu p-3 w-100" aria-labelledby="dropdown3-btn">

                        <!-- Search -->
                        <input type="text" id="dropdown3-search" class="form-control mb-2"
                            placeholder="Search options...">

                        <!-- Toggle all -->
                        <button type="button" id="dropdown3-toggle" class="btn btn-sm btn-link mb-2">
                            Select All / Deselect All
                        </button>

                        <!-- Options list -->
                        <ul id="dropdown3-list" class="list-unstyled ms-13  mb-0"
                            style="max-height: 200px; overflow-y: auto;">
                            @foreach ($stores as $index => $storesa)
                                <li>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input multi-option" type="checkbox"
                                            id="opt{{ $index + 1 }}" name="like_store_options[]" value="{{ $storesa->id }}"
                                            {{ $store->likes->contains($storesa->id) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="opt{{ $index + 1 }}">{{ $storesa->name }}</label>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-check-label">
                    <input type="checkbox" name="trend_store" class="form-check-input"
                        onchange="toggleDropdown(this, 'dropdown4')"{{ $store->trend_store ? 'checked' : '' }}>
                    Trending Brands
                </label>
                <div class="dropdown w-100 mt-3" id="dropdown4"
                    style="{{ $store->trend_store ? '' : 'display:none;' }}">
                    <button class="btn btn-outline-primary w-100 d-flex justify-content-between align-items-center"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown4-btn">

                        <span id="dropdown4-label">Select Options</span>
                        <span class="badge bg-secondary ms-2" id="dropdown4-count">0</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <ul class="dropdown-menu p-3 w-100" aria-labelledby="dropdown4-btn">

                        <!-- Search -->
                        <input type="text" id="dropdown4-search" class="form-control mb-2"
                            placeholder="Search options...">

                        <!-- Toggle all -->
                        <button type="button" id="dropdown4-toggle" class="btn btn-sm btn-link mb-2">
                            Select All / Deselect All
                        </button>

                        <!-- Options list -->
                        <ul id="dropdown4-list" class="list-unstyled ms-13  mb-0"
                            style="max-height: 200px; overflow-y: auto;">
                            @foreach ($trends as $index => $trend)
                                <li>
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input multi-option" type="checkbox"
                                            id="opt{{ $index + 1 }}" name="trend_store_options[]" value="{{ $trend->id }}"
                                            {{ $store->trendingWith->contains($trend->id) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="opt{{ $index + 1 }}">{{ $trend->name }}</label>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </ul>
                </div>
            </div>
 <div class="col-md-12"></div>
  <div class="col-4">
                            <label class="form-label">Tiwtter</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="mingcute:social-x-fill" ><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="twitter" value="{{ old('twitter', json_decode($store->socails, true)['twitter'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

 <div class="col-4">
                            <label class="form-label">Youtube</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="typcn:social-youtube"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="youtube" value="{{ old('youtube', json_decode($setting->socails, true)['youtube'] ?? 'No URL') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Pinterest</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon  icon="ion:social-pinterest"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="pinterest" value="{{ old('pinterest', json_decode($store->socails, true)['pinterest'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Linkedin</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-linkedin"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="lnikedin" value="{{ old('linkedin', json_decode($store->socails, true)['linkedin'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Facebook</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-facebook"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="facebook" value="{{ old('facebook', json_decode($store->socails, true)['facebook'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>


                         <div class="col-4">
                            <label class="form-label">Instagram</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="typcn:social-instagram"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="instagram" value="{{ old('instagram', json_decode($store->socails, true)['instagram'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Tiktok</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="streamline-flex:tiktok-solid"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="tiktok" value="{{ old('tiktok', json_decode($store->socails, true)['tiktok'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>
                               
                              
                         <div class="col-4">
                            <label class="form-label">snapchat</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-snapchat"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="snapchat" value="{{ old('snapchat', json_decode($store->socails, true)['snapchat'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div> 

            <div class="col-md-12">
                <h4>Dynamic Sections below stores Coupons</h4>

                <div id="input-wrapper">
                    @foreach ($store->dynacontents as $dynacontent)
                        <div class="input-block mb-3 p-3 border rounded">
                            <input type="text" name="dy_heading[]" class="form-control mb-2" placeholder="Enter name"
                                value="{{ $dynacontent->heading }}">

                            <textarea id="editor{{ $loop->index }}" class="editor form-control" name="dy_description[]" rows="5">{{ $dynacontent->description }}</textarea>

                            <button type="button"
                                class="btn btn-danger btn-sm mt-2 d-flex align-items-center justify-content-center remove-block w-50-px h-50-px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m20.37 8.91l-1 1.73l-12.13-7l1-1.73l3.04 1.75l1.36-.37l4.33 2.5l.37 1.37zM6 19V7h5.07L18 11v8a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2" />
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="add-block" class="btn btn-primary mt-3 w-50-px h-50-px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                        <g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4">
                            <rect width="36" height="36" x="6" y="6" rx="3" />
                            <path stroke-linecap="round" d="M24 16v16m-8-8h16" />
                        </g>
                    </svg>
                </button>
            </div>


            <div class="row gy-3">
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $store->slug) }}">
                </div>
     <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="text" name="link" class="form-control" value="{{ old('link', $store->link) }}">
                </div>
  <div class="row gy-3">
                                    <div class="col-sm-6">
                                        <label class="form-label">(META) Title*</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control wizard-required"  value="{{ old('m_tiitle', $store->m_tiitle) }}" name="m_tiitle"
                                                 >
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">(META) Description*</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control wizard-required"  value="{{ old('m_descrip', $store->m_descrip) }}" name="m_descrip"
                                                 style="height: 60px; line-height: 20px; overflow-y: auto;" >
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                

                                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </div>
    </form>
@endsection
@push('scripts')
    <script>
        const allStores = @json($stores);
        document.addEventListener("DOMContentLoaded", function() {
            const categorySelect = document.getElementById("depart");
            const storeList = document.getElementById("store-list");
            const label = document.getElementById("dropdown1-label");
            const badge = document.getElementById("dropdown1-count");
            const searchInput = document.getElementById("store-search");
            const toggleBtn = document.getElementById("select-all-toggle");
            const selectedStores = @json($store->relatedStores->toArray());
            const storew = @json($store);
            console.log(selectedStores);
            //console.log(storew);

            function renderStores(categoryId) {
                storeList.innerHTML = "";

                const filtered = allStores.filter(s => s.category_id == categoryId);
console.log(filtered);

                if (filtered.length === 0) {
                    storeList.innerHTML = '<li class="text-muted small fst-italic">No stores found</li>';
                    updateCount();
                    return;
                }

                filtered.forEach(store => {
                  const isChecked = selectedStores.some(s => s.id === store.id);
                    console.log(isChecked);
                    storeList.insertAdjacentHTML("beforeend", `
                <li>
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input store-option" 
                               type="checkbox" 
                               id="store${store.id}" 
                               name="stores[]" 
                               value="${store.id}"
                                ${isChecked ? "checked" : ""}>
                        <label class="form-check-label" for="store${store.id}">
                            ${store.name}
                        </label>
                    </div>
                </li>
            `);
                });

                updateCount();
            }

            // ✅ Update count + label
            function updateCount() {
                const checked = storeList.querySelectorAll(".store-option:checked");
                const count = checked.length;
                badge.textContent = count;
                label.textContent = count === 0 ? "Select Stores" : `${count} selected`;
            }

            // 🔎 Live search
            if (searchInput) {
                searchInput.addEventListener("input", function() {
                    const filter = this.value.toLowerCase().trim();
                    storeList.querySelectorAll("li").forEach(li => {
                        const text = li.textContent.toLowerCase();
                        li.style.display = text.includes(filter) ? "" : "none";
                    });
                });
            }

            // 🟢 Checkbox change
            storeList.addEventListener("change", function(e) {
                if (e.target.classList.contains("store-option")) {
                    updateCount();
                }
            });

            // 🟢 Select All / Deselect All
            toggleBtn.addEventListener("click", function() {
                const checkboxes = storeList.querySelectorAll(".store-option");
                const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                checkboxes.forEach(cb => cb.checked = !allChecked);
                updateCount();
            });

            // 🟢 When category changes → re-render stores
            categorySelect.addEventListener("change", function() {
                const selectedCatId = this.value;
                if (selectedCatId) {
                    renderStores(selectedCatId);
                } else {
                    storeList.innerHTML =
                        '<li class="text-muted small fst-italic">Please select a category</li>';
                    updateCount();
                }
            });

            if (categorySelect.value) {
                renderStores(categorySelect.value);
            }
        });

        function initMultiSelect(config) {
            const list = document.getElementById(config.listId);
            const searchInput = document.getElementById(config.searchId);
            const label = document.getElementById(config.labelId);
            const badge = document.getElementById(config.countId);
            const toggleBtn = document.getElementById(config.toggleId);

            if (!list) return;

            function updateCount() {
                const checked = list.querySelectorAll(".multi-option:checked");
                const count = checked.length;
                badge.textContent = count;
                label.textContent = count === 0 ? config.placeholder : `${count} selected`;
            }

            if (searchInput) {
                searchInput.addEventListener("input", function() {
                    const filter = this.value.toLowerCase().trim();
                    list.querySelectorAll("li").forEach(li => {
                        const text = li.textContent.toLowerCase();
                        li.style.display = text.includes(filter) ? "" : "none";
                    });
                });
            }

            list.addEventListener("change", function(e) {
                if (e.target.classList.contains("multi-option")) {
                    updateCount();
                }
            });

            if (toggleBtn) {
                toggleBtn.addEventListener("click", function() {
                    const checkboxes = list.querySelectorAll(".multi-option");
                    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                    checkboxes.forEach(cb => cb.checked = !allChecked);
                    updateCount();
                });
            }

            // Init
            updateCount();
        }

        document.addEventListener("DOMContentLoaded", function() {
            initMultiSelect({
                listId: "dropdown2-list",
                searchId: "dropdown2-search",
                labelId: "dropdown2-label",
                countId: "dropdown2-count",
                toggleId: "dropdown2-toggle",
                placeholder: "Select Options"
            });

            initMultiSelect({
                listId: "dropdown3-list",
                searchId: "dropdown3-search",
                labelId: "dropdown3-label",
                countId: "dropdown3-count",
                toggleId: "dropdown3-toggle",
                placeholder: "Select Choices"
            });
            initMultiSelect({
                listId: "dropdown4-list",
                searchId: "dropdown4-search",
                labelId: "dropdown4-label",
                countId: "dropdown4-count",
                toggleId: "dropdown4-toggle",
                placeholder: "Select Choices"
            });
        });




        // Initialize CKEditor instances (call after HTML is injected)
        function initEditor(selector) {
            ClassicEditor
                .create(document.querySelector(selector), {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'link', '|',
                        'bulletedList', 'numberedList', '|',
                        'blockQuote', 'insertTable', '|',
                        'undo', 'redo'
                    ],
                    ckfinder: {
                        uploadUrl: "/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}"
                    }
                })
                .catch(error => console.error(error));
        }



        initEditor('#editor2');

        function toggleDropdown(checkbox, dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            dropdown.style.display = checkbox.checked ? 'block' : 'none';
        }

        function initAllEditors() {
            document.querySelectorAll('.editor').forEach(function(el) {
                if (!el.dataset.initialized) {
                    setTimeout(() => initEditor('#' + el.id), 100); // your editor init function
                    el.dataset.initialized = true; // mark as initialized
                }
            });
        }

        function generateId() {
            return 'editor-' + Math.random().toString(36).substr(2, 9);
        }

        document.getElementById('add-block').addEventListener('click', function() {
            const wrapper = document.getElementById('input-wrapper');

            const block = document.createElement('div');
            block.classList.add('input-block', 'mb-3', 'p-3', 'border', 'rounded');
            const editorId = generateId();

            block.innerHTML = `
        <input type="text" name="dy_heading[]" class="form-control mb-2" placeholder="Enter name">
        <textarea id="${editorId}" class="editor form-control" name="dy_description[]" rows="5"></textarea>
        <button type="button" class="btn btn-danger btn-sm mt-2 remove-block w-50-px h-50-px">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                 viewBox="0 0 24 24">
                <path fill="currentColor"
                      d="m20.37 8.91l-1 1.73l-12.13-7l1-1.73l3.04 1.75l1.36-.37l4.33 2.5l.37 1.37zM6 19V7h5.07L18 11v8a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2"/>
            </svg>
        </button>
    `;

            wrapper.appendChild(block);

            // Initialize editor for new textarea
            setTimeout(() => initEditor('#' + editorId), 100);
        });

        // Remove block
        document.addEventListener('click', function(e) {
            const btn = e.target.closest('.remove-block');
            if (btn) {
                e.preventDefault();
                btn.closest('.input-block').remove();
            }
        });

        // Initialize existing editors
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.editor').forEach((el) => {
                if (!el.id) el.id = generateId();
                setTimeout(() => initEditor('#' + el.id), 100);
            });
        });
    </script>
@endpush
