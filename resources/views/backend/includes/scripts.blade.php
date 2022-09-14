<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/fontawesome.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script src="{{asset('js/soft-ui-dashboard.min.js')}}"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<script>
    toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    @if(Session::has('success'))
    toastr.success("{{ session('success') }}");
    @endif

        @if(Session::has('error'))
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
