<form action="{{ route('coupon.update', $coupon->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="row gy-3">
<div class="col-12">
    <div class="mb-3">
        <label class="form-label">Status</label>
        <div class="d-flex gap-3">
            <div class="form-check">
                <input 
                    class="form-check-input" 
                    type="radio" 
                    name="status" 
                    id="status_active" 
                    value="active"
                    {{ $coupon->status == 'active' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_active">Active</label>
            </div>
            
            <div class="form-check">
                <input 
                    class="form-check-input" 
                    type="radio" 
                    name="status" 
                    id="status_inactive" 
                    value="inactive"
                    {{ $coupon->status == 'inactive' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_inactive">Inactive</label>
            </div>
        </div>
    </div>
</div>
           <div class="col-sm-4">
                                               <label class="form-label">Coupon Name</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="title" placeholder="Enter Coupon Name" value="{{ old('title', $coupon->title) }}" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
       <div class="col-sm-4">
                                                <label class="form-label">Coupon Discount*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="discount" value="{{ old('discount', $coupon->discount) }}" placeholder="Enter Coupon Discount" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">Coupon Code*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="code" value="{{ old('code', $coupon->code) }}" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                             <div class="col-sm-6">
                                                <label class="form-label">Coupon Link*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="link" value="{{ old('link', $coupon->link) }}"  >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
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
    <div class="row gy-3">
                 <label class="form-label">Select one or more tags to highlight this coupon (e.g., Trending, Featured, Recommended, Deals, Verified, Exclusive).</label>

                         <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

    <input type="checkbox" class="btn-check" name="trend" id="btncheck1"
        {{ $coupon->trend ? 'checked' : '' }}>
    <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck1">Trending</label>

    <input type="checkbox" class="btn-check" name="feature" id="btncheck11"
        {{ $coupon->feature ? 'checked' : '' }}>
    <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck11">Featured</label>

    <input type="checkbox" class="btn-check" name="recom" id="btncheck12"
        {{ $coupon->recom ? 'checked' : '' }}>
    <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck12">Recommended</label>

    <input type="checkbox" class="btn-check" name="deals" id="btncheck2"
        {{ $coupon->deals ? 'checked' : '' }}>
    <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck2">Deals</label>

    <input type="checkbox" class="btn-check" name="verified" id="btncheck3"
        {{ $coupon->verified ? 'checked' : '' }}>
    <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck3">Verified</label>

    <input type="checkbox" class="btn-check" name="exclusive" id="btncheck31"
        {{ $coupon->exclusive ? 'checked' : '' }}>
    <label class="btn btn-outline-primary-600 px-20 py-11 radius-8" for="btncheck31">Exclusive</label>

</div>

  <div class="col-12">
                                                <label class="form-label">Terms Conditions</label>
                                                <div class="position-relative">
                                                        <textarea id="editor2" name="trems" class="form-control" rows="8"> {{$coupon->trems}}</textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div> 
                                             <div class="col-sm-4">
                                                <label class="form-label">Select Store Name*</label>
                                                <div class="position-relative">
                                                    
                                            <select name="store_id" class="form-control radius-8 form-select wizard-required" id="depart" >
                                                 @foreach($stores as $category)
                                                      <option value="{{ $category->id }}" 
                                                        {{ $coupon->store_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                        </option>
                                                     @endforeach
                                            </select>                                      
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            
                                              <div class="col-sm-4">
                                                <label class="form-label">Select Event Name*</label>
                                                <div class="position-relative">
                                                    
                                            <select name="event_id" class="form-control radius-8 form-select wizard-required" id="depart" >
                                                  <option value=" ">No Event</option> 
                                                 @foreach($event as $category)
                                                                                                   
                                                        <option value="{{ $category->id }}" 
                                                        {{ $coupon->event_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}
                                                        </option>
                                                     @endforeach
                                            </select>                                      
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                               <div class="col-sm-4">
                                                <label class="form-label">Select Dynamic Page Name*</label>
                                                <div class="position-relative">
                                                    
                                            <select name="dyna_id" class="form-control radius-8 form-select wizard-required" id="dynapage" >
                                                 @foreach($dynapage as $category)
                                                  <option value=" ">No Dynamic Page</option>
                                                    
                                                           <option value="{{ $category->id }}" 
                                                        {{ $coupon->dyna_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                        </option>
                                                     @endforeach
                                            </select>                                      
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>

</div>




<button type="submit" class="btn btn-success">Save</button>
</form>
