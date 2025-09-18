<form action="{{ route('coupon.update', $coupon->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Category Name</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $coupon->title) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" name="code" class="form-control" value="{{ old('code', $coupon->code) }}" required>
    </div>
<div class="mb-3">
    <label class="form-label">Logo</label>
    <div class="input-group">
        <input id="logo" class="form-control" type="text" name="image" value="{{ old('image', $coupon->image) }}">
        <span class="input-group-btn">
         <button id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary">
                Choose
            </button>
        </span>
    </div>
    <div id="logo-holder" style="margin-top:15px;max-height:100px;">
        @if($coupon->image)
            <img src="{{ $coupon->image }}" width="80" class="mt-2">
        @endif
    </div>
</div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
