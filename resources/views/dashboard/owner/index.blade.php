@include('dashboard.includes.header')
<body class=" font-inter dashcode-app" id="body_class">
  <!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
  <main class="app-wrapper">
    <!-- BEGIN: Sidebar -->
   @include('dashboard.includes.navigation')
    <!-- BEGIN: Sidebar -->
  
  

    <!-- End: Settings -->
    <div class="flex flex-col justify-between min-h-screen">
      <div>
        <!-- BEGIN: Header -->
        <!-- BEGIN: Header -->
        <div class="z-[9]" id="app_header">
          <div class="app-header z-[999] ltr:ml-[248px] rtl:mr-[248px] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
            <div class="flex justify-between items-center h-full">
              <div class="flex items-center md:space-x-4 space-x-2 xl:space-x-0 rtl:space-x-reverse vertical-box">
                <a href="#" class="mobile-logo xl:hidden inline-block">
                  <!-- <img src="assets/images/logo/logo-c.svg" class="black_logo" alt="logo">
                  <img src="assets/images/logo/logo-c-white.svg" class="white_logo" alt="logo"> -->
                </a>
                <button class="smallDeviceMenuController hidden md:inline-block xl:hidden">
                  <iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <!-- <button class="flex items-center xl:text-sm text-lg xl:text-slate-400 text-slate-800 dark:text-slate-300 px-1
        rtl:space-x-reverse search-modal" data-bs-toggle="modal" data-bs-target="#searchModal">
                  <iconify-icon icon="heroicons-outline:search"></iconify-icon>
                  <span class="xl:inline-block hidden ml-3">Search...
    </span>
                </button> -->

              </div>
              <!-- end vertcial -->
              <div class="items-center space-x-4 rtl:space-x-reverse horizental-box">
                <a href="#">
                  <span class="xl:inline-block hidden">
        <!-- <img src="assets/images/logo/logo.svg" class="black_logo " alt="logo">
        <img src="assets/images/logo/logo-white.svg" class="white_logo" alt="logo"> -->
    </span>
                  <span class="xl:hidden inline-block">
        <!-- <img src="assets/images/logo/logo-c.svg" class="black_logo " alt="logo">
        <img src="assets/images/logo/logo-c-white.svg" class="white_logo " alt="logo"> -->
    </span>
                </a>
                <button class="smallDeviceMenuController  open-sdiebar-controller xl:hidden inline-block">
                  <iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>

              </div>
              <!-- end horizental -->



            
              <!-- end top menu -->
              <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">

               
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
           
                <!-- BEGIN: Profile Dropdown -->
                <!-- Profile DropDown Area -->
                <div class="md:block hidden w-full">
                  <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
      inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
                      <img src="{{asset('dashboard/assets/images/all-img/user.png')}}" alt="user" class="block w-full h-full object-cover rounded-full">
                    </div>
                    <span class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">{{auth()->user()->name}}</span>
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
                  <div class="flex justify-between flex-wrap items-center mb-6">
                    <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-1 sm:mb-0">Updates</h4>
                    
                  </div>
                  <div class="grid grid-cols-12 gap-5">
                    <div class="lg:col-span-8 col-span-12 space-y-5">
                      <div class="card p-6">
                        <div class="grid grid-cols-12 gap-5">
                          <div class="xl:col-span-8 col-span-12">
                            <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-3">

                              <!-- BEGIN: Group Chart5 -->


                              <div class=" bg-info-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-50 text-center">
                                <div class="text-info-500 mx-auto h-10 w-10 flex flex-col items-center justify-center rounded-full bg-white text-2xl mb-4">
                                  <iconify-icon icon=heroicons-outline:menu-alt-1></iconify-icon>
                                </div>
                                <span class="block text-sm text-slate-600 font-medium dark:text-white mb-1">
                                    Total Task
                                </span>
                                                        <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium">
                                    {{$total_Task ?? 0}}
                                </span>
                              </div>

                              <div class=" bg-warning-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-50 text-center">
                                <div class="text-warning-500 mx-auto h-10 w-10 flex flex-col items-center justify-center rounded-full bg-white text-2xl mb-4">
                                  <iconify-icon icon=heroicons-outline:chart-pie></iconify-icon>
                                </div>
                                <span class="block text-sm text-slate-600 font-medium dark:text-white mb-1">
                                  Pending
                                </span>
                                                        <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium">
                                    {{$total_Task_Assigned ?? 0}}
                                </span>
                              </div>

                              <div class=" bg-primary-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-50 text-center">
                                <div class="text-primary-500 mx-auto h-10 w-10 flex flex-col items-center justify-center rounded-full bg-white text-2xl mb-4">
                                  <iconify-icon icon=heroicons-outline:clock></iconify-icon>
                                </div>
                                <span class="block text-sm text-slate-600 font-medium dark:text-white mb-1">
                                    Completed
                                </span>
                                <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium">
                                    {{$total_services_Done ?? 0}}
                                </span>
                              </div>

                              <div class=" bg-primary-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-50 text-center">
                                <div class="text-primary-500 mx-auto h-10 w-10 flex flex-col items-center justify-center rounded-full bg-white text-2xl mb-4">
                                  <iconify-icon icon=heroicons-outline:clock></iconify-icon>
                                </div>
                                <span class="block text-sm text-slate-600 font-medium dark:text-white mb-1">
                                  Total  Clients
                                </span>
                                <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium">
                                    {{$total_clients ?? 0}}
                                </span>
                              </div>

                              <div class=" bg-info-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-50 text-center">
                                <div class="text-info-500 mx-auto h-10 w-10 flex flex-col items-center justify-center rounded-full bg-white text-2xl mb-4">
                                  <iconify-icon icon=heroicons-outline:menu-alt-1></iconify-icon>
                                </div>
                                <span class="block text-sm text-slate-600 font-medium dark:text-white mb-1">
                                   Waiver
                                </span>
                                                        <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium">
                                    {{$waivers ?? 0}}
                                </span>
                              </div>

                              <div class=" bg-success-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-50 text-center">
                                <div class="text-success-500 mx-auto h-10 w-10 flex flex-col items-center justify-center rounded-full bg-white text-2xl mb-4">
                                  <iconify-icon icon=heroicons-outline:calculator></iconify-icon>
                                </div>
                                <span class="block text-sm text-slate-600 font-medium dark:text-white mb-1">
                                    Total Earning
                                </span>
                                <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium">
                                    ${{$total_earning ?? 0}}
                                </span>
                              </div>
                              <div class=" bg-success-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-50 text-center">
                                <div class="text-success-500 mx-auto h-10 w-10 flex flex-col items-center justify-center rounded-full bg-white text-2xl mb-4">
                                  <iconify-icon icon=heroicons-outline:calculator></iconify-icon>
                                </div>
                                <span class="block text-sm text-slate-600 font-medium dark:text-white mb-1">
                                    Total Tips
                                </span>
                                <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium">
                                    ${{$total_tips ?? 0}}
                                </span>
                              </div>
                              <div class=" bg-success-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-50 text-center">
                                <div class="text-success-500 mx-auto h-10 w-10 flex flex-col items-center justify-center rounded-full bg-white text-2xl mb-4">
                                  <iconify-icon icon=heroicons-outline:calculator></iconify-icon>
                                </div>
                                <span class="block text-sm text-slate-600 font-medium dark:text-white mb-1">
                                    Grand Total
                                </span>
                                <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium">
                                    ${{$grand_total ?? 0}}
                                </span>
                              </div>

                              <!-- END: Group Chart5 -->
                            </div>
                          </div>
                          <!-- <div class="xl:col-span-4 col-span-12">
                            <div class="bg-slate-50 dark:bg-slate-900 rounded-md p-4">
                              <span class="block dark:text-slate-400 text-sm text-slate-600">
                                    Progress
                                </span>
                              <div class="donut-chart" height="110" colors="#0CE7FA,#E2F6FD"></div>
                            </div>
                          </div> -->
                        </div>
                      </div>
                      <!-- <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">Deal distribution by stage</h4>
                        </div>
                        <div class="card-body p-6">
                          <div id="areaChart" height="310"></div>
                        </div>
                      </div> -->
                    </div> 
                    <div class="xl:col-span-4 col-span-12">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">Activity</h4>
                        </div>
                        <div class="card-body p-6">
                          <div class="mb-12">
                            <!-- <div id="dashcode-mini-calendar"></div> -->
                            <div class="datetime-container" style="text-align:center">
                                <div class="date" style="font-size: 24px;color: #333;">@php echo now('America/New_York')->format('D, M j, Y'); @endphp</div>
                                <div class="time" style="font-size: 36px;color: #1e90ff;" id="clock"></div>
                            </div>
                          </div>

                          <!-- BEGIN: Meets -->


                          <ul class="divide-y divide-slate-100 dark:divide-slate-700">
                          <li style="text-align:center;"> <h6>Today Check Ins</h6></li>
                          <br>
                          @foreach($today_check_ins as $today_check_in)
                            <li class="block py-[10px]">
                              <div class="flex space-x-2 rtl:space-x-reverse">
                                <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                  <div class="flex-none">
                                    <!-- <div class="h-8 w-8">
                                      <img src=assets/images/svg/sk.svg alt="" class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                                    </div> -->
                                  </div>
                                  <div class="flex-1">
                                    <span class="block text-slate-600 text-sm dark:text-slate-300 mb-1 font-medium">
                                            {{ucfirst($today_check_in->client->first_name)}}
                                        </span>
                                    <span class="flex font-normal text-xs dark:text-slate-400 text-slate-500">
                                            <span class="text-base inline-block mr-1">
                                                <iconify-icon icon="heroicons-outline:user"></iconify-icon>
                                            </span>
                                    {{ucfirst($today_check_in->location->name)}}
                                    </span>
                                  </div>
                                </div>
                                <div class="flex-none">
                                  <span class="block text-xs text-slate-600 dark:text-slate-400">
                                       {{$today_check_in->created_at->diffForHumans()}}
                                    </span>
                                </div>
                              </div>
                            </li>
                          @endforeach
                          </ul>
                          <!-- END: Meets -->

                        </div>
                      </div>
                    </div>
                  </div>
                 
                  <div class="grid grid-cols-12 gap-5">
                    <div class="xl:col-span-8 lg:col-span-7 col-span-12">
                      <div class="card">
                        <div class="card-header noborder">
                          <h4 class="card-title ">Technicians</h4>
                         
                        </div>
                        <div class="card-body p-6">

                          <!-- BEGIN: Team Table -->


                          <div class="overflow-x-auto -mx-6">
                            <div class="inline-block min-w-full align-middle">
                              <div class="overflow-hidden ">
                                <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                  <thead class=" bg-slate-200 dark:bg-slate-700">
                                  
                                  <tr>

                                      <th scope="col" class=" table-th ">
                                        Name
                                      </th>

                                      <th scope="col" class=" table-th ">
                                        Location
                                      </th>

                                    

                                      <th scope="col" class=" table-th ">
                                        ACTION
                                      </th>

                                    </tr>
                                  </thead>
                                  <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                  @foreach($technicians as $technician)
                                    <tr>
                                      <td class="table-td">
                                        <div class="flex items-center">
                                          <div class="flex-none">
                                            <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                              <img src="{{asset('dashboard/assets/images/users/user-2.jpg')}}" alt="" class="w-full h-full rounded-[100%] object-cover">
                                            </div>
                                          </div>
                                          <div class="flex-1 text-start">
                                            <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                              {{ucfirst($technician->name ?? '')}}
                                            </h4>
                                          </div>
                                        </div>
                                      </td>
                                      <td class="table-td ">
                                        <span class="block min-w-[140px] text-left">
                                    <span class="inline-block text-center mx-auto py-1">
                                        
                                            <span class="flex items-center space-x-3 rtl:space-x-reverse">
                                                <span class="h-[6px] w-[6px] bg-success-500 rounded-full inline-block ring-4 ring-opacity-30 ring-success-500"></span>
                                        @foreach($technician->technician_locations as $technician_location)
                                                <span class="text-xs text-slate-600 dark:text-slate-400">
                                                    {{ucfirst($technician_location->location->name)}}
                                                </span>        
                                        @endforeach
                                        </span>
                                        </span>
                                        </span>

                                      </td>
                                     
                                      
                                    </tr>

                                  @endforeach

                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          <!-- END: Team table -->

                        </div>
                      </div>
                    </div>
                    <div class="xl:col-span-4 lg:col-span-5 col-span-12">
                      <div class="card h-full">
                        <div class="card-header">
                          <h4 class="card-title">Waivers</h4>
                         
                        </div>
                        <div class="card-body p-6">

                          <!-- BEGIN: Files Card -->


                          <ul class="divide-y divide-slate-100 dark:divide-slate-700">
                          @foreach($client_waivers as $client_waiver)
                            <li class="block py-[8px]">
                              <div class="flex space-x-2 rtl:space-x-reverse">
                                <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                  <div class="flex-none">
                                    <div class="h-8 w-8">
                                      <img src="{{asset('dashboard/assets/images/users/pdf-svgrepo-com.svg')}}" alt="" class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                                    </div>
                                  </div>
                                  <div class="flex-1">
                                    <span class="block text-slate-600 text-sm dark:text-slate-300">
                                      {{ucfirst($client_waiver->client->first_name)}} {{ucfirst($client_waiver->client->last_name)}}
                                    </span>
                                    <span class="block font-normal text-xs text-slate-500 mt-1">
                                      {{$client_waiver->created_at->diffForHumans()}}
                                    </span>
                                  </div>
                                </div>
                                <a href="{{route('owner.downloadWaiver',$client_waiver->id )}}">
                                <div class="flex-none">
                                  <button type="button" class="text-xs text-slate-900 dark:text-white">
                                    Download
                                  </button>
                                </div>
                                </a>
                              </div>
                            </li>
                          @endforeach
                          </ul>
                          <!-- END: FIles Card -->
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

      <!-- BEGIN: Footer For Desktop and tab -->
     @include('dashboard.includes.copyright')
      <!-- END: Footer For Desktop and tab -->

     
    </div>
  </main>
  <!-- scripts -->
@include('dashboard.includes.footer')
<script>
        function updateClock() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
        }

        // Update the clock every second
        setInterval(updateClock, 1000);

        // Initial update
        updateClock();
    </script>
</body>
</html>