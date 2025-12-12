@extends('adminn.layout.layout')
@php
    $title='Wizard';
    $subTitle = 'Wizard';
    $script = ' 
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
                         <form action="{{ route('about.store') }}" method="POST" id="contactForm" enctype="multipart/form-data">
                                         @csrf
                        <div class="d-flex justify-content-between " >
                         <div class="" >
                            <h6 class="mb-4 text-xl">About adding</h6>
                            <p class="text-neutral-500">Fill up your details and proceed next steps.</p>
                            </div>

                             </div>
                            <!-- Form Wizard Start -->
                            <div class="form-wizard">                              

                                    <fieldset class="wizard-fieldset show">
                                        <h6 class="text-md text-neutral-500">About Information</h6>
                                        <div class="row gy-3">
                                        <div class="col-12">
                                                <label class="form-label">Select Region</label>
                                            <select class="form-control radius-8 form-select wizard-required" name="about_region" id="region" style="">
                                                @foreach ($region as $trend)
                                                    <option value="{{ $trend->id }}">{{ $trend->title }}</option>
                                                @endforeach
                                            </select> 
                                        </div>

                                               <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="m_tiitle" placeholder="Enter Title" required>
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


                <div class="col-sm-6">
                                                <label class="form-label">About Heading Main*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required"  name="heading1" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
 <div class="col-sm-6">
                                                <label class="form-label">About Heading Main text *</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="head1text"  placeholder="Enter Event Name" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">About Heading Second*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required"   name="heading5" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                              <div class="col-sm-6">
                                                <label class="form-label">About Heading Second Text*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required"   name="heading5text" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                             <div class="col-sm-6">
                                                 <label class="form-label">About Heading Second Sub heading*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required"  name="head5sub1" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading Second Sub text*</label>
                                                <div class="position-relative">                                                  
                                                <textarea  name="head5sub1text" class="form-control" rows="4"> </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                 <label class="form-label">About Heading Second Sub heading 2*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required"  name="head5sub2" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading Second Sub text 2*</label>
                                                <div class="position-relative">                                                  
                                            <textarea  name="head5sub2text" class="form-control" rows="4"></textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            
                                            
 <div class="col-sm-6">
                                                 <label class="form-label">About Heading Second Sub heading 3*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required"  name="head5sub3" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading Second Sub text 3*</label>
                                                <div class="position-relative">
                                                  
                                          <textarea  name="head5sub3text" class="form-control" rows="4"> </textarea>

                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
  <div class="col-sm-6">
                                                 <label class="form-label">About Heading third *</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required"  name="heading2" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        
 <div class="col-sm-6">
                                                 <label class="form-label">About Heading third Sub heading 1*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="head2sub1" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading third Sub text 1*</label>
                                                <div class="position-relative">
                                          <textarea  name="head2sub1text" class="form-control" rows="4"> </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">About Heading third Sub heading 2*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required"  name="head2sub2" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading third Sub text 2*</label>
                                                <div class="position-relative">
                                          <textarea  name="head2sub2text" class="form-control" rows="4"> </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                 <label class="form-label">About Heading third Sub heading 3*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required"  name="head2sub3" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading third Sub text 3*</label>
                                                <div class="position-relative">
                                                 <textarea  name="head2sub3text" class="form-control" rows="4"> </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                             <div class="col-sm-6">
                                                 <label class="form-label">About Heading Fourth heading *</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required"  name="heading3" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">About Heading Fourth text *</label>
                                                <div class="position-relative">                                                  
                                                <textarea  name="heading3text" class="form-control" rows="4"> </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>

                                             <div class="col-sm-6">
                                                 <label class="form-label">About Heading Fourth Sub heading *</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required"  name="head3sub1" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading Fourth Sub text *</label>
                                                <div class="position-relative">
                                                  
                                          <textarea  name="head3sub1text" class="form-control" required

                                           rows="4"> </textarea>

                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                 <label class="form-label">About Heading Fourth Sub heading 2 *</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="head3sub2"  placeholder="Enter Event Name" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading Fourth Sub text 2 *</label>
                                                <div class="position-relative">
                                                  
                                          <textarea  name="head3sub2text" class="form-control" required rows="4"> </textarea>

                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-sm-6">
                                                 <label class="form-label">About Heading Fourth Sub heading 3 *</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="head3sub3"  placeholder="Enter Event Name" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>

                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading Fourth Sub text 3*</label>
                                                <div class="position-relative">
                                                  
                                          <textarea  name="head3sub3text" class="form-control" required rows="4"> </textarea>

                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                            
                                            <div class="col-sm-6">
                                                 <label class="form-label">About Heading fifth Sub heading 5 *</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="heading4"  placeholder="Enter Event Name" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>

                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading fifth Sub text 5*</label>
                                                <div class="position-relative">
                                                  
                                          <textarea  name="heading4text" class="form-control" required rows="4"> </textarea>

                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>




                                              <div id="error" class="text-red-500 text-sm mb-2"></div>

                                            <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                                <button type="submit" class="form-wizard-submit btn btn-primary-600 px-32">Publish</button>
                                            </div>
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
document.getElementById("contactForm").addEventListener("submit", function(e) {
    const textareas = this.querySelectorAll("textarea");
    let allFilled = true;

    textareas.forEach(t => {
        if (t.value.trim() == "") {
            allFilled = false;
        }
    });
    const errorEl = document.getElementById("error");
    if (!allFilled) {
        e.preventDefault();
        errorEl.textContent = "Please fill all fields!";
    } else {
        errorEl.textContent = "";
    }
});
</script>
@endpush
