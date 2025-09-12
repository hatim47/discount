@extends('adminn.layout.layout')
@php
    $title='Basic Table';
    $subTitle = 'Basic Table';
    $script = '<script>
                    let table = new DataTable("#dataTable");
               </script>
               <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
               ';
@endphp

@section('content')

            <div class="card basic-data-table">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Category Datatables</h5>
                    <a href="{{ route('cate.add') }}" class="btn btn-success-900  radius-8 px-16 py-9" style="max-width: fit-content;">Add Category</a>
                </div> 
                <div class="card-body">
                    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
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
                            <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Issued Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>21243243</td>
                                <td><a  href="javascript:void(0)" class="text-primary-600">#526534</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/user-list/user-list1.png') }}" alt="" class="flex-shrink-0 me-12 radius-8">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">Kathryn Murphy</h6>
                                    </div>
                                </td>
                                <td>25 Jan 2024</td>
                                <td>$200.00</td>
                                <td> <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span> </td>
                                <td>
                                    <a  href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                    </a>
                                    <a  href="javascript:void(0)" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a>
                                    <a  href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                               @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        @if($category->logo)
                            <img src="{{ Storage::url($category->logo) }}" alt="Logo" width="40">
                        @else
                            No Image
                        @endif
                    </td>
                   <td> {{ $category->status == 1 ? 'Active' : 'Inactive' }} </td>
                    <td> {{ $category->created_at->format('d M Y') }} </td>
                    <td>
                    <a href="javascript:void(0)" 
           data-id="{{ $category->id }}" class="edit-btn w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
           
        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm w-32-px h-32-px bg-danger-focus text-danger-main d-inline-flex align-items-center justify-content-center" onclick="return confirm('Delete this category?')"> <iconify-icon icon="mingcute:delete-2-line"></iconify-icon></button>
                        </form>


                    </td>
                </tr>
                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="editCategoryBody">
                <!-- The edit form will be loaded here -->
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script>
var route_prefix = "/laravel-filemanager";

function initLfmButtons() {
    if (typeof $ === "undefined") {
        console.error("jQuery not loaded.");
        return;
    }
    if (typeof $.fn.filemanager !== "function") {
        console.error("stand-alone-button.js not loaded.");
        return;
    }

    // Initialize every LFM button inside the page
    $("[id^='lfm']").filemanager("image", { prefix: route_prefix });
}

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".edit-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            let id = this.getAttribute("data-id");

            fetch(`/admin/categories/${id}/edit`)
                .then(res => res.text())
                .then(html => {
                    document.getElementById("editCategoryBody").innerHTML = html;
                    initLfmButtons();
                    new bootstrap.Modal(document.getElementById("editCategoryModal")).show();
                })
                .catch(err => console.error(err));
        });
    });
});
</script>
@endpush