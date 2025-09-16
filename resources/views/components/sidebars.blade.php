<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('index') }}" class="sidebar-logo">
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
                <a  href="{{ route('gallery') }}">
                    <iconify-icon icon="solar:gallery-wide-linear" class="menu-icon"></iconify-icon>
                    <span>Gallery</span>
                </a>
            </li>
           
            
      
       
        </ul>
    </div>
</aside>
