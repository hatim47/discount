@extends('admin.layout.layout')

@php
    $heading ='Attendance';
    $style ='';
    $script = "<script>
    var table = new DataTable('#dataTable', {
    dom: 'frtlp'
    });
    </script>";
@endphp

@section('content')
            <div class="card">
                <div class="card-header">
                <h3 class="card-title mt-3">Attendance Tables</h3>
                </div>
                <div class="card-body"> 

                   <div class="card-body p-24 pt-10">
                            <ul class="nav button-tab nav-pills  mb-16" id="pills-tab-four" role="tablist">
                                <li class="nav-item w-25 d-flex flex-column align-items-center" role="presentation">
                                    <span class="line-height-1 text-white px-4 py-1 m-2 radius-4 bg-primary-600">6:00 PM To 3:00 AM</span>
                                    <button class="nav-link d-flex align-items-center border justify-content-center gap-2 fw-semibold text-primary-light w-75 radius-4 px-16 py-10 active" id="pills-button-icon-home-tab" data-bs-toggle="pill" data-bs-target="#pills-button-icon-home" type="button" role="tab" aria-controls="pills-button-icon-home" aria-selected="true">
                                    
                                        <span class="line-height-1 ">Developers</span>
                                    </button>
                                </li>
                                <li class="nav-item w-25 d-flex flex-column align-items-center" role="presentation">
                                    <span class="line-height-1 text-white py-1 px-4 m-2 radius-4 bg-primary-600">9:00 PM To 6:00 AM</span>
                                    <button class="nav-link d-flex align-items-center gap-2 border justify-content-center fw-semibold text-primary-light w-75 radius-4 px-16 py-10" id="pills-button-icon-details-tab" data-bs-toggle="pill" data-bs-target="#pills-button-icon-details" type="button" role="tab" aria-controls="pills-button-icon-details" aria-selected="false">
                                       
                                        <span class="line-height-1">Graphic Designers</span>
                                    </button>
                                </li>
                                <li class="nav-item w-25 d-flex flex-column align-items-center" role="presentation">
                                     <span class="line-height-1 text-white py-1 px-4 m-2 radius-4 bg-primary-600">9:00 PM To 6:00 AM</span>
                                    <button class="nav-link d-flex align-items-center gap-2 border justify-content-center fw-semibold text-primary-light w-75 radius-4 px-16 py-10" id="pills-button-icon-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-button-icon-profile" type="button" role="tab" aria-controls="pills-button-icon-profile" aria-selected="false">
                                      
                                        <span class="line-height-1">Ui/Ux Designers</span>
                                    </button>
                                </li>
                                <li class="nav-item w-25 d-flex flex-column align-items-center" role="presentation">
                                     <span class="line-height-1 text-white py-1 px-4 m-2 radius-4 bg-primary-600">6:00 PM To 3:00 AM</span>
                                    <button class="nav-link d-flex align-items-center gap-2 border justify-content-center fw-semibold text-primary-light w-75 radius-4 px-16 py-10" id="pills-button-icon-settings-tab" data-bs-toggle="pill" data-bs-target="#pills-button-icon-settings" type="button" role="tab" aria-controls="pills-button-icon-settings" aria-selected="false">
                                        
                                        <span class="line-height-1">Digital Marketing</span>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tab-fourContent">
                                <div class="tab-pane fade show active" id="pills-button-icon-home" role="tabpanel" aria-labelledby="pills-button-icon-home-tab" tabindex="0">
                                <table class="table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            S.L
                                        </label>
                                    </div>
                                </th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Name</th>
                                <th scope="col">Issued Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            01
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526534</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                      <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Kathryn Murphy</h6>
                                    </div>
                                </td>
                                <td>25 Jan 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                         <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            02
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#696589</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Annette Black</h6>
                                    </div>
                                </td>
                                <td>25 Jan 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class="text-primary-600 d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            03
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list3.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Ronald Richards</h6>
                                    </div>
                                </td>
                                <td>10 Feb 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            04
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526587</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Eleanor Pena</h6>
                                    </div>
                                </td>
                                <td>10 Feb 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                    <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            05
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#105986</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list5.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Leslie Alexander</h6>
                                    </div>
                                </td>
                                <td>15 March 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-warning text-warning-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Pending </td>
                                <td>
                                    <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            06
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526589</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list6.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Albert Flores</h6>
                                    </div>
                                </td>
                                <td>15 March 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            07
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526520</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list7.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Jacob Jones</h6>
                                    </div>
                                </td>
                                <td>27 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            08
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list8.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Jerome Bell</h6>
                                    </div>
                                </td>
                                <td>27 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-warning text-warning-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Pending </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            09
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#200257</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list9.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Marvin McKinney</h6>
                                    </div>
                                </td>
                                <td>30 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            10
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526525</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list10.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Cameron Williamson</h6>
                                    </div>
                                </td>
                                <td>30 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                    <a  href="javascript:void(0)" class="text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600"></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>                            
                        </tbody>
                    </table> 
                                </div>
                                <div class="tab-pane fade" id="pills-button-icon-details" role="tabpanel" aria-labelledby="pills-button-icon-details-tab" tabindex="0">
                                  <table class="table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            S.L
                                        </label>
                                    </div>
                                </th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Name</th>
                                <th scope="col">Issued Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            01
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526534</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                      <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Kathryn Murphy</h6>
                                    </div>
                                </td>
                                <td>25 Jan 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                         <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            02
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#696589</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Annette Black</h6>
                                    </div>
                                </td>
                                <td>25 Jan 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class="text-primary-600 d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            03
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list3.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Ronald Richards</h6>
                                    </div>
                                </td>
                                <td>10 Feb 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            04
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526587</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Eleanor Pena</h6>
                                    </div>
                                </td>
                                <td>10 Feb 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                    <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            05
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#105986</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list5.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Leslie Alexander</h6>
                                    </div>
                                </td>
                                <td>15 March 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-warning text-warning-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Pending </td>
                                <td>
                                    <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            06
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526589</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list6.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Albert Flores</h6>
                                    </div>
                                </td>
                                <td>15 March 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            07
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526520</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list7.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Jacob Jones</h6>
                                    </div>
                                </td>
                                <td>27 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            08
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list8.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Jerome Bell</h6>
                                    </div>
                                </td>
                                <td>27 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-warning text-warning-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Pending </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            09
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#200257</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list9.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Marvin McKinney</h6>
                                    </div>
                                </td>
                                <td>30 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            10
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526525</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list10.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Cameron Williamson</h6>
                                    </div>
                                </td>
                                <td>30 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                    <a  href="javascript:void(0)" class="text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600"></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            
                        </tbody>
                    </table> 
                                </div>
                                <div class="tab-pane fade" id="pills-button-icon-profile" role="tabpanel" aria-labelledby="pills-button-icon-profile-tab" tabindex="0">
                                  <table class="table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            S.L
                                        </label>
                                    </div>
                                </th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Name</th>
                                <th scope="col">Issued Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            01
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526534</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                      <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Kathryn Murphy</h6>
                                    </div>
                                </td>
                                <td>25 Jan 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                         <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            02
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#696589</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Annette Black</h6>
                                    </div>
                                </td>
                                <td>25 Jan 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class="text-primary-600 d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            03
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list3.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Ronald Richards</h6>
                                    </div>
                                </td>
                                <td>10 Feb 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            04
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526587</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Eleanor Pena</h6>
                                    </div>
                                </td>
                                <td>10 Feb 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                    <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            05
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#105986</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list5.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Leslie Alexander</h6>
                                    </div>
                                </td>
                                <td>15 March 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-warning text-warning-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Pending </td>
                                <td>
                                    <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            06
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526589</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list6.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Albert Flores</h6>
                                    </div>
                                </td>
                                <td>15 March 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            07
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526520</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list7.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Jacob Jones</h6>
                                    </div>
                                </td>
                                <td>27 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            08
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list8.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Jerome Bell</h6>
                                    </div>
                                </td>
                                <td>27 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-warning text-warning-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Pending </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            09
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#200257</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list9.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Marvin McKinney</h6>
                                    </div>
                                </td>
                                <td>30 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            10
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526525</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list10.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Cameron Williamson</h6>
                                    </div>
                                </td>
                                <td>30 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                    <a  href="javascript:void(0)" class="text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600"></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            
                        </tbody>
                    </table> 
                                </div>
                                <div class="tab-pane fade" id="pills-button-icon-settings" role="tabpanel" aria-labelledby="pills-button-icon-settings-tab" tabindex="0">
                              <table class="table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            S.L
                                        </label>
                                    </div>
                                </th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Name</th>
                                <th scope="col">Issued Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            01
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526534</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                      <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Kathryn Murphy</h6>
                                    </div>
                                </td>
                                <td>25 Jan 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                         <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            02
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#696589</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Annette Black</h6>
                                    </div>
                                </td>
                                <td>25 Jan 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class="text-primary-600 d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            03
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list3.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Ronald Richards</h6>
                                    </div>
                                </td>
                                <td>10 Feb 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            04
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526587</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Eleanor Pena</h6>
                                    </div>
                                </td>
                                <td>10 Feb 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                    <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            05
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#105986</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list5.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Leslie Alexander</h6>
                                    </div>
                                </td>
                                <td>15 March 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-warning text-warning-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Pending </td>
                                <td>
                                    <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            06
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526589</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list6.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Albert Flores</h6>
                                    </div>
                                </td>
                                <td>15 March 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            07
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526520</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list7.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Jacob Jones</h6>
                                    </div>
                                </td>
                                <td>27 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            08
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list8.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Jerome Bell</h6>
                                    </div>
                                </td>
                                <td>27 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-warning text-warning-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Pending </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            09
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#200257</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list9.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Marvin McKinney</h6>
                                    </div>
                                </td>
                                <td>30 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            10
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526525</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list10.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Cameron Williamson</h6>
                                    </div>
                                </td>
                                <td>30 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                    <a  href="javascript:void(0)" class="text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600"></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            
                        </tbody>
                    </table> 
                            </div>
                        
                    {{-- <table class="table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            S.L
                                        </label>
                                    </div>
                                </th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Name</th>
                                <th scope="col">Issued Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            01
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526534</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                      <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Kathryn Murphy</h6>
                                    </div>
                                </td>
                                <td>25 Jan 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                         <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            02
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#696589</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Annette Black</h6>
                                    </div>
                                </td>
                                <td>25 Jan 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class="text-primary-600 d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            03
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list3.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Ronald Richards</h6>
                                    </div>
                                </td>
                                <td>10 Feb 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            04
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526587</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list2.png') }}" alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Eleanor Pena</h6>
                                    </div>
                                </td>
                                <td>10 Feb 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                    <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            05
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#105986</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list5.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Leslie Alexander</h6>
                                    </div>
                                </td>
                                <td>15 March 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-warning text-warning-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Pending </td>
                                <td>
                                    <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            06
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526589</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list6.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Albert Flores</h6>
                                    </div>
                                </td>
                                <td>15 March 2024</td>
                                <td>$150.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            07
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526520</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list7.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Jacob Jones</h6>
                                    </div>
                                </td>
                                <td>27 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            08
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list8.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Jerome Bell</h6>
                                    </div>
                                </td>
                                <td>27 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-warning text-warning-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Pending </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            09
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#200257</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list9.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Marvin McKinney</h6>
                                    </div>
                                </td>
                                <td>30 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                   <a  href="javascript:void(0)" class=" text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600 "></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            10
                                        </label>
                                    </div>
                                </td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526525</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list10.png') }}"  alt="" width="24" height="24" class=" flex-shrink-0 rounded-5 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Cameron Williamson</h6>
                                    </div>
                                </td>
                                <td>30 April 2024</td>
                                <td>$250.00</td>
                                <td> <span class="bg-success text-success-main p-1 m-1 rounded-pill fw-medium text-sm"></span>Paid </td>
                                <td>
                                    <a  href="javascript:void(0)" class="text-primary-600 d-inline-flex align-items-center justify-content-center">
                                          <iconify-icon icon="line-md:log-out" width="24" height="24" class="text-primary-600"></iconify-icon>
                                    </a>
                                   
                                </td>
                            </tr>
                            
                        </tbody>
                    </table> --}}
                </div>
            </div>
            
@endsection