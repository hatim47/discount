@extends('adminn.layout.layout')
@php
    $title='Basic Table';
    $subTitle = 'Basic Table';
    $script = '<script>
                    let table = new DataTable("#dataTable");
               </script>
<script src="'.asset('vendor/laravel-filemanager/js/stand-alone-button.js').'"></script>
               ';
@endphp

@section('content')

            <div class="card basic-data-table">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Pages Datatables</h5>
                    <a href="{{ route('dynapage.create') }}" class="btn btn-success-900  radius-8 px-16 py-9" style="max-width: fit-content;">Add Page</a>
                </div> 
                <div class="card-body">
                    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            Id
                                        </label>
                                    </div>
                                </th>
                            <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">page banner</th>
                                <th scope="col">Staus</th>
                                <th scope="col">Regoin</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                       
                               @foreach ($events as $store)
                <tr>
                    <td>{{ $store->id }}</td>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->slug }}</td>
                    <td>
                        @if($store->banner)
                            <img src="{{$store->banner}}" alt="Logo" width="40">
                        @else
                            No Image
                        @endif
                    </td>
                   <td> {{ $store->status == 1 ? 'Active' : 'Inactive' }} </td>
                    <td> {{ $store->region->id == $store->dyna_region  ? $store->region->title : '' }} </td>
                    <td>
                    <a href="javascript:void(0)" 
           data-id="{{ $store->id }}" class="edit-btn w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
           
        </a>
                        <form action="{{ route('dynapage.destroy', $store->id) }}" method="POST" style="display:inline" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
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
                <h5 class="modal-title">Edit dynapage</h5>
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
var route_prefix = "{{ url('/laravel-filemanager') }}";

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
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".edit-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            let id = this.getAttribute("data-id");
 let url = "{{ route('dynapage.edit', ':id') }}";
        url = url.replace(':id', id);
                fetch(url)
                .then(res => res.text())
                .then(html => {
                    document.getElementById("editCategoryBody").innerHTML = html;
                    initLfmButtons();
                    new bootstrap.Modal(document.getElementById("editCategoryModal")).show();

                     document.getElementById("editCategoryModal")
                        .addEventListener("shown.bs.modal", function () {
                            initEditor('#editor1');
                            initEditor('#editor2');
                        }, { once: true });
                })
                .catch(err => console.error(err));
        });
    });
});
</script>
@endpush