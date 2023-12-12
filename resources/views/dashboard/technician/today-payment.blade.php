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
                <a href="index.html" class="mobile-logo xl:hidden inline-block">
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

                <!-- Notifications Dropdown area -->
                <div class="relative md:block hidden">
                  <button class="lg:h-[32px] lg:w-[32px] lg:bg-slate-100 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
      rounded-full text-[20px] flex flex-col items-center justify-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <iconify-icon class="animate-tada text-slate-800 dark:text-white text-xl" icon="heroicons-outline:bell"></iconify-icon>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                      <span class="absolute -right-1 lg:top-0 -top-[6px] h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
                        justify-center rounded-full text-white z-[99]">
                       {{auth()->user()->unreadNotifications->count()}}
                      </span>
                    
                    @endif
                  </button>
                  <!-- Notifications Dropdown -->
                  <div class="dropdown-menu z-10 hidden bg-white shadow w-[335px]
      dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md overflow-hidden lrt:origin-top-right rtl:origin-top-left">
               @if(auth()->user()->unreadNotifications->count() > 0)
                    <div class="flex items-center justify-between py-4 px-4">
                      <h3 class="text-sm font-Inter font-medium text-slate-700 dark:text-white">Notifications</h3>
                      <a class="text-xs font-Inter font-normal underline text-slate-500 dark:text-white" href="{{ route('markAllAsRead') }}">Mark as Read</a>
                    </div>
              @endif
                    @foreach(auth()->user()->unreadNotifications as $notification)
                    <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
                      <div class="flex ltr:text-left rtl:text-right relative">
                        <div class="flex-none ltr:mr-3 rtl:ml-3">
                          <div class="h-8 w-8 bg-white rounded-full">
                            <img src="{{asset('dashboard/assets/images/all-img/user3.png')}}" alt="user" class="border-transparent block w-full h-full object-cover rounded-full border">
                          </div>
                        </div>
                        <div class="flex-1">
                          <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                                           before:top-0 before:left-0">
                             {{$notification->data['message']}}👋</a>
                          <!-- <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">Won the monthly best seller badge</div> -->
                          <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">{{$notification->created_at->diffForHumans()}}</div>
                        </div>
                      </div>
                    </div>
                  @endforeach
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
                        <a href="{{route('technician.logout')}}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
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
                    <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-1 sm:mb-0">Tasks Details</h4>
                    
                  </div>
                 
                 
                  <!-- <div class="grid grid-cols-12 gap-5">
                    <div class="xl:col-span-8 lg:col-span-7 col-span-12">
                      <div class="card">
                        <div class="card-header noborder">
                          <h4 class="card-title ">Team members</h4> -->
                          <div>
                            <!-- BEGIN: Card Dropdown -->
                            <div class="relative">
                              <div class="dropdown relative">
                                <!-- <button class="text-xl text-center block w-full " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                    rounded dark:text-slate-400">
                <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
            </span>
                                </button> -->
                               
                              </div>
                            </div>
                            <!-- END: Card Droopdown -->
                          </div>
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
                                        id
                                      </th>
                                      <th scope="col" class=" table-th ">
                                        Client
                                      </th>  
                                      <th scope="col" class=" table-th ">
                                        TIME
                                      </th>
                                      <th scope="col" class=" table-th ">
                                        SERVICE
                                      </th>
                                      <th scope="col" class=" table-th ">
                                        CASH
                                      </th>
                                      <th scope="col" class=" table-th ">
                                        CARD
                                      </th>
                                      <th scope="col" class=" table-th ">
                                        TIPS
                                      </th>
                                      <th scope="col" class=" table-th ">
                                        NOTE
                                      </th>
     
                                     

                                     

                                     

                                      

                                      <th scope="col" class=" table-th ">
                                        ACTION
                                      </th>

                                    </tr>
                                  </thead>
                                  <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                   
                                  @foreach($technician_assigned_tasks as $technician_assigned_task)
                                    <tr>
                                    <td class="table-td">
  
                                    {{$loop->iteration}}
                                  </td> 
                                  <td class="table-td">
                                        <div class="flex items-center">
                                          <div class="flex-none">
                                            <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                              <img src="{{asset('dashboard/assets/images/users/user-2.jpg')}}" alt="" class="w-full h-full rounded-[100%] object-cover">
                                            </div>
                                          </div>
                                          <div class="flex-1 text-start">
                                            <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                             {{$technician_assigned_task->clientCheckIn->client_detail->first_name}}
                                            </h4>
                                          </div>
                                        </div>
                                      </td>
                                  
                                  <td class="table-td">{{$technician_assigned_task->created_at->format('h:i A') }}</td>
                                  <td class="table-td">{{$technician_assigned_task->transaction->service->name}}</td>
                                  @if((implode(', ', $technician_assigned_task->transaction->payments->pluck('payment_method')->toArray())) == 'cash')
                                  <td class="table-td"> {{implode(', ', $technician_assigned_task->transaction->payments->pluck('payment_amount')->toArray())}}</td>
                                  @else
                                  <td class="table-td"></td>
                                  @endif

                                  @if((implode(', ', $technician_assigned_task->transaction->payments->pluck('payment_method')->toArray())) == 'debit')
                                  <td class="table-td">{{implode(', ', $technician_assigned_task->transaction->payments->pluck('payment_amount')->toArray())}}</td>
                                  @else
                                  <td class="table-td"></td>
                                  @endif

                                  <td class="table-td">{{implode(', ', $technician_assigned_task->transaction->payments->pluck('tips')->toArray())}}</td>
                                  <td class="table-td">{{implode(', ', $technician_assigned_task->transaction->transaction_details->pluck('Note')->toArray())}}</td>
                                    
                                      
                                      
                                      <td class="table-td">
                                        <div class="relative">
                                  @if($technician_assigned_task->status == 'pending')
                                        <a href="{{route('technician.addPayments',$technician_assigned_task->client_check_in_id)}}">
                                        <button class="btn inline-flex justify-center btn-danger btn-sm">
                                    <span class="flex items-center">
                                        <span>Tap to complete</span>
                                    </span>
                                  </button>
                                  </a>
                                  @elseif($technician_assigned_task->status == 'completed')
                                   
                                  <a href="{{route('technician.editPaymentPage',$technician_assigned_task->client_check_in_id)}}">
                                  <button class="btn inline-flex justify-center btn-success btn-sm">
                                    <span class="flex items-center">
                                        <span>Edit</span>
                                    </span>
                                  </button>
                                 </a>
                                  @endif
                                        </div>
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
                      <!-- </div>
                    </div>
                    
                  </div>
                </div> -->
                <!--  -->
                {{$technician_assigned_tasks->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- BEGIN: Footer For Desktop and tab -->
     @include('dashboard.includes.copyright')
     

    
    </div>
   
  </main>
  <!-- scripts -->
@include('dashboard.includes.footer')

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>

// Enable pusher logging - don't include this in production


var pusher = new Pusher('2080c6dc08df5ed47ee1', {
  cluster: 'mt1'
});

var audio = new Audio("{{asset('dashboard/assets/notification/notify.mp3')}}");

var channel = pusher.subscribe('notify-channel-{{auth()->user()->id}}');
channel.bind('notify-event-{{auth()->user()->id}}', function(data) {
  audio.currentTime = 0;

  // Play the audio
  audio.play();

            // Display notification using Toastr
  toastr.success(data.message, 'Notification');
});
</script>

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