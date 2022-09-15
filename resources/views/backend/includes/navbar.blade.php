<nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky"
     id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">

        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
            <a href="javascript:;" class="nav-link text-body p-0">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="{{route('profile.edit',Auth::user()->id)}}" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">{{Auth::user()->name}}</span>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center dropdown">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">

                        <li>
                            <a class="dropdown-item border-radius-md" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <div class="d-flex py-1">
                                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                   fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background"
                                                                  d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                  opacity="0.593633743"></path>
                                                            <path class="color-background"
                                                                  d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                           Logout
                                        </h6>

                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>

                <li class="nav-item d-flex align-items-center">
                    <a href="" class="nav-link text-body font-weight-bold px-0" data-bs-toggle="modal"
                       data-bs-target="#createModelchangepassword" data-id="{{Auth::user()->id}}">
                        &nbsp;
                        <i class="fa fa-gear" aria-hidden="true"></i>
                    </a>
                </li>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal fade" id="createModelchangepassword" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mt-lg-10">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="changepassword" action="{{url('change-password/'.Auth::user()->id)}}">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input name="oldpassword" type="password" placeholder="Current Password" id="full_name"
                                   required class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input autocomplete="off" name="newpassword" type="password" class="form-control"
                                   id="description"
                                   placeholder="New Password">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input autocomplete="off" name="password_confirmation" type="password" class="form-control"
                                   id="description"
                                   placeholder="Conform Password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn bg-gradient-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{asset('js/plugins/datatables.js')}}"></script>
    <script src="{{asset('js/custom/notifications.js')}}"></script>
    <script src="{{asset('js/custom/modal.js')}}"></script>
    <script src="{{asset('js/custom/dataTable.js')}}"></script>
    <script src="{{asset('js/custom/FormOptions.js')}}"></script>
    <script src="{{asset('js/dropzone.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#changepassword').validate({
            rules: {
                oldpassword: {
                    required: true,
                    minlength: 3
                },
                newpassword: {
                    required: true,
                    minlength: 4
                },
                password_confirmation:{
                    required: true,
                    minlength: 4,
                    equalTo : "#newpassword"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endpush
