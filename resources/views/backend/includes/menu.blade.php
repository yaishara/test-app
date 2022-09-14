<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
       id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/">
            @if(!empty(env('APP_FAVICON')))
                <img src="{{asset(env('APP_FAVICON'))}}" class="navbar-brand-img h-100" alt="main_logo">
            @endif
            <span class="ms-1 font-weight-bold"> {{config('app.name')}} </span>
        </a>
    </div>

    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto max-height-vh-100 h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            @include('backend.includes.permission.list')

        </ul>
    </div>

</aside>
