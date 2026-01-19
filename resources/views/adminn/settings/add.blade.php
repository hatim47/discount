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
             <script src="'.asset('vendor/laravel-filemanager/js/stand-alone-button.js').'"></script>
   <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
    var route_prefix = "'. url('/laravel-filemanager') .'";
    $("#lfm").filemanager("image", {prefix: route_prefix});
      
</script>';
                 
@endphp

@section('content')

            <div class="row gy-4 justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                         <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                                         @csrf
                        <div class="d-flex justify-content-between " >
                         <div class="" >
                            <h6 class="mb-4 text-xl">setting form</h6>
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
                                                <span class="text text-xs fw-semibold">Home Page </span>
                                            </li>
                                            <li class="form-wizard-list__item">
                                                <div class="form-wizard-list__line">
                                                    <span class="count">2</span>
                                                </div>
                                                <span class="text text-xs fw-semibold">Category / Contact Page </span>
                                            </li>
                                            <li class="form-wizard-list__item">
                                                <div class="form-wizard-list__line">
                                                    <span class="count">3</span>
                                                </div>
                                                <span class="text text-xs fw-semibold">social media setting</span>
                                            </li>
                                            <li class="form-wizard-list__item">
                                                <div class="form-wizard-list__line">
                                                    <span class="count">4</span>
                                                </div>
                                                <span class="text text-xs fw-semibold">Ctore Date </span>
                                            </li>
                                            
                                            <li class="form-wizard-list__item">
                                                <div class="form-wizard-list__line">
                                                    <span class="count">5</span>
                                                </div>
                                                <span class="text text-xs fw-semibold">Completed</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <fieldset class="wizard-fieldset show">
                                        <h6 class="text-md text-neutral-500">Event Information</h6>
                                        <div class="row gy-3"> 

                                                                               
      <div class="col-6">
      <label class="form-label">Select Region</label>
        <select class="form-control radius-8 form-select wizard-required" name="setting_region" id="region" style="">
        @foreach ($region as $trend)
        <option value="{{ $trend->id }}"> {{ $trend->title }} </option>
        @endforeach
        </select>
     </div>                                        
        <div class="col-sm-6">
                                <label class="form-label">Website Name*</label>
                                <div class="position-relative">   
                                    <input type="text" class="form-control wizard-required" name="web_name" placeholder="Enter Heading " required>
                                        <div class="wizard-form-error"></div>
                                </div>
                                    </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Website Logo*</label>
                                                <div class="position-relative"> 
                                       <div class="mb-3">
                                        <div class="input-group">
                                            <input id="logo" class="form-control wizard-required" type="text" name="web_logo" required>
                                            <span class="input-group-btn">
                                                <button id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary">
                                                    Choose
                                                </button>
                                            </span>
                                        </div>
                                        <div class="wizard-form-error"></div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                    </div>                                                    
                                 </div>
                            </div>
                                       <div class="col-sm-6">
                                                <label class="form-label">Website Logo*</label>
                                                <div class="position-relative"> 
                                       <div class="mb-3">
                                        <div class="input-group">
                                            <input id="logo" class="form-control wizard-required" type="text" name="favicon" required>
                                            <span class="input-group-btn">
                                                <button id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary">
                                                    Choose
                                                </button>
                                            </span>
                                        </div>
                                        <div class="wizard-form-error"></div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                    </div>                                                    
                                 </div>
                            </div>
                                    <div class="col-sm-12">
                                    <label class="form-label">Home About*</label>
                                    <div class="position-relative">
                                    <textarea id="editor2" name="home_about" class="form-control" rows="8"></textarea>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    </div>


                                       <div class="col-sm-12">
                                    <label class="form-label">Home  Page Description*</label>
                                    <div class="position-relative">
                                    <textarea id="editor4" name="home_m_content" class="form-control" rows="8"></textarea>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    </div>
                                        <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="home_m_tiitle" placeholder="Enter Title" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="home_m_descrip" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
 <div class="col-sm-4">
                                                <label class="form-label">Street Address </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="streetAddress" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                    <div class="col-sm-4">
                                                <label class="form-label">Address Locality</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="addressLocality" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                 <div class="col-sm-4">
                                                <label class="form-label">Address Region </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="addressRegion" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                    <div class="col-sm-4">
                                                <label class="form-label">Postal Code</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="postalCode" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                      <div class="col-sm-4">
                                                <label class="form-label">Address Country</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="addressCountry" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-4">              
                                                <label class="form-label">Language </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="lange" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>



                                            
                                            <div class="form-group text-end">
                                                <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="wizard-fieldset">
                                        <h6 class="text-md text-neutral-500">Category Menu Page</h6>
                                    <div class="row gy-3">
                                         <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="cate_m_tiitle" placeholder="Enter Title" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="cate_m_descrip" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>

                                             <div class="col-sm-12">
                                    <label class="form-label">Category Page Description*</label>
                                    <div class="position-relative">
                                    <textarea id="editor5" name="cate_m_content" class="form-control" rows="8"></textarea>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    </div>
                            <h6 class="text-md text-neutral-500">Contact Page</h6>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="contact_m_tiitle" placeholder="Enter Title" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="contact_m_descrip" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                             <div class="col-sm-12">
                                    <label class="form-label">Contact Page Description*</label>
                                    <div class="position-relative">
                                    <textarea id="editor9" name="contact_content" class="form-control" rows="8"></textarea>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    </div>

                                               <h6 class="text-md text-neutral-500">Event Page</h6>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="event_m_tiitle" placeholder="Enter Title" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="event_m_descrip" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        <div class="col-sm-12">
                                    <label class="form-label">Event Page Description*</label>
                                    <div class="position-relative">
                                    <textarea id="editor6" name="event_m_content" class="form-control" rows="8"></textarea>
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
                                       <h6 class="text-md text-neutral-500">social media setting </h6>
                                  
                                        <div class="row gy-3">
                    <div class="col-4">
                            <label class="form-label">Tiwtter</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="mingcute:social-x-fill" ><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="twitter" class="form-control flex-grow-1" placeholder="info@gmail.com">
                            </div>
                        </div>

 <div class="col-4">
                            <label class="form-label">Youtube</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="typcn:social-youtube"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="youtube" class="form-control flex-grow-1" placeholder="info@gmail.com">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Pinterest</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon  icon="ion:social-pinterest"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="pinterest" class="form-control flex-grow-1" placeholder="info@gmail.com">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Linkedin</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-linkedin"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="lnikedin" class="form-control flex-grow-1" placeholder="info@gmail.com">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Facebook</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-facebook"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="facebook" class="form-control flex-grow-1" placeholder="info@gmail.com">
                            </div>
                        </div>


                         <div class="col-4">
                            <label class="form-label">Instagram</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="typcn:social-instagram"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="instagram" class="form-control flex-grow-1" placeholder="info@gmail.com">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Tiktok</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="streamline-flex:tiktok-solid"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="tiktok" class="form-control flex-grow-1" placeholder="info@gmail.com">
                            </div>
                        </div>
                               
                         <div class="col-4">
                            <label class="form-label">snapchat</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-snapchat"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="snapchat" class="form-control flex-grow-1" placeholder="info@gmail.com">
                            </div>
                        </div>   

                                <h6 class="text-md text-neutral-500">Header / Footer js </h6>
                                              <div class="col-sm-6">
                                                <label class="form-label">Header js </label>
                                                <div class="position-relative">
                                                        <textarea  name="seoheader" class="form-control" rows="8"></textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Footer js </label>
                                                <div class="position-relative">
                                                        <textarea  name="seofooter" class="form-control" rows="8"></textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-12">
                                                <label class="form-label">keyword*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="keyword" placeholder="Enter Title" required>
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
                                       <h6 class="text-md text-neutral-500">Store Menu Page</h6>
                                  
                                        <div class="row gy-3">
                                         <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="store_m_tiitle" placeholder="Enter Title" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="store_m_descrip" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                             <div class="col-sm-12">
                                    <label class="form-label">Store Page Description*</label>
                                    <div class="position-relative">
                                    <textarea id="editor7" name="store_m_content" class="form-control" rows="8"></textarea>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    </div>


                                <h6 class="text-md text-neutral-500">store Menu filter Page</h6>
                                              <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="stores_m_tiitle" placeholder="Enter Title" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="stores_m_descrip" placeholder="Enter Description" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            
                                          <div class="col-sm-12">
                                    <label class="form-label">Store Page Description*</label>
                                    <div class="position-relative">
                                    <textarea id="editor8" name="stores_m_content" class="form-control" rows="8"></textarea>
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

    initEditor('#editor4');
    initEditor('#editor2');
     initEditor('#editor1');
    initEditor('#editor5');
    initEditor('#editor6');
    initEditor('#editor7');
    initEditor('#editor8');
initEditor('#editor9');
</script>
@endpush
