<!DOCTYPE html>
<html lang="en">
@include('backend.includes.header')

@stack('styles')

<body class="g-sidenav-show  bg-gray-100">

<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card ">
                            <div class="card-body ">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger text-white" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form role="form" method="POST" action="{{route("login")}}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="email" class="form-control form-control-lg" placeholder="Email"
                                                   aria-label="Email" name="email" required autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg"
                                                   placeholder="Password" aria-label="Password" name="password" required
                                                   autocomplete="current-password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0"
                                                    name="submit">Sign in
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    <a href="/forgot-password" class="text-info text-gradient font-weight-bold">Forgot Password ?</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">

                            <div class="position-relative">

                            </div>

                            <h4 class="mt-5 text-white font-weight-bolder">Sing In</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('backend.includes.scripts')

@stack('scripts')

</body>

</html>
