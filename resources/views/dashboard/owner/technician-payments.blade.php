@include('dashboard.includes.header')
<body class=" font-inter dashcode-app" id="body_class">
  <!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
  <main class="app-wrapper">
    @include('dashboard.includes.navigation')
  

    
    <div class="flex flex-col justify-between min-h-screen">
      <div>
        
        <div class="z-[9]" id="app_header">
          <div class="app-header z-[999] ltr:ml-[248px] rtl:mr-[248px] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
            <div class="flex justify-between items-center h-full">
              <div class="flex items-center md:space-x-4 space-x-2 xl:space-x-0 rtl:space-x-reverse vertical-box">
                <a href="index.html" class="mobile-logo xl:hidden inline-block">
                  <img src="assets/images/logo/logo-c.svg" class="black_logo" alt="logo">
                  <img src="assets/images/logo/logo-c-white.svg" class="white_logo" alt="logo">
                </a>
                <button class="smallDeviceMenuController hidden md:inline-block xl:hidden">
                  <iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <button class="flex items-center xl:text-sm text-lg xl:text-slate-400 text-slate-800 dark:text-slate-300 px-1
                     rtl:space-x-reverse search-modal" data-bs-toggle="modal" data-bs-target="#searchModal">
                  <iconify-icon icon="heroicons-outline:search"></iconify-icon>
                  <span class="xl:inline-block hidden ml-3">Search...
                  </span>
                </button>

              </div>
              <!-- end vertcial -->
              <div class="items-center space-x-4 rtl:space-x-reverse horizental-box">
                <a href="index.html">
                  <span class="xl:inline-block hidden">
        <img src="assets/images/logo/logo.svg" class="black_logo " alt="logo">
        <img src="assets/images/logo/logo-white.svg" class="white_logo" alt="logo">
    </span>
                  <span class="xl:hidden inline-block">
        <img src="assets/images/logo/logo-c.svg" class="black_logo " alt="logo">
        <img src="assets/images/logo/logo-c-white.svg" class="white_logo " alt="logo">
    </span>
                </a>
                <button class="smallDeviceMenuController  open-sdiebar-controller xl:hidden inline-block">
                  <iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>

              </div>
              <!-- end horizental -->



              <div class="main-menu">
                <ul>

                  <li class="menu-item-has-children ">
                


                    <a href="javascript:void()">
                      <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                        <span class="icon-box">
                    <iconify-icon icon=heroicons-outline:home > </iconify-icon>
                  </span>
                        <div class="text-box">Dashboard</div>
                      </div>
                      <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
                        <!-- <iconify-icon icon="heroicons-outline:chevron-down"> </iconify-icon> -->
                      </div>
                    </a>
                  
                  </li>
                  <li class="sidebar-menu-title">USERS</li>
                        <li>
                 <a href="chat.html" class="navItem">
                 <span class="flex items-center">
                 <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
                 <span>Manage Manager</span>
                 </span>
                          </a>
                        </li>
                        <li>
                          <a href="chat.html" class="navItem">
                            <span class="flex items-center">
                          <iconify-icon class="nav-icon" icon="mingcute:dots-vertical-line"></iconify-icon>
                          <span>Manage Locations</span>
                            </span>
                          </a>
                        </li>

                 


                 

                </ul>
              </div>
              <!-- end top menu -->
              <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">

                <!-- BEGIN: Language Dropdown  -->

                <div class="relative">
                  <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
            inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <iconify-icon icon="circle-flags:uk" class="mr-0 md:mr-2 rtl:ml-2 text-xl"></iconify-icon>
                    <span class="text-sm md:block hidden font-medium text-slate-600 dark:text-slate-300">
            En</span>
                  </button>
                  <!-- Language Dropdown menu -->
                  <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-900 !top-[25px] rounded-md
            overflow-hidden">
                    <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                      <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                          <iconify-icon icon="circle-flags:uk" class="ltr:mr-2 rtl:ml-2 text-xl"></iconify-icon>
                          <span class="font-medium">ENG</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                          <iconify-icon icon="emojione:flag-for-germany" class="ltr:mr-2 rtl:ml-2 text-xl"></iconify-icon>
                          <span class="font-medium">GER</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- Theme Changer -->
                <!-- END: Language Dropdown -->

                <!-- BEGIN: Toggle Theme -->
                <div>
                  <button id="themeMood" class="h-[28px] w-[28px] lg:h-[32px] lg:w-[32px] lg:bg-gray-500-f7 bg-slate-50 dark:bg-slate-900 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center">
                    <iconify-icon class="text-slate-800 dark:text-white text-xl dark:block hidden" id="moonIcon" icon="line-md:sunny-outline-to-moon-alt-loop-transition"></iconify-icon>
                    <iconify-icon class="text-slate-800 dark:text-white text-xl dark:hidden block" id="sunIcon" icon="line-md:moon-filled-to-sunny-filled-loop-transition"></iconify-icon>
                  </button>
                </div>
                <!-- END: TOggle Theme -->

                <!-- BEGIN: gray-scale Dropdown -->
                <div>
                  <button id="grayScale" class="lg:h-[32px] lg:w-[32px] lg:bg-slate-100 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
            rounded-full text-[20px] flex flex-col items-center justify-center">
                    <iconify-icon class="text-slate-800 dark:text-white text-xl" icon="mdi:paint-outline"></iconify-icon>
                  </button>
                </div>
                <!-- END: gray-scale Dropdown -->

                <!-- BEGIN: Message Dropdown -->
                <!-- Mail Dropdown -->
                <div class="relative md:block hidden">
                  <button class="lg:h-[32px] lg:w-[32px] lg:bg-slate-100 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
      rounded-full text-[20px] flex flex-col items-center justify-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <iconify-icon class="text-slate-800 dark:text-white text-xl" icon="heroicons-outline:mail"></iconify-icon>
                    <span class="absolute -right-1 lg:top-0 -top-[6px] h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
        justify-center rounded-full text-white z-[45]">
      10</span>
                  </button>
                  <!-- Mail Dropdown -->
                  <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 dark:divide-slate-700 shadow w-[335px]
      dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md overflow-hidden lrt:origin-top-right rtl:origin-top-left">
                    <div class="flex items-center justify-between py-4 px-4">
                      <h3 class="text-sm font-Inter font-medium text-slate-700 dark:text-white">Messages</h3>
                      <a class="text-xs font-Inter font-normal underline text-slate-500 dark:text-white" href="#">See All</a>
                    </div>
                    <div class="divide-y divide-slate-100 dark:divide-slate-700" role="none">
                      <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
                        <div class="flex ltr:text-left rtl:text-right space-x-3 rtl:space-x-reverse relative">
                          <div class="flex-none">
                            <div class="h-8 w-8 bg-white dark:bg-slate-700 rounded-full relative">
                              <span class="bg-secondary-500 w-[10px] h-[10px] rounded-full border border-white dark:border-slate-700 inline-block absolute
                right-0 top-0"></span>
                              <img src="/assets/images/all-img/user.png" alt="user" class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                            </div>
                          </div>
                          <div class="flex-1">
                            <a href="#" class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                              Wade Warren</a>
                            <div class="text-xs hover:text-[#68768A] text-slate-600 dark:text-slate-300 mb-1">Hi! How are you doing?.....</div>
                            <div class="text-slate-400 dark:text-slate-400 text-xs">
                              3 min ago</div>
                          </div>
                          <div class="flex-0">
                            <span class="h-4 w-4 bg-danger-500 border border-white rounded-full text-[10px] flex items-center justify-center text-white">
              1</span>
                          </div>
                        </div>
                      </div>
                      <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm  cursor-pointer">
                        <div class="flex ltr:text-left rtl:text-right space-x-3 rtl:space-x-reverse relative">
                          <div class="flex-none">
                            <div class="h-8 w-8 bg-white dark:bg-slate-700 rounded-full relative">
                              <span class="bg-green-500 w-[10px] h-[10px] rounded-full border border-white dark:border-slate-700 inline-block absolute
                right-0 top-0"></span>
                              <img src="/assets/images/all-img/user2.png" alt="user" class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                            </div>
                          </div>
                          <div class="flex-1">
                            <a href="#" class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                              Savannah Nguyen</a>
                            <div class="text-xs hover:text-[#68768A] text-slate-600 dark:text-slate-300 mb-1">Hi! How are you doing?.....</div>
                            <div class="text-slate-400 dark:text-slate-400 text-xs">3 min ago
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm  cursor-pointer">
                        <div class="flex ltr:text-left rtl:text-right space-x-3 rtl:space-x-reverse relative">
                          <div class="flex-none">
                            <div class="h-8 w-8 bg-white dark:bg-slate-700 rounded-full relative">
                              <span class="bg-green-500 w-[10px] h-[10px] rounded-full border border-white dark:border-slate-700 inline-block absolute
                right-0 top-0"></span>
                              <img src="/assets/images/all-img/user3.png" alt="user" class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                            </div>
                          </div>
                          <div class="flex-1">
                            <a href="#" class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                              Ralph Edwards</a>
                            <div class="text-xs hover:text-[#68768A] text-slate-600 dark:text-slate-300 mb-1">Hi! How are you doing?.....</div>
                            <div class="text-slate-400 dark:text-slate-400 text-xs">
                              3 min ago
                            </div>
                          </div>
                          <div class="flex-0">
                            <span class="h-4 w-4 bg-danger-500 border border-white rounded-full text-[10px] flex items-center justify-center text-white">
              8</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END: Message Dropdown -->

                <!-- BEGIN: Notification Dropdown -->
                <!-- Notifications Dropdown area -->
                <div class="relative md:block hidden">
                  <button class="lg:h-[32px] lg:w-[32px] lg:bg-slate-100 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
      rounded-full text-[20px] flex flex-col items-center justify-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <iconify-icon class="animate-tada text-slate-800 dark:text-white text-xl" icon="heroicons-outline:bell"></iconify-icon>
                    <span class="absolute -right-1 lg:top-0 -top-[6px] h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
        justify-center rounded-full text-white z-[99]">
      4</span>
                  </button>
                  <!-- Notifications Dropdown -->
                  <div class="dropdown-menu z-10 hidden bg-white shadow w-[335px]
      dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md overflow-hidden lrt:origin-top-right rtl:origin-top-left">
                    <div class="flex items-center justify-between py-4 px-4">
                      <h3 class="text-sm font-Inter font-medium text-slate-700 dark:text-white">Notifications</h3>
                      <a class="text-xs font-Inter font-normal underline text-slate-500 dark:text-white" href="#">See All</a>
                    </div>
                    <div class="" role="none">
                      <div class="bg-slate-100 dark:bg-slate-700 dark:bg-opacity-70 text-slate-800 block w-full px-4 py-2 text-sm relative">
                        <div class="flex ltr:text-left rtl:text-right">
                          <div class="flex-none ltr:mr-3 rtl:ml-3">
                            <div class="h-8 w-8 bg-white rounded-full">
                              <img src="/assets/images/all-img/user.png" alt="user" class="border-white block w-full h-full object-cover rounded-full border">
                            </div>
                          </div>
                          <div class="flex-1">
                            <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                              Your order is placed</a>
                            <div class="text-slate-500 dark:text-slate-200 text-xs leading-4">Amet minim mollit non deser unt ullamco est sit
                              aliqua.</div>
                            <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">
                              3 min ago
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
                        <div class="flex ltr:text-left rtl:text-right relative">
                          <div class="flex-none ltr:mr-3 rtl:ml-3">
                            <div class="h-8 w-8 bg-white rounded-full">
                              <img src="/assets/images/all-img/user2.png" alt="user" class="border-transparent block w-full h-full object-cover rounded-full border">
                            </div>
                          </div>
                          <div class="flex-1">
                            <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                              Congratulations Darlene 🎉</a>
                            <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">Won the monthly best seller badge</div>
                            3 min ago
                          </div>
                        </div>
                        <div class="flex-0">
                          <span class="h-[10px] w-[10px] bg-danger-500 border border-white dark:border-slate-400 rounded-full inline-block"></span>
                        </div>
                      </div>
                    </div>
                    <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
                      <div class="flex ltr:text-left rtl:text-right relative">
                        <div class="flex-none ltr:mr-3 rtl:ml-3">
                          <div class="h-8 w-8 bg-white rounded-full">
                            <img src="/assets/images/all-img/user3.png" alt="user" class="border-transparent block w-full h-full object-cover rounded-full border">
                          </div>
                        </div>
                        <div class="flex-1">
                          <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
              before:top-0 before:left-0">
                            Revised Order 👋</a>
                          <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">Won the monthly best seller badge</div>
                          <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">3 min ago</div>
                        </div>
                      </div>
                    </div>
                    <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
                      <div class="flex ltr:text-left rtl:text-right relative">
                        <div class="flex-none ltr:mr-3 rtl:ml-3">
                          <div class="h-8 w-8 bg-white rounded-full">
                            <img src="/assets/images/all-img/user4.png" alt="user" class="border-transparent block w-full h-full object-cover rounded-full border">
                          </div>
                        </div>
                        <div class="flex-1">
                          <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
              before:top-0 before:left-0">
                            Brooklyn Simmons</a>
                          <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">Added you to Top Secret Project group...</div>
                          <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">
                            3 min ago
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END: Notification Dropdown -->

                <!-- BEGIN: Profile Dropdown -->
                <!-- Profile DropDown Area -->
                <div class="md:block hidden w-full">
                  <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
      inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
                      <img src="{{asset('dashboard/assets/images/all-img/user.png')}}" alt="user" class="block w-full h-full object-cover rounded-full">
                    </div>
                    <span class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">Albert Flores</span>
                    <svg class="w-[16px] h-[16px] dark:text-white hidden lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]" aria-hidden="true" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </button>
                  <!-- Dropdown menu -->
                  <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md
      overflow-hidden">
                    <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                    <li>
                        <a href="{{route('owner.changePasswordPage')}}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
            dark:text-white font-normal">
                          <iconify-icon icon="heroicons-outline:credit-card" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                          <span class="font-Inter">Change Password</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{route('owner.logout')}}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
            dark:text-white font-normal">
                          <iconify-icon icon="heroicons-outline:login" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                          <span class="font-Inter">Logout</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- END: Header -->
                <button class="smallDeviceMenuController md:hidden block leading-0">
                  <iconify-icon class="cursor-pointer text-slate-900 dark:text-white text-2xl" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <!-- end mobile menu -->
              </div>
              <!-- end nav tools -->
            </div>
          </div>
        </div>

        <!-- BEGIN: Search Modal -->
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
          <div class="modal-dialog relative w-auto pointer-events-none top-1/4">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-900 bg-clip-padding rounded-md outline-none text-current">
              <form>
                <div class="relative">
                  <input type="text" class="form-control !py-3 !pr-12" placeholder="Search">
                  <button class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l text-xl border-l-slate-200 dark:border-l-slate-600 dark:text-slate-300 flex items-center justify-center">
                    <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- END: Search Modal -->
        <!-- END: Header -->
        <!-- END: Header -->
        <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
              <div id="content_layout">

                <div class="space-y-5">
                <div class="card xl:col-span-2 rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base">
                      <div class="card-body p-6">

                   <div class="card">
                      <div class="card-body">
                        <div class="card-text h-full">
                        @if(isset($totals))
                         <header class="border-b px-4 pt-4 pb-3 flex items-center border-success-500">
                            <iconify-icon class="text-3xl inline-block ltr:mr-2 rtl:ml-2 text-success-500" icon="ph:circle-wavy-check"></iconify-icon>
                            <h3 class="card-title mb-0 text-success-500">
                             Total:&nbsp{{$totals['payment_total']}}&nbsp Tips:&nbsp{{$totals['tips']}} &nbsp Service Payment {{$totals['payment_total'] - $totals['tips']}}
                            </h3>
                          </header>
                      
                          <div class="py-3 px-5">
                            <h5 class="card-subtitle">Total Earning</h5>
                            <p class="card-text mt-3">You can calculated your sum of earning using Start Date and End Date</p>
                          </div>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="card-text h-full ">
                                <form class="space-y-4" method="post" action="{{ route('owner.technicianRevenueCalculate') }}">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                                        
                                    <div class="input-area">
                                      <label for="technician" class="form-label">Select Technician</label>
                                      <select id="technician" name="technician_id" class="form-control">
                                         @foreach($technicians as $technician)
                                      <option value="{{$technician->id}}" class="dark:bg-slate-700">{{$technician->name}}</option>
                                        @endforeach
                                      </select>

                                      @error('technician')
                                          <span class="text-red-500 text-sm">{{ $message }}</span>
                                      @enderror
                                  </div>
                                        
                                        <div>
                                          <label for="humanFriendly_picker" class="form-label">Start-Date</label>
                                          <input class="form-control @error('start_date') border-red-500 @enderror py-2 flatpickr flatpickr-input active" id="start_date_picker" name="start_date" type="text" readonly="readonly">
                                          @error('start_date')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                                            
                                          <div>
                                            <label for="humanFriendly_picker" class="form-label">End Date</label>
                                            <input class="form-control @error('end_date') border-red-500 @enderror py-2 flatpickr flatpickr-input active" id="end_date_picker" name="end_date" type="text" readonly="readonly">
                                            @error('end_date')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                         
                                          </div>
                                                          
                                      
                                       
                                        
                                    </div>
                                    <button type="submit" class="btn inline-flex justify-center btn-dark">Calculate</button>
                                </form>
                                
                            </div>

                  

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


        <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
              <div id="content_layout">




               

                <div class=" space-y-5">
                  
                  <div class="card">
                    <header class=" card-header noborder">
                      <h4 class="card-title">Technician Payments
                      </h4>
                    </header>
                    <div class="card-body px-6 pb-6">
                      <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                          <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                              <thead class=" bg-slate-200 dark:bg-slate-700">
                              
                              <tr>
                                  <th scope="col" class=" table-th ">
                                    Id
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Technician
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Service
                                  </th>
                                  <th scope="col" class=" table-th ">
                                   Tips
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Payment
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Total
                                  </th>
                                
                                  
                                  <th scope="col" class=" table-th ">
                                   Payment Method
                                  </th>

                                  <th scope="col" class=" table-th ">
                                  Payment Date
                                  </th>

                                 

                                 

                                  

                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                              @foreach($transactions as $transaction)
                               
                              <tr>
                                  <td class="table-td">{{ $loop->iteration }}</td>
                                  <td class="table-td ">{{$transaction->technician->name}}&nbsp;({{$transaction->location->name}})</td>
                                  <td class="table-td ">
                                    <div>
                                    {{$transaction->service->name}}
                                    </div>
                                  </td>
                                  <td class="table-td">{{ $transaction->payment->tips }}</td>
                                  <td class="table-td ">${{$transaction->payment->payment_amount}}</td>
                                
                                  <td class="table-td ">
                                    <div>
                                    ${{$transaction->payment->payment_total}}
                                    </div>
                                  </td>
                                
                                  <td class="table-td ">
                                    <!-- <div class="flex space-x-3 rtl:space-x-reverse">
                                      <button class="action-btn" type="button">
                                        <iconify-icon icon="heroicons:eye"></iconify-icon>
                                      </button>
                                      <button class="action-btn" type="button">
                                        <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                      </button>
                                      <button class="action-btn" type="button">
                                        <iconify-icon icon="heroicons:trash"></iconify-icon>
                                      </button>
                                    </div> -->
                                    {{$transaction->payment->payment_method}}
                                  </td>

                                  <td class="table-td ">

                                  <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                  bg-success-500">
                                  {{$transaction->created_at->format('F j, Y g:i A')}}
                                  </div>

                                  </td>
                                </tr>

                         @endforeach
                               

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- locations->links() -->
      <!-- BEGIN: Footer For Desktop and tab -->
    @include('dashboard.includes.copyright')
      <!-- END: Footer For Desktop and tab -->
      <div id="confirmationModal" class="modal" style="display: none;">
    <div class="modal-content">
        <p>Are you sure you want to delete?</p>
        <button id="confirmDelete">Yes</button>
        <button id="cancelDelete">Cancel</button>
    </div>
</div>
     
  </main>
  
  <!-- scripts -->
@include('dashboard.includes.footer')

</script>
</body>
</html>