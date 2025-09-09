@extends('layout.layout')

@php
    $heading ='Employee';
    $style ='
.dt-search {
  display: none !important;
}
';
$script = "<script>
document.addEventListener('DOMContentLoaded', function () {
var table = new DataTable('#dataTable', {
    dom: 'frtlp'

});
document.getElementById('customSearch').addEventListener('input', function () {
    table.search(this.value).draw();
  });

  // Job Title Filter
  document.getElementById('filterJob').addEventListener('change', function () {
    table.column(2).search(this.value).draw(); // Job Title is column index 2
  });

  // Status Filter
  document.getElementById('filterStatus').addEventListener('change', function () {
    table.column(5).search(this.value).draw(); // Status is column index 5
  });
});
</script>";
@endphp

@section('content')
            <div class="card basic-data-table">
                <div class="card-header">
                    <h5 class="card-title mb-0">Employee Tables</h5>
                </div>
                <div class="card-body">
                <div class="table-toolbar" style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 1rem;">
  <div style="display: flex; gap: 1rem;">
    <select id="filterJob" class="form-select">
      <option value="">All Job Titles</option>
      <option value="Graphic Designer">Graphic Designer</option>
      <option value="Developer">Developer</option>
      <!-- Add more -->
    </select>

    <select id="filterStatus" class="form-select">
      <option value="">Status</option>
      <option value="Onboard">Onboard</option>
      <option value="Resigned">Resigned</option>
    </select>
  </div>

  <div style="display: flex; gap: 1rem; align-items: center;">
    <input type="text" id="customSearch" class="form-control" placeholder="Search" />
    <button class="btn btn-primary">Add Employees</button>
  </div>
</div>
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
            </div>
            
@endsection