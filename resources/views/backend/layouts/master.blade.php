<!DOCTYPE html>
<html lang="en">
@include('backend.includes.header')

@stack('styles')

<body class="g-sidenav-show  bg-gray-100">

@include('backend.includes.menu')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('backend.includes.navbar')

    <div class="container-fluid py-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
