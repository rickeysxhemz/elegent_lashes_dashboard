<script src="{{asset('dashboard/assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/js/rt-plugins.js')}}"></script>
  <script src="{{asset('dashboard/assets/js/app.js')}}"></script>
  <script src="{{asset('dashboard/assets/js/settings.js')}}" sync></script>

    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
        // Toastr options
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "rtl": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "500",
            "hideDuration": "500",
            "timeOut": "2000",
            "extendedTimeOut": "500",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
        };
        @if(Session::has('message'))
            toastr.success("{{ Session::get('message') }}");
        @endif
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>