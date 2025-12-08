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
                         <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
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
                                            <div class="col-sm-6">
                                                <label class="form-label">About Heading*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="heading1" placeholder="Enter Event Name" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="form-label">About Heading*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="heading2" placeholder="Enter Event Name" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                             <div class="col-sm-6">
                                                <label class="form-label">Start Date*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="heading2" placeholder="Enter Event Name" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">End Date*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="heading2" placeholder="Enter Event Name" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group text-end">
                                                <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                            </div>
                                        </div>
                         
                                        <div class="form-group d-flex align-items-center justify-content-end gap-8">
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

   
    initEditor('#editor2');
</script>
@endpush
