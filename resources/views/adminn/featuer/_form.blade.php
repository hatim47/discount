<form action="{{ route('featuer.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')




  <div class="mb-3">
        <label class="form-label">Meta Title</label>
        <input type="text" name="titel" class="form-control" value="{{ old('titel', $event->titel) }}" >
    </div>
     <div class="mb-3">
        <label class="form-label">Meta Description</label>
        <input type="text" name="descr" class="form-control" value="{{ old('descr', $event->descr) }}" >
    </div>


    <div class="position-relative"> 
            <label class="form-label">Description Below of coupons</label>
                <textarea id="editor3" name="content" class="form-control" rows="4">{{ $event->contents }} </textarea>
              
                </div>


    <button type="submit" class="btn btn-success">Save</button>
</form>
