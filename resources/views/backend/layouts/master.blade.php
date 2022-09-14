<!DOCTYPE html>
<html lang="en">
@include('backend.includes.header')

@stack('styles')

<body class="g-sidenav-show  bg-gray-100">

@include('backend.includes.menu')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('backend.includes.navbar')

    <div class="container-fluid py-4">
{{--        @if ($message = Session::get('info-bar'))--}}
{{--            <div class="alert alert-info alert-dismissible fade show text-white" role="alert">--}}
{{--                <span class="alert-icon"><i class="ni ni-like-2"></i></span>--}}
{{--                <span class="alert-text"><strong>Info ! </strong> {{$message}}</span>--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        @if ($message = Session::get('success-bar'))--}}
{{--            <div class="alert alert-success alert-dismissible fade show text-white" role="alert">--}}
{{--                <span class="alert-icon"><i class="ni ni-like-2"></i></span>--}}
{{--                <span class="alert-text"><strong>Wow ! </strong> {{$message}}</span>--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        @endif--}}
        @yield('content')

        @include('backend.includes.footer')
    </div>
</main>

@include('backend.includes.scripts')

@stack('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</body>

</html>
