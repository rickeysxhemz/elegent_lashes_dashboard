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
                  <!-- <img src="assets/images/logo/logo-c.svg" class="black_logo" alt="logo"> -->
                  <!-- <img src="assets/images/logo/logo-c-white.svg" class="white_logo" alt="logo"> -->
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
                <a href="index.html">
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

                <!-- BEGIN: Language Dropdown  -->

             

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




                <!-- BEGIN: Breadcrumb -->
                <div class="mb-5">
                  <ul class="m-0 p-0 list-none">
                    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                      <a href="index.html">
                        <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                        <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                      </a>
                    </li>
                    <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                      Payments
                      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                    </li>
                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                      Manage Payments</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->


                <div class=" space-y-5">
                  
                  <div class="card">
                    <header class=" card-header noborder">
                      <h4 class="card-title">Payment Details
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
                                   Client First Name
                                  </th>
                                  <th scope="col" class=" table-th ">
                                   Client Last Name
                                  </th>
                                  <th scope="col" class=" table-th ">
                                   Time
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Service
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Cash($)
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Card($)
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Tips($)
                                  </th>

                                  <th scope="col" class=" table-th ">
                                  Note
                                  </th>


                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                              @foreach($transactions as $transaction)
                               
                              <tr>
                                  <td class="table-td">{{ $loop->iteration }}</td>
                                  <td class="table-td ">{{$transaction->technician->name}}&nbsp;({{$transaction->location->name}})</td>
                                  <td class="table-td ">{{$transaction->client->first_name ?? 'john'}}</td>
                                  <td class="table-td ">{{$transaction->client->last_name ?? 'doe'}}</td>
                                  <td class="table-td ">{{$transaction->created_at->format('F j, Y g:i A')}}</td>
                                  <td class="table-td ">
                                    <div>
                                    {{$transaction->service->name}}
                                    </div>
                                  </td>
                                 @if($transaction->payment->payment_method == 'cash')
                                  <td class="table-td ">
                                    <div>
                                    {{$transaction->payment->payment_amount}}
                                    </div>
                                  </td>
                                 @else
                                 <td class="table-td "></td>
                                 @endif 
                                  @if($transaction->payment->payment_method == 'debit')
                                  <td class="table-td ">
                                    <div>
                                    {{$transaction->payment->payment_amount}}
                                    </div>
                                  @else
                                  <td class="table-td "></td>
                                  @endif
                                  <td class="table-td ">
                                    {{$transaction->payment->tips}}
                                    </div>

                                  </td>
                                 
                                  <td class="table-td ">
                                  {{ implode(', ', $transaction->transaction_details->pluck('Note')->toArray()) }}
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