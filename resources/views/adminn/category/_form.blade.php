<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Category Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}" required>
    </div>
<div class="mb-3">
    <label class="form-label">Logo</label>
    <div class="input-group">
        <input id="logo" class="form-control" type="text" name="logo" value="{{ old('logo', $category->logo) }}">
        <span class="input-group-btn">
         <button id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary">
                Choose
            </button>
        </span>
    </div>
    <div id="logo-holder" style="margin-top:15px;max-height:100px;">
        @if($category->logo)
            <img src="{{ $category->logo }}" width="80" class="mt-2">
        @endif
    </div>
</div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
