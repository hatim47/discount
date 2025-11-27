<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
     <div class="row gy-3">
     <div class="col-6">
<div class="mb-3">
    <label class="form-label">This Active in Menu  </label>
    <div class="form-switch switch-primary d-flex align-items-center gap-3">
        <input 
            class="form-check-input" 
            type="checkbox" 
            role="switch" 
            id="switch1" 
            name="is_menu"
            value="1"
            {{ $category->is_menu == 1 ? 'checked' : '' }}>
            
        <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch1">
            Menu Active
        </label>
    </div>
  
</div>
</div>
   <div class="col-6">
<div class="mb-3">
    <label class="form-label"> Status </label>
    <div class="form-switch switch-primary d-flex align-items-center gap-3">
       <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch1">Hide</label>
        <input 
            class="form-check-input" 
            type="checkbox" 
            role="switch" 
            id="switch1" 
            name="status"
            value="1"
            {{ $category->status == 1 ? 'checked' : '' }}>
            
        <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch1">
            Show / Active
        </label>
    </div>
  
</div>
</div>


</div>

    <div class="mb-3">
        <label class="form-label">Category Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}" required>
    </div>
 <div class="mb-3">
        <label class="form-label">SEO URL</label>
        <input type="text" name="url" class="form-control" value="{{ old('url', $category->url) }}" required>
    </div>
   
    <div class="mb-3">
        <label class="form-label">Meta Title</label>
        <input type="text" name="m_title" class="form-control" value="{{ old('m_title', $category->m_title) }}" required>
    </div>
     <div class="mb-3">
        <label class="form-label">Meta Description</label>
        <input type="text" name="m_descrip" class="form-control" value="{{ old('m_descrip', $category->m_descrip) }}" required>
    </div>
  <div class="position-relative">   
    <label class="form-label">Short Description</label>
                                 <textarea id="editor1" name="shrt_content" class="form-control" rows="4">{{ $category->shrt_content }} </textarea>
                                                        <div class="wizard-form-error"></div>
                                                </div>
                   <div class="position-relative">
                       <label class="form-label">Long Description</label>

                                                        <textarea id="editor2" name="long_content" class="form-control" rows="8">{{ $category->long_content }}</textarea>

                                                    <div class="wizard-form-error"></div>
                                                </div>


    <button type="submit" class="btn btn-success">Save</button>
</form>
