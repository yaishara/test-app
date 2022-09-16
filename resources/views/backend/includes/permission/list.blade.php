<li class="nav-item">
    <a href="/dashboard" class="nav-link" aria-controls="dashboardsExamples" role="button"
       aria-expanded="false">
        <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(0.000000, 148.000000)">
                                <path class="color-background"
                                      d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                      opacity="0.598981585"></path>
                                <path class="color-background"
                                      d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Dashboards</span>
    </a>
</li>

@php
    $permissionList = ['user-list','role-list','permission-list','company-list','employee-list'];

@endphp

@php
    $uriList = ['users','role','permissions','company','employee'];
@endphp

@canany ($permissionList)
    <li class="nav-item">
        <a data-bs-toggle="collapse" href="#admin"
           class="nav-link
           {{in_array(request()->route()->uri,$uriList)?' active':null}}
           " aria-controls="pagesExamples"
           role="button"
           aria-expanded="false">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>office</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                                <g id="office" transform="translate(153.000000, 2.000000)">
                                    <path class="color-background"
                                          d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"
                                          opacity="0.6"></path>
                                    <path class="color-background"
                                          d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <span class="nav-link-text ms-1">Administration</span>
        </a>
        <div class="collapse
         {{in_array(request()->route()->uri,$uriList)?' show':null}}
         " id="admin">
            <ul class="nav ms-4 ps-3">
                @can('permission-list')
                    <li class="nav-item
                    {{request()->route()->uri == "permissions" ?'active':null}}
                    ">
                        <a class="nav-link " href="{{route('permissions.index')}}">
                            <span class="sidenav-mini-icon"> P </span>
                            <span class="sidenav-normal"> Permission </span>
                        </a>
                    </li>
                @endcan

                @can('role-list')
                    <li class="nav-item
                    {{request()->route()->uri == "role" ?'active':null}}
                    ">
                        <a class="nav-link " href="{{route('role.index')}}">
                            <span class="sidenav-mini-icon"> R </span>
                            <span class="sidenav-normal"> Role </span>
                        </a>
                    </li>
                @endcan

                @can('user-list')
                    <li class="nav-item ">
                        <a class="nav-link
                         {{request()->route()->uri == "users" ?'active':null}}
                         "
                           href="{{route('users.index')}}">
                            <span class="sidenav-mini-icon"> U </span>
                            <span class="sidenav-normal"> Users </span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a data-bs-toggle="collapse" href="#company" class="nav-link
         {{in_array(request()->route()->uri,$uriList)?' active':null}}
         " aria-controls="ecommerceExamples" role="button"
           aria-expanded="false">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                <svg class="text-dark" width="12px" height="12px" viewBox="0 0 42 44" version="1.1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>basket</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1869.000000, -741.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                                <g id="basket" transform="translate(153.000000, 450.000000)">
                                    <path class="color-background"
                                          d="M34.080375,13.125 L27.3748125,1.9490625 C27.1377583,1.53795093 26.6972449,1.28682264 26.222716,1.29218729 C25.748187,1.29772591 25.3135593,1.55890827 25.0860125,1.97535742 C24.8584658,2.39180657 24.8734447,2.89865282 25.1251875,3.3009375 L31.019625,13.125 L10.980375,13.125 L16.8748125,3.3009375 C17.1265553,2.89865282 17.1415342,2.39180657 16.9139875,1.97535742 C16.6864407,1.55890827 16.251813,1.29772591 15.777284,1.29218729 C15.3027551,1.28682264 14.8622417,1.53795093 14.6251875,1.9490625 L7.919625,13.125 L0,13.125 L0,18.375 L42,18.375 L42,13.125 L34.080375,13.125 Z"
                                          opacity="0.595377604"></path>
                                    <path class="color-background"
                                          d="M3.9375,21 L3.9375,38.0625 C3.9375,40.9619949 6.28800506,43.3125 9.1875,43.3125 L32.8125,43.3125 C35.7119949,43.3125 38.0625,40.9619949 38.0625,38.0625 L38.0625,21 L3.9375,21 Z M14.4375,36.75 L11.8125,36.75 L11.8125,26.25 L14.4375,26.25 L14.4375,36.75 Z M22.3125,36.75 L19.6875,36.75 L19.6875,26.25 L22.3125,26.25 L22.3125,36.75 Z M30.1875,36.75 L27.5625,36.75 L27.5625,26.25 L30.1875,26.25 L30.1875,36.75 Z"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <span class="nav-link-text ms-1">Company</span>
        </a>
        <div class="collapse
         {{in_array(request()->route()->uri,$uriList)?' show':null}}
         " id="company">
            <ul class="nav ms-4 ps-3">
                @can('company-list')
                    <li class="nav-item
                    {{request()->route()->uri == "company" ?'active':null}}
                    ">
                        <a class="nav-link " href="{{route('company.index')}}">
                            <span class="sidenav-mini-icon"> C </span>
                            <span class="sidenav-normal"> Company </span>
                        </a>
                    </li>
                @endcan

                @can('employee-list')
                    <li class="nav-item
                    {{request()->route()->uri == "employee" ?'active':null}}
                    ">
                        <a class="nav-link " href="{{route('employee.index')}}">
                            <span class="sidenav-mini-icon"> E </span>
                            <span class="sidenav-normal"> Employee </span>
                        </a>
                    </li>
                @endcan

            </ul>
        </div>
    </li>
@endcanany


