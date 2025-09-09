@extends('layout.layout')

@php
    $heading ='Setting';
    $style ='.modal-backdrop-blur {
  backdrop-filter: blur(2px);
  background-color: rgba(0, 0, 0, 0.2);
  z-index: 1000;
}

.modal-content-custom {
  width: 500px;
  max-width: 90%;
  z-index: 1001;
}

.d-none {
  display: none;
}';
    $title='Setting Page';
    $subTitle = 'Blank Page';
    $script="<script>
  const openModal = document.getElementById('openModalBtn');
  const closeModal = document.getElementById('closeModalBtn');
  const modal = document.getElementById('customModal');

  openModal.addEventListener('click', () => {
    modal.classList.remove('d-none');
  });

  closeModal.addEventListener('click', () => {
    modal.classList.add('d-none');
  });

  // Optional: Close if clicking outside modal
  document.addEventListener('click', (e) => {
    if (e.target.classList.contains('modal-backdrop-blur')) {
      modal.classList.add('d-none');
    }
  });
</script>";
@endphp

@section('content')
 <div class="card"> 
 <div class="card-body"> 

<div id="customModal" class="d-none">
<div class="modal-backdrop-blur position-fixed top-0 start-0 w-100 h-100 z-5"></div>

  <div class="modal-backdrop-blur position-fixed top-0 start-0 w-100 h-100 z-5"></div>

  <div class="modal-content-custom position-absolute top-50 start-50 translate-middle bg-white p-5 rounded-4 shadow z-10">
    <button class="btn-close position-absolute top-0 end-0 m-3" aria-label="Close" id="closeModalBtn"></button>

    <div class="row gy-3">
      <div class="col-12">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" placeholder="Enter First Name">
      </div>
      <div class="col-12">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" placeholder="Enter Last Name">
      </div>
      <div class="col-12">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter Email">
      </div>
      <div class="col-12">
        <label class="form-label">Phone</label>
        <div class="form-mobile-field d-flex gap-2">
          <select class="form-select w-auto">
            <option>US</option>
            <option>UK</option>
            <option>CA</option>
          </select>
          <input type="text" class="form-control" placeholder="+1 (555) 000-0000">
        </div>
      </div>
      <div class="col-12">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="*******">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary w-100">Submit</button>
      </div>
    </div>
  </div>
</div>
 <div class="bg-white my-24 d-flex rounded-3">
  <div class="d-flex w-full m-24 justify-content-between align-items-center"> 
                  <div class="d-flex justify-content-around  gap-2 align-items-center">
                                            <div class="avatar-upload ">
                                            <div class="avatar-edit position-absolute bottom-0 end-0 me-0 mt-0 z-1 cursor-pointer">
                                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" hidden>
                                                <label for="imageUpload" class="w-110-px h-110-px hidden hover-flex justify-content-center flex-column align-items-center text-white  rounded-circle">
                                                    <iconify-icon icon="tabler:upload" class="icon"></iconify-icon>
                                                    Upload Image
                                                </label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview">
                                                </div>
                                            </div>
                                        </div>
                                  <div class="text-packet d-flex flex-column ">   
                                                <h6>user name</h6>
                                                <p class="text-neutral-400 m-0">HR of Lorem Ipsum</p>
                                                <p class="text-neutral-400 m-0"> Lorem Ipsum</p>
                                     </div>    

           </div>

<button type="button" id="openModalBtn" class="btn-primary-600 d-flex w-80-px justify-content-center border border-2  radius-8 p-4 align-items-center gap-2">
                            Edit <iconify-icon icon="akar-icons:edit" class="text-xl"></iconify-icon>
                        </button>
     
   </div>
</div>

<div class="bg-white my-24 d-flex flex-column rounded-3">
  <div class="d-flex  m-24 flex-column align-items-start"> 
  <h6 class=" " >Utilites</h6>
   <div class="d-flex w-full py-20 justify-content-between border-bottom border-4 gap-2 align-items-center">
                  
                                           
                                  <div class="text-packet d-flex flex-column ">   
                                                <h6 class="m-0">user name</h6>
                                               
                                     </div>    

          
           <span class="text-neutral-400">View list </span>

<button type="button" class="btn-primary-600 d-flex w-80-px justify-content-center border border-2  radius-8 p-4 align-items-center gap-2">
                            Edit <iconify-icon icon="akar-icons:edit" class="text-xl"></iconify-icon>
                        </button>
      </div>
      <div class="d-flex w-full py-20 justify-content-between border-bottom border-4 gap-2 align-items-center">
<div class="text-packet d-flex flex-column ">   
     <h6 class="m-0">user name</h6>                                              
 </div>    

          
           <span class="text-neutral-400">View list </span>

<button type="button" class="btn-primary-600 d-flex w-80-px justify-content-center border border-2  radius-8 p-4 align-items-center gap-2">
                            Edit <iconify-icon icon="akar-icons:edit" class="text-xl"></iconify-icon>
                        </button>
      </div>
      <div class="d-flex w-full py-20  justify-content-between border-bottom border-4 gap-2 align-items-center">
                  
                                           
                                  <div class="text-packet d-flex flex-column ">   
                                                <h6 class="m-0">user name</h6>
                                               
                                     </div>    

          
           <span class="text-neutral-400">View list </span>

<button type="button" class="btn-primary-600 d-flex w-80-px justify-content-center border border-2  radius-8 p-4 align-items-center gap-2">
                            Edit <iconify-icon icon="akar-icons:edit" class="text-xl"></iconify-icon>
                        </button>
      </div>
   </div>
   
</div>

<div class="bg-white my-24 d-flex flex-column rounded-3">
<div class="m-24 d-flex justify-content-between">
  <h6 class=" " >Utilites</h6>
<button type="button" class="btn-primary-600 d-flex w-80-px justify-content-center border border-2  radius-8 p-4 align-items-center gap-2">
                            Edit <iconify-icon icon="akar-icons:edit" class="text-xl"></iconify-icon>
                        </button>
</div>

<div class="row m-24">

<div class="col-md-4">
  <p class="text-neutral-400 text-lg m-0">Country</p>
    <p class="text-black m-0">HR of Lorem Ipsum</p>
</div>
<div class="col-md-8">
  <p class="text-neutral-400 text-lg m-0">City/State</p>
    <p class="text-black m-0">HR of Lorem Ipsum</p>
</div> </div>
<div class="row m-24">

<div class="col-md-4">
  <p class="text-neutral-400 text-lg m-0">Postal Code</p>
    <p class="text-black m-0">HR of Lorem Ipsum</p>
</div>
<div class="col-md-8">
  <p class="text-neutral-400 text-lg m-0">Bank</p>
    <p class="text-black m-0">HR of Lorem Ipsum</p>
</div>       

</div>
<div class="row m-24">

<div class="col-md-4">
  <p class="text-neutral-400 text-lg m-0">Account Number</p>
    <p class="text-black m-0">HR of Lorem Ipsum</p>
</div>
<div class="col-md-8">
  <p class="text-neutral-400 text-lg m-0">IBAN Number</p>
    <p class="text-black m-0">HR of Lorem Ipsum</p>
</div>       

</div>

</div>



  </div>
</div>
@endsection