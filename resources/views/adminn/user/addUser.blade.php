@extends('adminn.layout.layout')
@php
    $title='Add User';
    $subTitle = 'Add User';
    $script = '<script>
                    // ================== Image Upload Js Start ===========================
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                                $("#imagePreview").hide();
                                $("#imagePreview").fadeIn(650);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $("#imageUpload").change(function() {
                        readURL(this);
                    });
                    // ================== Image Upload Js End ===========================
             
             $(document).ready(function() {
    $(".toggle-password").on("click", function() {
        var input = $($(this).data("toggle"));
        input.attr("type", input.attr("type") === "password" ? "text" : "password");
    });
});
</script>
             
             ';
@endphp

@section('content')

            <div class="card h-100 p-0 radius-12">
                <div class="card-body p-24">
                    <div class="row justify-content-center">
                        <div class="col-xxl-6 col-xl-8 col-lg-10">
                            <div class="card border">
                                <div class="card-body">
                                    <h6 class="text-md text-primary-light mb-16">Profile </h6>

                                    <!-- Upload Image Start -->
                                    {{-- <div class="mb-24 mt-16">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" hidden>
                                                <label for="imageUpload" class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                                    <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                                </label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview"> </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- Upload Image End -->

                                      <form action="{{ route('users.store') }}" method="POST">
                                            @csrf
                                        <div class="mb-20">
                                            <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Full Name <span class="text-danger-600">*</span></label>
                                            <input type="text" name="name" class="form-control radius-8" id="name" placeholder="Enter Full Name">
                                        </div>
                                        <div class="mb-20">
                                            <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span class="text-danger-600">*</span></label>
                                            <input type="email" name="email" class="form-control radius-8" id="email" placeholder="Enter email address">
                                        </div>
                                        <div class="mb-3 position-relative">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" name="password" class="form-control" id="password">
<span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"data-toggle="#password" style="cursor:pointer;"></span>

                                                </div>
                                             <div class="mb-3 position-relative">
                                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                                  
                                                     <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"data-toggle="#password_confirmation" style="cursor:pointer;"></span>
                                                </div>

                                        <div class="d-flex align-items-center justify-content-center gap-3">
                                            <button type="button" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

