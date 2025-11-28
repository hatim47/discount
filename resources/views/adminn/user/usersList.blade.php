@extends('adminn.layout.layout')
@php
    $title='Basic Table';
    $subTitle = 'Basic Table';
    $script = '<script>
                    let table = new DataTable("#dataTable");
                   
               </script> ';
@endphp

@section('content')

            <div class="card basic-data-table">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">User Datatables</h5>
                    <a href="{{ route('store.create') }}" class="btn btn-success-900  radius-8 px-16 py-9" style="max-width: fit-content;">Add user</a>
                </div> 
                <div class="card-body">
                    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="form-check style-check d-flex align-items-center">
                                        {{-- <input class="form-check-input" type="checkbox"> --}}
                                        <label class="form-check-label">
                                         Id
                                        </label>
                                    </div>
                                </th>
                            <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                {{-- <th scope="col">Status</th> --}}
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- <tr>
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
                            </tr> --}}
                               @foreach ($stores as $store)
                <tr>
                   
                    <td>{{ $store->id }}</td>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->email}}</td>

{{-- <td> {{ $store->status == 1 ? 'Active' : 'Inactive' }} </td> --}}

<td>
{{-- <a href="{{ route('store.edit', $store->id) }}" 
data-id="{{ $store->id }}" class=" w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                    <iconify-icon icon="lucide:edit"></iconify-icon>

</a> --}}
    <form action="{{ route('users.destroy', $store->id) }}" method="POST" style="display:inline" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm w-32-px h-32-px bg-danger-focus text-danger-main d-inline-flex align-items-center justify-content-center" onclick="return confirm('Delete this store?')"> <iconify-icon icon="mingcute:delete-2-line"></iconify-icon></button>
    </form>


</td>
</tr>
@endforeach
    </tbody>
</table>
</div>
</div>
<!-- Edit Category Modal -->

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

$(document).on("click", ".edit-btn", function () {
    let id = $(this).data("id");
    let url = "{{ route('store.edit', ':id') }}".replace(":id", id);

    fetch(url)
        .then(res => res.text())
        .then(html => {
            $("#editCategoryBody").html(html);
            initLfmButtons();
            new bootstrap.Modal(document.getElementById("editCategoryModal")).show();
        })
        .catch(err => console.error(err));
});

$(document).on("submit", "#editStoreForm", function (e) {
    e.preventDefault();

    let form = $(this);
    let url = form.attr("action");
    let table = $('#yourTableId').DataTable(); // <-- your table id

    fetch(url, {
        method: "POST",
        body: new FormData(form[0]),
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            // Hide modal
            bootstrap.Modal.getInstance(document.getElementById("editCategoryModal")).hide();

            let store = data.store;

            // Find row in DataTable
            let row = table.row($(`a.edit-btn[data-id='${store.id}']`).closest("tr"));

            // Update row data
            row.data([
                store.id,
                store.name,
                store.slug,
                store.logo 
                    ? `<img src="${store.logo}" alt="Logo" width="40">` 
                    : "No Image",
                store.status == 1 ? "Active" : "Inactive",
                store.created_at,
                `
                <a href="javascript:void(0)" 
                   data-id="${store.id}" 
                   class="edit-btn w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                    <iconify-icon icon="lucide:edit"></iconify-icon>
                </a>
                <form action="/categories/${store.id}" method="POST" class="delete-form d-inline">
                    <input type="hidden" name="_token" value="${form.find("input[name=_token]").val()}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-sm w-32-px h-32-px bg-danger-focus text-danger-main d-inline-flex align-items-center justify-content-center">
                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                    </button>
                </form>
                `
            ]).draw(false); // ✅ redraw without resetting page
        }
    })
    .catch(err => console.error(err));
});






</script>
@endpush