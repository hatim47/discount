<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<x-head/>

<body>
@php
      $script = '
    
      <script>
               $(document).ready(function() {
    $(".toggle-password").on("click", function() {
        var input = $($(this).data("toggle"));
        input.attr("type", input.attr("type") === "password" ? "text" : "password");
    });
});
</script>';

@endphp
    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{ asset('assets/images/auth/auth-img.png') }}" alt="">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="{{ route('index') }}" class="mb-40 max-w-290-px">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    </a>
                    <h4 class="mb-12">Sign In to your Account</h4>
                    <p class="mb-32 text-secondary-light text-lg">Welcome back! please enter your detail</p>
                </div>
                    <form method="POST" action="{{ route('admin.login.post') }}">
      @csrf
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" name="email" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Email">
                    </div>
                <div class="position-relative mb-20">
    <div class="icon-field">
        <span class="icon top-50 translate-middle-y">
            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
        </span>
        <input type="password" name="password" class="form-control h-56-px bg-neutral-50 radius-12" id="password" placeholder="Password">
    </div>
    <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" style="cursor:pointer;" data-toggle="#password"></span>
</div>            

                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"> Sign In</button>

                
             

                </form>
            </div>
        </div>
    </section>



<x-script />

</body>

</html>