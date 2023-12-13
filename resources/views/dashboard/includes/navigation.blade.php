<div class="sidebar-wrapper group">
      <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
      <div class="logo-segment">
        <a class="flex items-center" href="index.html">
          <!-- <img src="{{asset('dashboard/assets/images/logo/logo-c.svg')}}" class="black_logo" alt="logo">
          <img src="{{asset('dashboard/assets/images/logo/logo-c-white.svg')}}" class="white_logo" alt="logo"> -->
          <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">Elegent Lashes</span>
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
          <span class="sidebarDotIcon extend-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
        <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150 ring-2 ring-inset ring-offset-4 ring-black-900 dark:ring-slate-400 bg-slate-900 dark:bg-slate-400 dark:ring-offset-slate-700"></div>
      </span>
          <span class="sidebarDotIcon collapsed-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
        <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150"></div>
      </span>
        </div>
        <button class="sidebarCloseIcon text-2xl">
          <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
      </div>
      <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
      <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50" id="sidebar_menus">
      @if(auth()->user()->hasRole('owner')) 
      <ul class="sidebar-menu">
          <li class="sidebar-menu-title">MENU</li>
          <li class="">
            <a href="{{route('owner.dashboard')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
            <span>Dashboard</span>
              </span>
             
           
           
            </a>
            
          </li>
          <!-- Apps Area -->
          <li class="sidebar-menu-title">USERS</li>
          
          <li>
            <a href="{{route('owner.manageLocation')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Manage Location</span>
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('owner.manageManager')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Manage Manager</span>
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('owner.manageTechnician')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Manage technician</span>
              </span>
            </a>
          </li>
          <li class="sidebar-menu-title">Check Ins</li>
          <li>
            <a href="{{route('owner.listCheckins')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Manage Check-ins</span>
              </span>
            </a>
          </li>
         
         
          <li class="sidebar-menu-title">Payments</li>
          <li>
            <a href="{{route('owner.listPayments')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Manage Payment</span>
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('owner.revenueCalculatorPage')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Revenue Calculator</span>
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('track.checkin')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Track Checkins</span>
              </span>
            </a>
          </li>
          <li class="sidebar-menu-title">Waivers</li>
          <li>
            <a href="{{route('owner.listWaivers')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Signed Waiver</span>
              </span>
            </a>
          </li>
          <li class="sidebar-menu-title">Logout</li>
          <li>
            <a href="{{route('owner.logout')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Logout</span>
              </span>
            </a>
          </li>
        </ul>
      @endif
      @if(auth()->user()->hasRole('manager'))
     
      <ul class="sidebar-menu">
          <li class="sidebar-menu-title">MENU</li>
          <li class="">
            <a href="{{route('manager.dashboard')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
            <span>Dashboard</span>
              </span>     
            </a>
          </li>
          <li class="sidebar-menu-title">Historical Checkins</li>
          <li>
            <a href="{{route('manager.listCheckins')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Previous Checkin</span>
              </span>
            </a>
          </li>
          
          <li>
            <a href="{{route('manager.assignedCheckins')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Assigned Checkin</span>
              </span>
            </a>
          </li>
          <li class="sidebar-menu-title">Checkins</li>
          <li>
            <a href="{{route('manager.listCompleted')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Service Done</span>
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('track.checkin')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Track Checkins</span>
              </span>
            </a>
          </li>
          <li class="sidebar-menu-title">Others</li>
          <li>
            <a href="{{route('notifications.manager')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Notifications</span>
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('manager.logout')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Logout</span>
              </span>
            </a>
          </li>
      @endif
      @if(auth()->user()->hasRole('technician'))
      <ul class="sidebar-menu">
          <li class="sidebar-menu-title">MENU</li>
          <li class="">
            <a href="{{route('technician.dashboard')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
            <span>Dashboard</span>
              </span>     
            </a>
          </li>
          <li class="sidebar-menu-title">Payments</li>
          <li class="">
            <a href="{{route('technician.listPayments')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
            <span>Today Payments</span>
              </span>     
            </a>
          </li>
          <li class="sidebar-menu-title">Checkins</li>
          <li>
            <a href="{{route('track.checkin')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Track Checkins</span>
              </span>
            </a>
          </li>
          <li class="sidebar-menu-title">Others</li>
          <li>
            <a href="{{route('notifications.manager')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Notifications</span>
              </span>
            </a>
          </li>
          <li>
            <a href="{{route('technician.logout')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
            <span>Logout</span>
              </span>
            </a>
          </li>

      @endif

        
      </div>
    </div>