@extends ('layout')

@section('title', 'User Register')

@section('content')

<section>

<div class="container">
        <div class="frame">
            <center>
                <img src="{{asset('assets/logo.png')}}" width="50%" height="100%"style="margin-top:30px;margin-bottom:-15px;">
                <!-- <p class="text-dark" style="margin-top:30px;margin-bottom:-15px;">Lash</p> -->
                <h1 class="text-dark" >Register</h1>
             
            </center>
            <div ng-app ng-init="checked = false">
                <form class="form-signin" action="{{route('user.register')}}" method="post" name="form"> 
                @csrf
                <div class="form-group">
                    <input class="update-location form-control @error('first_name') is-invalid @enderror" 
                        name="first_name" style="color: black;" placeholder="First Name" required>
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="update-location form-control @error('last_name') is-invalid @enderror" 
                        name="last_name" style="color: black;" placeholder="Last Name" required>
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>    
                <div class="form-group">
                    <input class="update-location form-control @error('phone') is-invalid @enderror" 
                        name="phone" style="color: black;" placeholder="Phone # (123456789)" value="{{session('phone')}}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
    <div class="btn-animate">
        <button class="btn-update">
            Register
        </button>
    </div>
</form>
                
            </div>
          
        </div>
    </div>

</section>
    
  
    <script>

        $(function() {
            $(".btn").click(function() {
            $(".form-signin").toggleClass("form-signin-left");
            $(".form-signup").toggleClass("form-signup-left");
            $(".frame").toggleClass("frame-long");
            $(".signup-inactive").toggleClass("signup-active");
            $(".signin-active").toggleClass("signin-inactive");
            $(".forgot").toggleClass("forgot-left");
            $(this).removeClass("idle").addClass("active");
            });
            });
            
            $(function() {
            $(".btn-signup").click(function() {
            $(".nav").toggleClass("nav-up");
            $(".form-signup-left").toggleClass("form-signup-down");
            $(".success").toggleClass("success-left");
            $(".frame").toggleClass("frame-short");
            });
            });
            
            $(function() {
            $(".btn-signin").click(function() {
            $(".btn-animate").toggleClass("btn-animate-grow");
            $(".welcome").toggleClass("welcome-left");
            $(".cover-photo").toggleClass("cover-photo-down");
            $(".frame").toggleClass("frame-short");
            $(".profile-photo").toggleClass("profile-photo-down");
            $(".btn-goback").toggleClass("btn-goback-up");
            $(".forgot").toggleClass("forgot-fade");
            });
            });
    </script>
@endsection
