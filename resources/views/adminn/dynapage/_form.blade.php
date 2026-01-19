<form action="{{ route('dynapage.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')
<div class="mb-3">
    <label class="form-label">This Active in Menu  </label>
    <div class="form-switch switch-primary d-flex align-items-center gap-3">
        <input 
            class="form-check-input" 
            type="checkbox" 
            role="switch" 
            id="switch1" 
            name="ismenu"
            value="1"
            {{ $event->ismenu == 1 ? 'checked' : '' }}>
            
        <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch1">
            Menu Active
        </label>
    </div>
  
</div>
    <div class="mb-3">
        <label class="form-label">Page Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $event->name) }}" required>
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
  <div class="mb-3">
        <label class="form-label">Heading</label>
        <input type="text" name="heading" class="form-control" value="{{ old('heading', $event->heading) }}" required>
    </div>

  <div class="position-relative">
    <label class="form-label">Short Description</label>   
                                 <textarea id="editor1" name="shortdiscription" class="form-control" rows="4">{{ $event->shortdiscription }} </textarea>
                                                        <div class="wizard-form-error"></div>
                                                </div>
<div class="position-relative">   
                       <label class="form-label">Long Description</label>

                                 <textarea id="editor2" name="longdiscription" class="form-control" rows="4">{{ $event->longdiscription }} </textarea>
                                                        <div class="wizard-form-error"></div>
                                                </div>
<div class="position-relative">   
                       <label class="form-label">Below Description</label>

                                 <textarea id="editor3" name="belowdiscrp" class="form-control" rows="4">{{ $event->belowdiscrp }} </textarea>
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
