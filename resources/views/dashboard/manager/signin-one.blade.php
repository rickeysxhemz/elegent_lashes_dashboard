@extends('dashboard.includes.header')

<body class=" font-inter skin-default">
  <!-- [if IE]> <p class="browserupgrade">
            You are using an <strong>outdated</strong> browser. Please
            <a href="https://browsehappy.com/">upgrade your browser</a> to improve
            your experience and security.
        </p> <![endif] -->

  <div class="loginwrapper">
    <div class="lg-inner-column">
    <div class="left-column relative z-[1]">
        <div class="max-w-[520px] pt-20 ltr:pl-20 rtl:pr-20">
         
          <h4>
            Elegant Lashes
            <span class="text-slate-800 dark:text-slate-400 font-bold">
                            By Katie
                        </span>
          </h4>
        </div>
        <div class="absolute left-0 2xl:bottom-[-160px] bottom-[-130px] h-full w-full z-[-1]">
          <!-- <img src="{{asset('dashboard/assets/images/auth/ils1.svg')}}" alt="" class=" h-full w-full object-contain"> -->
        <h1 style="margin-top:50px;margin-left:80px">Manager Login</h1>
        </div>
      </div>
      <div class="right-column  relative">
        <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
          <div class="auth-box h-full flex flex-col justify-center">
            <div class="mobile-logo text-center mb-6 lg:hidden block">
              <a href="index.html">
                <img src="{{asset('dashboard/assets/images/logo/logo.svg')}}" alt="" class="mb-10 dark_logo">
                <img src="{{asset('dashboard/assets/images/logo/logo-white.svg')}}" alt="" class="mb-10 white_logo">
              </a>
            </div>
            <div class="text-center 2xl:mb-10 mb-4">
              <h4 class="font-medium">Sign in</h4>
              <div class="text-slate-500 text-base">
                <b> Manager Login</b>
              </div>
            </div>
            <!-- BEGIN: Login Form -->
            <form class="space-y-4" action="{{route('manager.login')}}" method="POST">
        @csrf

        <div class="fromGroup">
            <label class="block capitalize form-label">email</label>
            <div class="relative">
                <input type="email" id="email" name="email" class="form-control py-2" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="fromGroup">
            <label class="block capitalize form-label">password</label>
            <div class="relative">
                <input type="password" id="password" name="password" class="form-control py-2" placeholder="password">
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-dark block w-full text-center">Sign in</button>
    </form>
            <!-- END: Login Form -->
           
            
          </div>
          <div class="auth-footer text-center">
            Copyright 2023, Elegant Lashes by Katie All Rights Reserved.
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- scripts -->
@extends('dashboard.includes.footer')
</body>
</html>