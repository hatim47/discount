<form action="{{ route('settings.update', $setting->id) }}" method="POST">
    @csrf
    @method('PUT')


<div class="row gy-3"> 

    <div class="mb-3">
    <label class="form-label">Logo favicon</label>
    <div class="input-group">
        <input id="logo" class="form-control" type="text" value="{{ old('favicon', $setting->favicon) }}"  name="favicon" >
        <span class="input-group-btn">
         <button id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary">
                Choose
            </button>
        </span>
    </div>

    <div id="logo-holder" style="margin-top:15px;max-height:100px;">
        @if($setting->favicon)
            <img src="{{ $setting->favicon }}" width="80" class="mt-2">
        @endif
    </div>
</div>
    <div class="mb-3">
    <label class="form-label">Logo</label>
    <div class="input-group">
        <input id="logo" class="form-control" type="text" value="{{ old('web_logo', $setting->web_logo) }}"  name="web_logo" >
        <span class="input-group-btn">
         <button id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary">
                Choose
            </button>
        </span>
    </div>

    <div id="logo-holder" style="margin-top:15px;max-height:100px;">
        @if($setting->web_logo)
            <img src="{{ $setting->web_logo }}" width="80" class="mt-2">
        @endif
    </div>
</div>
     <div class="col-sm-6">
                                <label class="form-label">Website Name*</label>
                                <div class="position-relative">   
                                    <input type="text" class="form-control wizard-required"  value="{{ old('web_name', $setting->web_name) }}"  name="web_name" placeholder="Enter Heading " >
                                        <div class="wizard-form-error"></div>
                                </div>
                                    </div>
  <div class="col-sm-6"></div>
    <h6 class="text-md text-neutral-500">home page </h6>


     <div class="col-sm-12">
                                    <label class="form-label">Home About*</label>
                                    <div class="position-relative">
                                    <textarea id="editor2" name="home_about" class="form-control" rows="8">{{ $setting->home_about }}</textarea>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    </div>
                                         <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('home_m_tiitle', $setting->home_m_tiitle) }}"  name="home_m_tiitle" placeholder="Enter Title" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('home_m_descrip', $setting->home_m_descrip) }}"  name="home_m_descrip" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                                <h6 class="text-md text-neutral-500">Category page </h6>
                                      <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('cate_m_tiitle', $setting->cate_m_tiitle) }}"  name="cate_m_tiitle" placeholder="Enter Title" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                       </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('cate_m_descrip', $setting->cate_m_descrip) }}"  name="cate_m_descrip" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <h6 class="text-md text-neutral-500">Contact page </h6>
                                    <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('contact_m_tiitle', $setting->contact_m_tiitle) }}"  name="contact_m_tiitle" placeholder="Enter Title" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                    </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('contact_m_descrip', $setting->contact_m_descrip) }}"  name="contact_m_descrip" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                             <h6 class="text-md text-neutral-500">store menu page </h6>
                                    <div class="col-sm-6">
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('store_m_tiitle', $setting->store_m_tiitle) }}"  name="store_m_tiitle" placeholder="Enter Title" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                    </div>
                                   <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('store_m_descrip', $setting->store_m_descrip) }}"  name="store_m_descrip" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                  </div>

   <div class="col-sm-6">  <h6 class="text-md text-neutral-500">store filtter menu page </h6>
                                                <label class="form-label">Meta Title*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('stores_m_tiitle', $setting->stores_m_tiitle) }}"  name="stores_m_tiitle" placeholder="Enter Title" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Meta Description*</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control wizard-required" value="{{ old('stores_m_descrip', $setting->stores_m_descrip) }}"  name="stores_m_descrip" placeholder="Enter Description" >
                                                    <div class="wizard-form-error"></div>
                                                </div>
                   </div>                   
                   <h6 class="text-md text-neutral-500">Feature menu page </h6>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Title*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="featuer_m_tiitle" value="{{ old('featuer_m_tiitle', $setting->featuer_m_tiitle) }}" placeholder="Enter Title" >
                            <div class="wizard-form-error"></div>
                        </div>
                     </div>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Description*</label>
                        <div class="position-relative">
                            <input type="text" class="form-control wizard-required" name="featuer_m_descrip" value="{{ old('featuer_m_descrip', $setting->featuer_m_descrip) }}" placeholder="Enter Description" >
                            <div class="wizard-form-error"></div>
                        </div>
                    </div>
 <div class="col-4">
                            <label class="form-label">Tiwtter</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="mingcute:social-x-fill" ><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="twitter" value="{{ old('twitter', json_decode($setting->socails, true)['twitter'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

 <div class="col-4">
                            <label class="form-label">Youtube</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="typcn:social-youtube"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="youtube" value="{{ old('youtube', json_decode($setting->socails, true)['youtube'] ?? 'No URL') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Pinterest</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon  icon="ion:social-pinterest"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="pinterest" value="{{ old('pinterest', json_decode($setting->socails, true)['pinterest'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Linkedin</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-linkedin"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="lnikedin" value="{{ old('linkedin', json_decode($setting->socails, true)['linkedin'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Facebook</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-facebook"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="facebook" value="{{ old('facebook', json_decode($setting->socails, true)['facebook'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>


                         <div class="col-4">
                            <label class="form-label">Instagram</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="typcn:social-instagram"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="instagram" value="{{ old('instagram', json_decode($setting->socails, true)['instagram'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>

                         <div class="col-4">
                            <label class="form-label">Tiktok</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="streamline-flex:tiktok-solid"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="tiktok" value="{{ old('tiktok', json_decode($setting->socails, true)['tiktok'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>
                               
                              
                         <div class="col-4">
                            <label class="form-label">snapchat</label>
                            <div class="input-group">
                                <span class="input-group-text bg-base">
                                    <iconify-icon icon="foundation:social-snapchat"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087c.46.11.939.11 1.398 0c.52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg></template></iconify-icon>
                                </span>
                                <input type="text" name="snapchat" value="{{ old('snapchat', json_decode($setting->socails, true)['snapchat'] ?? ' ') }}" class="form-control flex-grow-1" placeholder="No URL">
                            </div>
                        </div>  

                                             <div class="col-sm-6">
                                                <label class="form-label">Header js </label>
                                                <div class="position-relative">
                                                        <textarea  name="seoheader" class="form-control" rows="8"> {{ $setting->seoheader ?? ' ' }} </textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Footer js </label>
                                                <div class="position-relative">
                                                        <textarea  name="seofooter" class="form-control" rows="8">{{ $setting->seofooter ?? ' ' }}</textarea>
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
