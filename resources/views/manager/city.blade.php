@extends ('layout')

@section('title', 'Settings')

@section('content')

<section>
<div class="container">
        <div class="frame">
            <center>
                <img src="{{asset('assets/logo.png')}}" width="50%" height="100%"style="margin-top:30px;margin-bottom:-15px;">
                <!-- <p class="text-dark" style="margin-top:30px;margin-bottom:-15px;">Lash</p> -->
                <h1 class="text-dark" >Location</h1>
             
            </center>
            <div ng-app ng-init="checked = false">
                <form class="form-signin" action="{{route('update.location')}}" method="post" name="form"> 
                @csrf    
                <select 
                    class="manager-login" 
                    name="location" 
                    style="color: black;"
                    > 
                    @foreach($locations as $location)    
                    <option value="{{$location->id}}" >{{$location->name}}</option>
                   @endforeach
                </select>
                    
                   
                    <div class="btn-animate"> <button class="btn-update" >Update</button> </div>
                    <!-- <div class="btn-animate"> <a class="btn-continue" href="{{route('user.checkin')}}">Continue</a> </div> -->
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
