<form action="{{ route('event.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Category Name</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug', $event->slug) }}" required>
    </div>
<div class="mb-3">
    <label class="form-label">Logo</label>
    <div class="input-group">
        <input id="logo" class="form-control" type="text" name="banner" value="{{ old('banner', $event->banner) }}">
        <span class="input-group-btn">
         <button id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary">
                Choose
            </button>
        </span>
    </div>
  <div class="mb-3">
        <label class="form-label">Meta Title</label>
        <input type="text" name="m_tiitle" class="form-control" value="{{ old('m_tiitle', $event->m_tiitle) }}" required>
    </div>
     <div class="mb-3">
        <label class="form-label">Meta Description</label>
        <input type="text" name="m_descrip" class="form-control" value="{{ old('m_descrip', $event->m_descrip) }}" required>
    </div>


  <div class="position-relative">   
                                 <textarea id="editor1" name="description" class="form-control" rows="4">{{ $event->description }} </textarea>
                                                        <div class="wizard-form-error"></div>
                                                </div>





    <div id="logo-holder" style="margin-top:15px;max-height:100px;">
        @if($event->banner)
            <img src="{{ $event->banner }}" width="80" class="mt-2">
        @endif
    </div>
</div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
