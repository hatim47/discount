<form action="{{ route('about.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')
 <div class="row gy-3">
     <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="m_tiitle" placeholder="Enter Title" value="{{ old('m_tiitle', $event->m_tiitle) }}" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('m_descrip', $event->m_descrip) }}" name="m_descrip" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">About Heading Main*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('heading1', $event->heading1) }}" name="heading1" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="form-label">About Heading Second*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('heading2', $event->heading2) }}"  name="heading2" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                             <div class="col-sm-6">
                                                 <label class="form-label">About Heading Second Sub heading*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('head2sub1', $event->head2sub1) }}" name="head2sub1" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading Second Sub text*</label>
                                                <div class="position-relative">                                                  
                                                <textarea  name="head2sub1text" class="form-control" rows="4">{{$event->head2sub1text}} </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                 <label class="form-label">About Heading Second Sub heading 2*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('head2sub2', $event->head2sub2) }}" name="head2sub2" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading Second Sub text 2*</label>
                                                <div class="position-relative">                                                  
                                            <textarea  name="head2sub2text" class="form-control" rows="4">{{$event->head2sub2text}} </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            
                                            
 <div class="col-sm-6">
                                                 <label class="form-label">About Heading Second Sub heading 3*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('head2sub3', $event->head2sub3) }}" name="head2sub3" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading Second Sub text 3*</label>
                                                <div class="position-relative">
                                                  
                                          <textarea  name="head2sub3text" class="form-control" rows="4">{{$event->head2sub3text}} </textarea>

                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
  <div class="col-sm-6">
                                                 <label class="form-label">About Heading third *</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('heading3', $event->heading3) }}" name="heading3" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                               <div class="col-sm-6">
                                                <label class="form-label">About Heading third text *</label>
                                                <div class="position-relative">
                                                  
                                          <textarea  name="heading3text" class="form-control" rows="4"> {{$event->heading3text}}</textarea>

                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
 <div class="col-sm-6">
                                                 <label class="form-label">About Heading third Sub heading 1*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('head3sub1', $event->head3sub1) }}" name="head3sub1" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading third Sub text 1*</label>
                                                <div class="position-relative">
                                          <textarea  name="head3sub1text" class="form-control" rows="4">{{$event->head3sub1text}} </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">About Heading third Sub heading 2*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('head3sub2', $event->head3sub2) }}" name="head3sub2" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading third Sub text 2*</label>
                                                <div class="position-relative">
                                          <textarea  name="head3sub2text" class="form-control" rows="4">{{$event->head3sub2text}} </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                 <label class="form-label">About Heading third Sub heading 3*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('head3sub3', $event->head3sub3) }}" name="head3sub3" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-6">
                                                <label class="form-label">About Heading third Sub text 3*</label>
                                                <div class="position-relative">
                                                 <textarea  name="head3sub3text" class="form-control" rows="4">{{$event->head3sub3text}} </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                             <div class="col-sm-6">
                                                 <label class="form-label">About Heading Fourth heading *</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('heading4', $event->heading4) }}" name="heading4" placeholder="Enter Event Name" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">About Heading Fourth text *</label>
                                                <div class="position-relative">                                                  
                                                <textarea  name="heading4text" class="form-control" rows="4"> {{$event->heading4text}}</textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>





</div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
