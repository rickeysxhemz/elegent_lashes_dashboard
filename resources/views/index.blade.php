@extends ('layout')

@section('title', 'Home')

@section('content')

<section>
    <div class="container">
        <div class="frame">
            <center>
                <img src="assets/logo.png" width="50%" height="100%"style="margin-top:30px;margin-bottom:-15px;">
                <!-- <p class="text-dark" style="margin-top:30px;margin-bottom:-15px;">Lash</p> -->
                <h1 class="text-dark" >Manager Login</h1>
             
            </center>
            <div ng-app ng-init="checked = false">
                <form class="form-signin" action="{{ route('index.login') }}" method="post" name="form"> 
                    <!-- <select class="form-styling" name="username" style="color: black;"> 
                              <option>Name</option>
                    </select> -->
                  @csrf  
                    <select 
                    class="manager-login" 
                    name="phone" 
                    style="color: black;"
                    > 
                    @foreach($managers as $manager)    
                    <option value="{{$manager->phone_number}}" >{{$manager->name}} &mdash; {{$manager->phone_number}}</option>
                   @endforeach
                </select>

                <input class="manager-login" name="password" style="color: black;" placeholder="Password" type="password" required> 
                   
                   
                   
                   
                    <div class="btn-animate"><button class="btn-signin"> Login</button> </div>
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
    
   
