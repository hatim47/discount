<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="/" class="sidebar-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">

         <ul class="sidebar-menu" id="sidebar-menu">
          
           
            <li>
                  <a href="{{ route('categories.index') }}">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                    <span>
                    Category List </span>
                </a>
            </li>
            <li>
                <a href="{{ route('store.index') }}">
                    <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
                    <span>Store List</span>
                </a>
            </li>
            <li>
                <a href="{{ route('coupon.index') }}">
                    <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                   <span>Cupouns List</span>
                </a>
            </li>
            <li>
                <a href="{{ route('event.index') }}">
                    <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>
                    <span>Event List</span>
                </a>
            </li>
   <li>
                <a href="{{ route('dynapage.index') }}">
                <iconify-icon icon="streamline:multiple-file-2-remix" class="menu-icon" ></iconify-icon>
                    <span>Dynamic Pages List</span>
                </a>
            </li>
               <li>
                <a href="{{ route('about.index') }}">
               <iconify-icon icon="mdi:about" class="menu-icon"></iconify-icon>
                    <span>About Pages List</span>
                </a>
            </li>
             <li>
                <a href="{{ route('studentt.index') }}">
               <iconify-icon icon="mdi:about" class="menu-icon"></iconify-icon>
                    <span>studentt Pages List</span>
                </a>
            </li>
             <li>
                <a href="{{ route('inspired.index') }}">
               <iconify-icon icon="mdi:about" class="menu-icon"></iconify-icon>
                    <span>inspired Pages List</span>
                </a>
            </li>
             <li>
                <a href="{{ route('featuer.index') }}">
               <iconify-icon icon="mdi:about" class="menu-icon"></iconify-icon>
                    <span>featuer Pages List</span>
                </a>
            </li>
                <li>
                <a href="{{ route('advertise.index') }}">
               <iconify-icon icon="mdi:about" class="menu-icon"></iconify-icon>
                    <span>advertise Pages List</span>
                </a>
            </li>
             <li>
                <a href="{{ route('settings.index') }}">
                <iconify-icon icon="icon-park-outline:file-settings" class="menu-icon"></iconify-icon>
                    <span>Setting Pages </span>
                </a>
            </li>
            {{-- <li>
                <a  href="{{ route('gallery') }}">
                    <iconify-icon icon="solar:gallery-wide-linear" class="menu-icon"></iconify-icon>
                    <span>Gallery</span>
                </a>
            </li> --}}
           
            
      
       
        </ul>
    </div>
</aside>
