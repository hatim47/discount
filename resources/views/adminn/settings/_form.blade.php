<form action="{{ route('settings.update', $settingsa->id) }}" method="POST">
    @csrf
    @method('PUT')


<div class="row gy-3"> 

    <div class="mb-3">
    <label class="form-label">Logo favicon</label>
    <div class="input-group">
        <input id="favi" class="form-control" type="text" value="{{ old('favicon', $settingsa->favicon) }}"  name="favicon" >
        <span class="input-group-btn">
         <button id="lfm" data-input="favi" data-preview="holder" class="btn btn-primary">
                Choose
            </button>
        </span>
    </div>

    <div id="logo-holder" style="margin-top:15px;max-height:100px;">
        @if($settingsa->favicon)
            <img src="{{ $settingsa->favicon }}" width="80" class="mt-2">
        @endif
    </div>
</div>
    <div class="mb-3">
    <label class="form-label">Logo</label>
    <div class="input-group">
        <input id="logo" class="form-control" type="text" value="{{ old('web_logo', $settingsa->web_logo) }}"  name="web_logo" >
        <span class="input-group-btn">
         <button id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary">
                Choose
            </button>
        </span>
    </div>

    <div id="logo-holder" style="margin-top:15px;max-height:100px;">
        @if($settingsa->web_logo)
            <img src="{{ $settingsa->web_logo }}" width="80" class="mt-2">
        @endif
    </div>
</div>
        <div class="col-sm-6">
            <label class="form-label">Website Name*</label>
                <div class="position-relative">   
                    <input type="text" class="form-control wizard-required"  value="{{ old('web_name', $settingsa->web_name) }}"  name="web_name" placeholder="Enter Heading " >
                    <div class="wizard-form-error"></div>
                </div>
        </div>
  <div class="col-sm-6"></div>
    <h6 class="text-md text-neutral-500">home page </h6>
     <div class="col-sm-12">
                                    <label class="form-label">Home About*</label>
                                    <div class="position-relative">
                                    <textarea id="editor2" name="home_about" class="form-control" rows="8">{{ $settingsa->home_about }}</textarea>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    </div>
                                         <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('home_m_tiitle', $settingsa->home_m_tiitle) }}"  name="home_m_tiitle" placeholder="Enter Title" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('home_m_descrip', $settingsa->home_m_descrip) }}"  name="home_m_descrip" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>


 <div class="col-sm-4">
                                                <label class="form-label">Street Address </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="streetAddress" value="{{ old('streetAddress', $settingsa->streetAddress) }}" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                    <div class="col-sm-4">
                                                <label class="form-label">Address Locality</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="addressLocality" value="{{ old('addressLocality', $settingsa->addressLocality) }}" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                 <div class="col-sm-4">
                                                <label class="form-label">Address Region </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="addressRegion" value="{{ old('addressRegion', $settingsa->addressRegion) }}" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                    <div class="col-sm-4">
                                                <label class="form-label">Postal Code</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="postalCode" value="{{ old('postalCode', $settingsa->postalCode) }}" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                      <div class="col-sm-4">
                                                <label class="form-label">Address Country</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="addressCountry" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-4">              
                                                <label class="form-label">Language </label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="lange" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>


                                                <h6 class="text-md text-neutral-500">Category page </h6>
                                      <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('cate_m_tiitle', $settingsa->cate_m_tiitle) }}"  name="cate_m_tiitle" placeholder="Enter Title" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                       </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('cate_m_descrip', $settingsa->cate_m_descrip) }}"  name="cate_m_descrip" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <h6 class="text-md text-neutral-500">Contact page </h6>
                                    <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('contact_m_tiitle', $settingsa->contact_m_tiitle) }}"  name="contact_m_tiitle" placeholder="Enter Title" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                    </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('contact_m_descrip', $settingsa->contact_m_descrip) }}"  name="contact_m_descrip" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                             <h6 class="text-md text-neutral-500">store menu page </h6>
                                    <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('store_m_tiitle', $settingsa->store_m_tiitle) }}"  name="store_m_tiitle" placeholder="Enter Title" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                    </div>
                                   <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('store_m_descrip', $settingsa->store_m_descrip) }}"  name="store_m_descrip" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                  </div>

   <div class="col-sm-6">  <h6 class="text-md text-neutral-500">store filtter menu page </h6>
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('stores_m_tiitle', $settingsa->stores_m_tiitle) }}"  name="stores_m_tiitle" placeholder="Enter Title" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('stores_m_descrip', $settingsa->stores_m_descrip) }}"  name="stores_m_descrip" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                   </div>                   
                   <h6 class="text-md text-neutral-500">Feature menu page </h6>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Title*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="featuer_m_tiitle" value="{{ old('featuer_m_tiitle', $settingsa->featuer_m_tiitle) }}" placeholder="Enter Title" >
                            <div class="wizard-form-error"></div>
                        </div>
                     </div>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Description*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="featuer_m_descrip" value="{{ old('featuer_m_descrip', $settingsa->featuer_m_descrip) }}" placeholder="Enter Description" >
                            <div class="wizard-form-error"></div>
                        </div>
                    </div> 
  <h6 class="text-md text-neutral-500">event menu page</h6>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Title*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="event_m_tiitle" value="{{ old('event_m_tiitle', $settingsa->event_m_tiitle) }}" placeholder="Enter Title" >
                            <div class="wizard-form-error"></div>
                        </div>
                     </div>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Description*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="event_m_tiitle" value="{{ old('event_m_tiitle', $settingsa->event_m_tiitle) }}" placeholder="Enter Description" >
                            <div class="wizard-form-error"></div>
                        </div>
                    </div> 




                       <h6 class="text-md text-neutral-500">Advertise menu page </h6>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Title*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="advertise_m_tiitle" value="{{ old('advertise_m_tiitle', $settingsa->advertise_m_tiitle) }}" placeholder="Enter Title" >
                            <div class="wizard-form-error"></div>
                        </div>
                     </div>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Description*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="advertise_m_descrip" value="{{ old('advertise_m_descrip', $settingsa->advertise_m_descrip) }}" placeholder="Enter Description" >
                            <div class="wizard-form-error"></div>
                        </div>
                    </div>
                       <div class="col-sm-12">
                        <label class="form-label">Advertise Contect*</label>
                        <div class="position-relative">
                         <textarea id="editor1" name="advertise_contect" class="form-control" rows="8">{{ $settingsa->advertise_contect }}</textarea>
                            <div class="wizard-form-error"></div>
                        </div>
                    </div>
<h4 class="text-md text-neutral-500">Inspired page</h4>
<div class="col-sm-6">
                        <label class="form-label">Meta Title*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="inspired_m_tiitle" value="{{ old('inspired_m_tiitle', $settingsa->inspired_m_tiitle) }}" placeholder="Enter Title" >
                            <div class="wizard-form-error"></div>
                        </div>
                     </div>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Description*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="inspired_m_descrip" value="{{ old('inspired_m_descrip', $settingsa->inspired_m_descrip) }}" placeholder="Enter Description" >
                            <div class="wizard-form-error"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Heading *</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="inspired_heading" value="{{ old('inspired_heading', $settingsa->inspired_heading) }}" placeholder="Enter Title" >
                            <div class="wizard-form-error"></div>
                        </div>
                     </div>
                    <div class="col-sm-6">
                        <label class="form-label">Heading Description*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="inspired_subheading" value="{{ old('inspired_subheading', $settingsa->inspired_subheading) }}" placeholder="Enter Description" >
                            <div class="wizard-form-error"></div>
                        </div>
                    </div>

                    <h4 class="text-md text-neutral-500">Student Offer Page</h4>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Title*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="studentt_m_tiitle" value="{{ old('studentt_m_tiitle', $settingsa->studentt_m_tiitle) }}" placeholder="Enter Title" >
                            <div class="wizard-form-error"></div>
                        </div>
                     </div>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Description*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="studentt_m_descrip" value="{{ old('studentt_m_descrip', $settingsa->studentt_m_descrip) }}" placeholder="Enter Description" >
                            <div class="wizard-form-error"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Title*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="studentt_heading" value="{{ old('studentt_heading', $settingsa->studentt_heading) }}" placeholder="Enter Title" >
                            <div class="wizard-form-error"></div>
                        </div>
                     </div>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Description*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="studentt_subheading" value="{{ old('studentt_subheading', $settingsa->studentt_subheading) }}" placeholder="Enter Description" >
                            <div class="wizard-form-error"></div>
                        </div>
                    </div>



 <div class="col-4">
                            <label class="form-label">Tiwtter</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="mingcute:social-x-fill" ><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="twitter" value="{{ old('twitter', json_decode($settingsa->socails, true)['twitter'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

 <div class="col-4">
                            <label class="form-label">Youtube</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="typcn:social-youtube"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="youtube" value="{{ old('youtube', json_decode($settingsa->socails, true)['youtube'] ?? 'No URL') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Pinterest</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon  icon="ion:social-pinterest"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="pinterest" value="{{ old('pinterest', json_decode($settingsa->socails, true)['pinterest'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Linkedin</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-linkedin"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="lnikedin" value="{{ old('linkedin', json_decode($settingsa->socails, true)['linkedin'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Facebook</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-facebook"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="facebook" value="{{ old('facebook', json_decode($settingsa->socails, true)['facebook'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>


                         <div class="col-4">
                            <label class="form-label">Instagram</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="typcn:social-instagram"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="instagram" value="{{ old('instagram', json_decode($settingsa->socails, true)['instagram'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Tiktok</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="streamline-flex:tiktok-solid"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="tiktok" value="{{ old('tiktok', json_decode($settingsa->socails, true)['tiktok'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>
                               
                              
                         <div class="col-4">
                            <label class="form-label">snapchat</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-snapchat"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="snapchat" value="{{ old('snapchat', json_decode($settingsa->socails, true)['snapchat'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>  

                                             <div class="col-sm-6">
                                                <label class="form-label">Header js </label>
                                                <div class="position-relative">
                                                        <textarea  name="seoheader" class="form-control" rows="8"> {{ $settingsa->seoheader ?? ' ' }} </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Footer js </label>
                                                <div class="position-relative">
                                                        <textarea  name="seofooter" class="form-control" rows="8">{{ $settingsa->seofooter ?? ' ' }}</textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                           <div class="col-sm-12">
                                                <label class="form-label">keyword*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" name="keyword" placeholder="Enter Title" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>


                     <div class="col-sm-12"></div>
                         </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
