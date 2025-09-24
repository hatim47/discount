@extends('adminn.layout.layout')
@php
    $title = 'Wizard';
    $subTitle = 'Wizard';
    $script = ' <script>
        // =============================== Wizard Step Js Start ================================
        $(document).ready(function() {
            // click on next button
            $(".form-wizard-next-btn").on("click", function() {
                var parentFieldset = $(this).parents(".wizard-fieldset");
                var currentActiveStep = $(this).parents(".form-wizard").find(".form-wizard-list .active");
                var next = $(this);
                var nextWizardStep = true;
                parentFieldset.find(".wizard-required").each(function() {
                    var thisValue = $(this).val();

                    if (thisValue == "") {
                        $(this).siblings(".wizard-form-error").show();
                        nextWizardStep = false;
                    } else {
                        $(this).siblings(".wizard-form-error").hide();
                    }
                });
                if (nextWizardStep) {
                    next.parents(".wizard-fieldset").removeClass("show", "400");
                    currentActiveStep.removeClass("active").addClass("activated").next().addClass("active",
                        "400");
                    next.parents(".wizard-fieldset").next(".wizard-fieldset").addClass("show", "400");
                    $(document).find(".wizard-fieldset").each(function() {
                        if ($(this).hasClass("show")) {
                            var formAtrr = $(this).attr("data-tab-content");
                            $(document).find(".form-wizard-list .form-wizard-step-item").each(
                                function() {
                                    if ($(this).attr("data-attr") == formAtrr) {
                                        $(this).addClass("active");
                                        var innerWidth = $(this).innerWidth();
                                        var position = $(this).position();
                                        $(document).find(".form-wizard-step-move").css({
                                            "left": position.left,
                                            "width": innerWidth
                                        });
                                    } else {
                                        $(this).removeClass("active");
                                    }
                                });
                        }
                    });
                }
            });
            //click on previous button
            $(".form-wizard-previous-btn").on("click", function() {
                var counter = parseInt($(".wizard-counter").text());;
                var prev = $(this);
                var currentActiveStep = $(this).parents(".form-wizard").find(".form-wizard-list .active");
                prev.parents(".wizard-fieldset").removeClass("show", "400");
                prev.parents(".wizard-fieldset").prev(".wizard-fieldset").addClass("show", "400");
                currentActiveStep.removeClass("active").prev().removeClass("activated").addClass("active",
                    "400");
                $(document).find(".wizard-fieldset").each(function() {
                    if ($(this).hasClass("show")) {
                        var formAtrr = $(this).attr("data-tab-content");
                        $(document).find(".form-wizard-list .form-wizard-step-item").each(
                            function() {
                                if ($(this).attr("data-attr") == formAtrr) {
                                    $(this).addClass("active");
                                    var innerWidth = $(this).innerWidth();
                                    var position = $(this).position();
                                    $(document).find(".form-wizard-step-move").css({
                                        "left": position.left,
                                        "width": innerWidth
                                    });
                                } else {
                                    $(this).removeClass("active");
                                }
                            });
                    }
                });
            });
            //click on form submit button
            $(document).on("click", ".form-wizard .form-wizard-submit", function() {
                var parentFieldset = $(this).parents(".wizard-fieldset");
                var currentActiveStep = $(this).parents(".form-wizard").find(".form-wizard-list .active");
                parentFieldset.find(".wizard-required").each(function() {
                    var thisValue = $(this).val();
                    if (thisValue == "") {
                        $(this).siblings(".wizard-form-error").show();
                    } else {
                        $(this).siblings(".wizard-form-error").hide();
                    }
                });
            });
            // focus on input field check empty or not
            $(".form-control").on("focus", function() {
                var tmpThis = $(this).val();
                if (tmpThis == "") {
                    $(this).parent().addClass("focus-input");
                } else if (tmpThis != "") {
                    $(this).parent().addClass("focus-input");
                }
            }).on("blur", function() {
                var tmpThis = $(this).val();
                if (tmpThis == "") {
                    $(this).parent().removeClass("focus-input");
                    $(this).siblings(".wizard-form-error").show();
                } else if (tmpThis != "") {
                    $(this).parent().addClass("focus-input");
                    $(this).siblings(".wizard-form-error").hide();
                }
            });
        });
        // =============================== Wizard Step Js End ================================
    </script>
             <script src="'.asset('vendor/laravel-filemanager/js/stand-alone-button.js').'"></script>
   <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
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
    <div class="row gy-4 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('store.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-between ">
                            <div class="">
                                <h6 class="mb-4 text-xl">Store adding</h6>
                                <p class="text-neutral-500">Fill up your details and proceed next steps.</p>
                            </div>
                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                    for="switch1">Hide</label>
                                <input type="hidden" name="status" value="0">

                                <!-- Checkbox overrides hidden value when checked -->
                                <input class="form-check-input" type="checkbox" role="switch" name="status" id="switch1"
                                    value="1" checked>

                                <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch1">
                                    Show / Active</label>
                            </div>
                        </div>
                        <!-- Form Wizard Start -->
                        <div class="form-wizard">
                            <div class="form-wizard-header overflow-x-auto scroll-sm pb-8 my-32">
                                <ul class="list-unstyled form-wizard-list style-two">
                                    <li class="form-wizard-list__item active">
                                        <div class="form-wizard-list__line">
                                            <span class="count">1</span>
                                        </div>
                                        <span class="text text-xs fw-semibold">Store start </span>
                                    </li>
                                    <li class="form-wizard-list__item">
                                        <div class="form-wizard-list__line">
                                            <span class="count">2</span>
                                        </div>
                                        <span class="text text-xs fw-semibold">Website Data </span>
                                    </li>
                                    <li class="form-wizard-list__item">
                                        <div class="form-wizard-list__line">
                                            <span class="count">3</span>
                                        </div>
                                        <span class="text text-xs fw-semibold">Seo Date </span>
                                    </li>
                                    <li class="form-wizard-list__item">
                                        <div class="form-wizard-list__line">
                                            <span class="count">4</span>
                                        </div>
                                        <span class="text text-xs fw-semibold">Completed</span>
                                    </li>
                                </ul>
                            </div>
                            <fieldset class="wizard-fieldset show">
                                <h6 class="text-md text-neutral-500">Category Information</h6>
                                <div class="row gy-3">
                                    <div class="col-sm-6">
                                        <label class="form-label">Store Name*</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control wizard-required" name="name"
                                                placeholder="Enter Category Name" required>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Category Name*</label>
                                        <div class="position-relative">

                                            <select name="category_id"
                                                class="form-control radius-8 form-select wizard-required" id="depart"
                                                required>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <label class="form-label">Logo *</label>
                                        <div class="position-relative">
                                            <div class="mb-3">

                                                <div class="input-group">
                                                    <input id="logo" class="form-control wizard-required"
                                                        type="text" name="logo" required>
                                                    <span class="input-group-btn">
                                                        <button id="lfm" data-input="logo" data-preview="holder"
                                                            class="btn btn-primary">
                                                            Choose
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="wizard-form-error"></div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                            {{-- <input  class="form-control wizard-required" type="file" placeholder="Enter Last Name" required> --}}

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Cover Image *</label>
                                        <div class="position-relative">
                                            <div class="mb-3">

                                                <div class="input-group">
                                                    <input id="image" class="form-control" type="text"
                                                        name="image">
                                                    <span class="input-group-btn">
                                                        <button id="lfms" data-input="image" data-preview="holder"
                                                            class="btn btn-primary">
                                                            Choose
                                                        </button>
                                                    </span>
                                                </div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                            {{-- <input  class="form-control wizard-required" type="file" placeholder="Enter Last Name" required> --}}
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>


                                    <div class="form-group text-end">
                                        <button type="button"
                                            class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="wizard-fieldset">
                                <h6 class="text-md text-neutral-500">Website Information</h6>
                        


                                <div class="row gy-3">
                                                 <label class="form-label">Select one or more tags to highlight this coupon (e.g., Trending, Featured, Recommended, Deals, Verified, Exclusive).</label>

                                          <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    
                                    <input type="checkbox" name="trend" class="btn-check" id="btncheck1">                        
                        <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck1">Trending </label>
                       
                        <input type="checkbox" class="btn-check" name="feature" id="btncheck11">
                        <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck11">Featured </label> 
                        
                        <input type="checkbox" class="btn-check" name="recom" id="btncheck12">                        
                        <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck12">Recommended</label>
                       
                

                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Heading *</label>
                                        <div class="position-relative">
                                            <div class="d-flex text-nowrap align-items-center">
                                                <input type="text" class="form-control wizard-required" name="heading"
                                                    placeholder="Enter Category Name" required>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    viewBox="0 0 24 24">
                                                    <g fill="none" stroke="currentColor" stroke-dasharray="16"
                                                        stroke-dashoffset="16" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2">
                                                        <path d="M5 12h14">
                                                            <animate fill="freeze" attributeName="stroke-dashoffset"
                                                                dur="0.8s" values="16;0" />
                                                        </path>
                                                        <path d="M12 5v14">
                                                            <animate fill="freeze" attributeName="stroke-dashoffset"
                                                                begin="0.8s" dur="0.8s" values="16;0" />
                                                        </path>
                                                    </g>
                                                </svg>
                                                <h5>{{ \Carbon\Carbon::now()->format('F Y') }}</h5>
                                            </div>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Description Content*</label>
                                        <div class="position-relative">
                                            <textarea id="editor2" name="description" class="form-control" rows="8"></textarea>

                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="relat_store" class="form-check-input"
                                                onchange="toggleDropdown(this, 'dropdown1')">
                                            Related Stores
                                        </label>

                                       <div class="dropdown w-100" style="display:none" id="dropdown1">
  <!-- Button -->
  <button 
    class="btn btn-outline-primary w-100 d-flex justify-content-between align-items-center" 
    type="button" 
    data-bs-toggle="dropdown" 
    aria-expanded="false" 
    id="dropdown1-btn">
    
    <span id="dropdown1-label">Select Stores</span>
    <span class="badge bg-secondary ms-2" id="dropdown1-count">0</span>
  </button>

  <!-- Dropdown Menu -->
  <ul class="dropdown-menu p-3 w-100" aria-labelledby="dropdown1-btn">
    
    <!-- Search -->
    <input type="text" id="store-search" class="form-control mb-2" placeholder="Search stores...">

    <!-- Select All toggle -->
    <button type="button" id="select-all-toggle" class="btn btn-sm btn-link mb-2">
      Select All / Deselect All
    </button>

    <!-- Store list -->
    <ul id="store-list" class="list-unstyled ms-13  mb-0" style="max-height: 200px; overflow-y: auto;">
    
    
    </ul>

  </ul>
</div>
</div>

                                        <!-- Second Column -->
                                        <div class="col-md-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="relat_cate" class="form-check-input"
                                                    onchange="toggleDropdown(this, 'dropdown2')">
                                                Related Categories
                                            </label>
<div class="dropdown w-100 mt-3" id="dropdown2" style="display:none;">
  <!-- Button -->
  <button 
    class="btn btn-outline-primary w-100 d-flex justify-content-between align-items-center" 
    type="button" 
    data-bs-toggle="dropdown" 
    aria-expanded="false" 
    id="dropdown2-btn">

    <span id="dropdown2-label">Select Options</span>
    <span class="badge bg-secondary ms-2" id="dropdown2-count">0</span>
  </button>

  <!-- Dropdown Menu -->
  <ul class="dropdown-menu p-3 w-100" aria-labelledby="dropdown2-btn">
    
    <!-- Search -->
    <input type="text" id="dropdown2-search" class="form-control mb-2" placeholder="Search options...">

    <!-- Toggle all -->
    <button type="button" id="dropdown2-toggle" class="btn btn-sm btn-link mb-2">
      Select All / Deselect All
    </button>

    <!-- Options list -->
    <ul id="dropdown2-list" class="list-unstyled ms-13  mb-0" style="max-height: 200px; overflow-y: auto;">
      @foreach ($categories as $index => $category)<li> 
        <div class="form-check d-flex align-items-center">
          <input class="form-check-input multi-option" type="checkbox" id="opt{{ $index + 1 }}" name="relat_cate_options[]" value="{{ $category->id }}">
          <label class="form-check-label" for="opt{{ $index + 1 }}">{{ $category->name }}</label>
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
                                                    onchange="toggleDropdown(this, 'dropdown3')">
                                                shoppers also like
                                            </label>
                                           <div class="dropdown w-100 mt-3" id="dropdown3" style="display:none;">
  <!-- Button -->
  <button 
    class="btn btn-outline-primary w-100 d-flex justify-content-between align-items-center" 
    type="button" 
    data-bs-toggle="dropdown" 
    aria-expanded="false" 
    id="dropdown3-btn">

    <span id="dropdown3-label">Select Options</span>
    <span class="badge bg-secondary ms-2" id="dropdown3-count">0</span>
  </button>

  <!-- Dropdown Menu -->
  <ul class="dropdown-menu p-3 w-100" aria-labelledby="dropdown3-btn">
    
    <!-- Search -->
    <input type="text" id="dropdown3-search" class="form-control mb-2" placeholder="Search options...">

    <!-- Toggle all -->
    <button type="button" id="dropdown3-toggle" class="btn btn-sm btn-link mb-2">
      Select All / Deselect All
    </button>

    <!-- Options list -->
    <ul id="dropdown3-list" class="list-unstyled ms-13  mb-0" style="max-height: 200px; overflow-y: auto;">
      @foreach ($stores as $index => $store)<li> 
        <div class="form-check d-flex align-items-center">
          <input class="form-check-input multi-option" type="checkbox" id="opt{{ $index + 1 }}" name="like_store_options[]" value="{{ $store->id }}">
          <label class="form-check-label" for="opt{{ $index + 1 }}">{{ $store->name }}</label>
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
                                                    onchange="toggleDropdown(this, 'dropdown4')">
                                                Trending Brands
                                            </label>
                                           <div class="dropdown w-100 mt-3" id="dropdown4" style="display:none;">
  <!-- Button -->
  <button 
    class="btn btn-outline-primary w-100 d-flex justify-content-between align-items-center" 
    type="button" 
    data-bs-toggle="dropdown" 
    aria-expanded="false" 
    id="dropdown4-btn">

    <span id="dropdown4-label">Select Options</span>
    <span class="badge bg-secondary ms-2" id="dropdown4-count">0</span>
  </button>

  <!-- Dropdown Menu -->
  <ul class="dropdown-menu p-3 w-100" aria-labelledby="dropdown4-btn">
    
    <!-- Search -->
    <input type="text" id="dropdown4-search" class="form-control mb-2" placeholder="Search options...">

    <!-- Toggle all -->
    <button type="button" id="dropdown4-toggle" class="btn btn-sm btn-link mb-2">
      Select All / Deselect All
    </button>

    <!-- Options list -->
    <ul id="dropdown4-list" class="list-unstyled ms-13  mb-0" style="max-height: 200px; overflow-y: auto;">
      @foreach ($trends as $index => $trend)<li> 
        <div class="form-check d-flex align-items-center">
          <input class="form-check-input multi-option" type="checkbox" id="opt{{ $index + 1 }}" name="trend_store_options[]" value="{{ $trend->id }}">
          <label class="form-check-label" for="opt{{ $index + 1 }}">{{ $trend->name }}</label>
        </div>
      </li>
     @endforeach
     
    
    </ul>
  </ul>
</div>
                                        </div>

                                        <div class="col-md-12">
                                            <h4>Dynamic Sections below stores Coupons </h4>
                                            <div id="input-wrapper">
                                                <!-- First Block -->
                                                <div class="input-block mb-3 p-3 border rounded">
                                                    <input type="text" name="dy_heading[]" class="form-control mb-2"
                                                        placeholder="Enter name">

                                                    <textarea class="editor form-control" name="dy_description[]" rows="5"></textarea>

                                                    <button type="button"
                                                        class="btn btn-danger btn-sm mt-2 d-flex align-items-center justify-content-center remove-block w-50-px h-50-px ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="m20.37 8.91l-1 1.73l-12.13-7l1-1.73l3.04 1.75l1.36-.37l4.33 2.5l.37 1.37zM6 19V7h5.07L18 11v8a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <hr>
                                                <br />
                                            </div>

                                            <button type="button" id="add-block"
                                                class="btn btn-primary mt-3 w-50-px h-50-px"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 48 48">
                                                    <g fill="none" stroke="currentColor" stroke-linejoin="round"
                                                        stroke-width="4">
                                                        <rect width="36" height="36" x="6" y="6" rx="3" />
                                                        <path stroke-linecap="round" d="M24 16v16m-8-8h16" />
                                                    </g>
                                                </svg></button>
                                        </div>


                                        <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                            <button type="button"
                                                class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                            <button type="button"
                                                class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                        </div>
                                    </div>
                            </fieldset>

                            <fieldset class="wizard-fieldset">
                                <h6 class="text-md text-neutral-500">SEO Information</h6>
                                <div class="row gy-3">
                                    <div class="col-sm-6">
                                        <label class="form-label">URL SLUG*</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control wizard-required" name="slug"
                                                placeholder="Enter Slug" required>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Store URL (Website)*</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control wizard-required" name="link"
                                                placeholder="Enter url" required>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                

                                    <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                        <button type="button"
                                            class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                        <button type="button"
                                            class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="wizard-fieldset">
                                <div class="text-center mb-40">
                                    <img src="{{ asset('assets/images/gif/success-img3.gif') }}" alt=""
                                        class="gif-image mb-24">
                                    <h6 class="text-md text-neutral-600">Congratulations </h6>
                                    <p class="text-neutral-400 text-sm mb-0">Well done! You have successfully completed.
                                    </p>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                    <button type="button"
                                        class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                    <button type="submit"
                                        class="form-wizard-submit btn btn-primary-600 px-32">Publish</button>
                                </div>
                            </fieldset>

                        </div>
                        <!-- Form Wizard End -->

                    </form>
                </div>
            </div>
        </div>
    </div>
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
   function renderStores(categoryId) {
        storeList.innerHTML = "";

        const filtered = allStores.filter(s => s.category_id == categoryId);

        if (filtered.length === 0) {
            storeList.innerHTML = '<li class="text-muted small fst-italic">No stores found</li>';
            updateCount();
            return;
        }

        filtered.forEach(store => {
            storeList.insertAdjacentHTML("beforeend", `
                <li>
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input store-option" 
                               type="checkbox" 
                               id="store${store.id}" 
                               name="stores[]" 
                               value="${store.id}">
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
            storeList.innerHTML = '<li class="text-muted small fst-italic">Please select a category</li>';
            updateCount();
        }
    });
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

        // Generate unique IDs for editors
        function generateId(prefix = "editor") {
            return prefix + Math.floor(Math.random() * 1000000);
        }

        // Add new block
        document.getElementById('add-block').addEventListener('click', function() {
            const wrapper = document.getElementById('input-wrapper');

            const block = document.createElement('div');
            block.classList.add('input-block', 'mb-3', 'p-3', 'border', 'rounded');
            const editorId = generateId();
            block.innerHTML = `<input type="text" name="dy_heading[]" class="form-control mb-2" placeholder="Enter name">
            <textarea id="${editorId}" class="editor form-control" name="dy_description[]" rows="5"></textarea>
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-block w-50-px h-50-px">  
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m20.37 8.91l-1 1.73l-12.13-7l1-1.73l3.04 1.75l1.36-.37l4.33 2.5l.37 1.37zM6 19V7h5.07L18 11v8a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2"/></svg>
            </button>`;
            wrapper.appendChild(block);
            // Init editor for new textarea
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

        // Initialize the first one
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.editor').forEach((el, i) => {
                if (!el.id) el.id = generateId();
                setTimeout(() => initEditor('#' + el.id), 100);
                el.dataset.initialized = true;
            });
        });
    </script>
@endpush
