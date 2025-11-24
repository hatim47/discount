@extends('adminn.layout.layout')
@php
    $title='Wizard';
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
                parentFieldset.find(".wizard-required").each(function(){
                    var thisValue = $(this).val();

                    if( thisValue == "") {
                        $(this).siblings(".wizard-form-error").show();
                        nextWizardStep = false;
                    }
                    else {
                        $(this).siblings(".wizard-form-error").hide();
                    }
                });
                if( nextWizardStep) {
                    next.parents(".wizard-fieldset").removeClass("show","400");
                    currentActiveStep.removeClass("active").addClass("activated").next().addClass("active","400");
                    next.parents(".wizard-fieldset").next(".wizard-fieldset").addClass("show","400");
                    $(document).find(".wizard-fieldset").each(function(){
                        if($(this).hasClass("show")){
                            var formAtrr = $(this).attr("data-tab-content");
                            $(document).find(".form-wizard-list .form-wizard-step-item").each(function(){
                                if($(this).attr("data-attr") == formAtrr){
                                    $(this).addClass("active");
                                    var innerWidth = $(this).innerWidth();
                                    var position = $(this).position();
                                    $(document).find(".form-wizard-step-move").css({"left": position.left, "width": innerWidth});
                                }else{
                                    $(this).removeClass("active");
                                }
                            });
                        }
                    });
                }
            });
            //click on previous button
            $(".form-wizard-previous-btn").on("click",function() {
                var counter = parseInt($(".wizard-counter").text());;
                var prev =$(this);
                var currentActiveStep = $(this).parents(".form-wizard").find(".form-wizard-list .active");
                prev.parents(".wizard-fieldset").removeClass("show","400");
                prev.parents(".wizard-fieldset").prev(".wizard-fieldset").addClass("show","400");
                currentActiveStep.removeClass("active").prev().removeClass("activated").addClass("active","400");
                $(document).find(".wizard-fieldset").each(function(){
                    if($(this).hasClass("show")){
                        var formAtrr = $(this).attr("data-tab-content");
                        $(document).find(".form-wizard-list .form-wizard-step-item").each(function(){
                            if($(this).attr("data-attr") == formAtrr){
                                $(this).addClass("active");
                                var innerWidth = $(this).innerWidth();
                                var position = $(this).position();
                                $(document).find(".form-wizard-step-move").css({"left": position.left, "width": innerWidth});
                            }else{
                                $(this).removeClass("active");
                            }
                        });
                    }
                });
            });
            //click on form submit button
            $(document).on("click",".form-wizard .form-wizard-submit" , function(){
                var parentFieldset = $(this).parents(".wizard-fieldset");
                var currentActiveStep = $(this).parents(".form-wizard").find(".form-wizard-list .active");
                parentFieldset.find(".wizard-required").each(function() {
                    var thisValue = $(this).val();
                    if( thisValue == "" ) {
                        $(this).siblings(".wizard-form-error").show();
                    }
                    else {
                        $(this).siblings(".wizard-form-error").hide();
                    }
                });
            });
            // focus on input field check empty or not
            $(".form-control").on("focus", function(){
                var tmpThis = $(this).val();
                if(tmpThis == "" ) {
                    $(this).parent().addClass("focus-input");
                }
                else if(tmpThis !="" ){
                    $(this).parent().addClass("focus-input");
                }
            }).on("blur", function(){
                var tmpThis = $(this).val();
                if(tmpThis == "" ) {
                    $(this).parent().removeClass("focus-input");
                    $(this).siblings(".wizard-form-error").show();
                }
                else if(tmpThis !="" ){
                    $(this).parent().addClass("focus-input");
                    $(this).siblings(".wizard-form-error").hide();
                }
            });
        });
        // =============================== Wizard Step Js End ================================
   
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
   <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
    var route_prefix = "/laravel-filemanager";
    $("#lfm").filemanager("image", {prefix: route_prefix});
</script>';
                 
@endphp

@section('content')

            <div class="row gy-4 justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                         <form action="{{ route('categories.store') }}" method="POST">
                                         @csrf
                        <div class="d-flex justify-content-between " >
                         <div class="" >
                            <h6 class="mb-4 text-xl">category adding</h6>
                            <p class="text-neutral-500">Fill up your details and proceed next steps.</p>
                            </div>
 <div class="form-switch switch-primary d-flex align-items-center gap-3">
                         <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch1">Hide</label>
<input type="hidden" name="status" value="0">

<!-- Checkbox overrides hidden value when checked -->
<input class="form-check-input" type="checkbox" role="switch" 
       name="status" id="switch1" value="1" checked>
                                    
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch1"> Show / Active</label>
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
                                                <span class="text text-xs fw-semibold">Category start </span>
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
                                                <label class="form-label">Category Name*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="name" placeholder="Enter Category Name" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-sm-6">
                                                <label class="form-label">Img *</label>
                                                <div class="position-relative"> 
                                              <div class="mb-3">
  
    <div class="input-group">
        <input id="logo" class="form-control" type="text" name="logo">
        <span class="input-group-btn">
            <button id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary">
                Choose
            </button>
        </span>
    </div>
    <img id="holder" style="margin-top:15px;max-height:100px;">
</div>
                                                    {{-- <input  class="form-control wizard-required" type="file" placeholder="Enter Last Name" required> --}}
                                                  {{--  <div class="wizard-form-error"></div>
                                                </div>
                                            </div> --}}
                                         <div class="col-sm-6">
                             
      <label class="form-label">Select Region</label>
<select class="form-control radius-8 form-select wizard-required" name="cate_region" id="region" style="">
    @foreach ($region as $trend)
        <option value="{{ $trend->id }}">{{ $trend->title }}</option>
    @endforeach
</select> </div>

                                            
                                            <div class="form-group text-end">
                                                <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="wizard-fieldset">
                                        <h6 class="text-md text-neutral-500">Website  Information</h6>
                                        <div class="row gy-3">
                                 

<div class="col-12">
    <div class="form-switch switch-primary d-flex align-items-center gap-3">

        <!-- Always sends 0 if not checked -->
        <input type="hidden" name="is_menu" value="0">

        <!-- Sends 1 if checked -->
        <input 
            class="form-check-input" 
            type="checkbox" 
            role="switch" 
            id="switch2" 
            name="is_menu"
            value="1"
        >

        <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch2">
            Menu Active
        </label>
    </div>
</div>
                                            <div class="col-12">
                                                <label class="form-label">Short Content*</label>
                                                <div class="position-relative">   
                                 <textarea id="editor1" name="shrt_content" class="form-control" rows="4"> </textarea>
                                                        <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Description Content*</label>
                                                <div class="position-relative">
                                                        <textarea id="editor2" name="long_content" class="form-control" rows="8"></textarea>

                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
        

   
                                            
                                         
                                            <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                                <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                                <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="wizard-fieldset">
                                        <h6 class="text-md text-neutral-500">SEO Information</h6>
                                        <div class="row gy-3">
                                            <div class="col-sm-6">
                                                <label class="form-label">URL SLUG*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="slug" placeholder="Enter Slug" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">SEO URL*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="url" placeholder="Enter url" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="m_title" placeholder="Enter Title" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="m_descrip" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                                <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                                <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="wizard-fieldset">
                                        <div class="text-center mb-40">
                                            <img src="{{ asset('assets/images/gif/success-img3.gif') }}" alt="" class="gif-image mb-24">
                                            <h6 class="text-md text-neutral-600">Congratulations </h6>
                                            <p class="text-neutral-400 text-sm mb-0">Well done! You have successfully completed.</p>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                            <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                            <button type="submit" class="form-wizard-submit btn btn-primary-600 px-32">Publish</button>
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

    initEditor('#editor1');
    initEditor('#editor2');
</script>
@endpush
