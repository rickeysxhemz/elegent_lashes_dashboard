@include('dashboard.includes.header')


<body class=" font-inter dashcode-app" id="body_class">
  <!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
  <main class="app-wrapper">
    <!-- BEGIN: Sidebar -->
    <!-- BEGIN: Sidebar -->
    <div class="sidebar-wrapper group">
       <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
     
       <div class="logo-segment">
        <a class="flex items-center" href="">
          
          <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">Elegant Lashes By Katie</span>
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


    </div>
   
    <!-- End: Settings -->
    <div class="flex flex-col justify-between min-h-screen">
      <div>
        <!-- BEGIN: Header -->
        <!-- BEGIN: Header -->
   
        <!-- END: Search Modal -->
        <!-- END: Header -->
        <!-- END: Header -->
        <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
              <div id="content_layout">




                <!-- BEGIN: Breadcrumb -->
               
                <!-- END: BreadCrumb -->
                <div class=" space-y-5">
                  <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
                    <div class="card">
                      <div class="card-body p-6">
                        <div class="space-y-6">
                          <div class="flex space-x-3 items-center rtl:space-x-reverse">
                            <div class="flex-none h-8 w-8 rounded-full bg-slate-800 dark:bg-slate-700 text-slate-300 flex flex-col items-center
                                    justify-center text-lg">
                              <iconify-icon icon="heroicons:building-office-2"></iconify-icon>
                            </div>
                            <div class="flex-1 text-base text-slate-900 dark:text-white font-medium">
                             Owner Dashboard
                            </div>
                          </div>
                          <div class="text-slate-600 dark:text-slate-300 text-sm">
                        For owner to manage all the business
                        </div>
                          <a href="{{route('owner.loginPage')}}" class="inline-flex items-center space-x-3 rtl:space-x-reverse text-sm capitalize font-medium text-slate-600
                                dark:text-slate-300">
                            <span>Tap to Login</span>
                            <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body p-6">
                        <div class="space-y-6">
                          <div class="flex space-x-3 items-center rtl:space-x-reverse">
                            <div class="flex-none h-8 w-8 rounded-full bg-primary-500 text-slate-300 flex flex-col items-center justify-center text-lg">
                              <iconify-icon icon="heroicons:credit-card"></iconify-icon>
                            </div>
                            <div class="flex-1 text-base text-slate-900 dark:text-white font-medium">
                              Manager Dashboard
                            </div>
                          </div>
                          <div class="text-slate-600 dark:text-slate-300 text-sm">
                        For manager to manage all the business
                          </div>
                          <a href="{{route('manager.loginPage')}}" class="inline-flex items-center space-x-3 rtl:space-x-reverse text-sm capitalize font-medium text-slate-600
                                dark:text-slate-300">
                            <span>Tap to Login</span>
                            <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body p-6">
                        <div class="space-y-6">
                          <div class="flex space-x-3 rtl:space-x-reverse items-center">
                            <div class="flex-none h-8 w-8 rounded-full bg-success-500 text-white flex flex-col items-center justify-center text-lg">
                              <iconify-icon icon="heroicons:user"></iconify-icon>
                            </div>
                            <div class="flex-1 text-base text-slate-900 dark:text-white font-medium">
                              Technician Dashboard
                            </div>
                          </div>
                          <div class="text-slate-600 dark:text-slate-300 text-sm">
                        For technician to manage all the business
                        </div>
                          <a href="{{route('technician.loginPage')}}" class="inline-flex items-center space-x-3 rtl:space-x-reverse text-sm capitalize font-medium text-slate-600
                                dark:text-slate-300">
                            <span>Tap to Login</span>
                            <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                          </a>
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
      <footer class="md:block hidden" id="footer">
        <div class="site-footer px-6 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-300 py-4 ltr:ml-[248px] rtl:mr-[248px]">
          <div class="grid md:grid-cols-2 grid-cols-1 md:gap-5">
            <div class="text-center ltr:md:text-start rtl:md:text-right text-sm">
              COPYRIGHT ©
              <span id="thisYear"></span>
              Elegant Lashes By Katie, All rights Reserved
            </div>
            <div class="ltr:md:text-right rtl:md:text-end text-center text-sm">
              Designed with &hearts; by
              <a href="https://github.com/rickeysxhemz" target="_blank" class="text-primary-500 font-semibold">
                sxhemz
              </a>
            </div>
          </div>
        </div>
      </footer>
      <!-- END: Footer For Desktop and tab -->

     
    </div>
  </main>
  <!-- scripts -->
  @extends('dashboard.includes.footer')

</body>
</html>