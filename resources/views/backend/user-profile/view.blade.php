@extends('backend.layouts.master')

@section('title','Users')
@section('content')
    <div class="container-fluid my-3 py-3">
        <div class="row mb-5">
            <div class="col-lg-12 mt-lg-0 mt-4">

                <div class="card card-body" id="profile">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-sm-auto col-4">
                            <div class="avatar avatar-xl position-relative">
                                <img src="{{$user->getMedia('images')->first()->getUrl()}}" alt="bruce"
                                     class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-sm-auto col-8 my-auto">
                            <div class="h-100">
                                <h5 class="mb-1 font-weight-bolder">
                                    {{$user->name}}
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{implode(',',$user->getRoleNames()->toArray())}}
                                </p>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{$user->email}}
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                            <label class="form-check-label mb-0">

                            </label>
                            <div class="form-check form-switch ms-2">

                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::model($user,['url'=>route('profile.update',$user->id),'files'=>true,'id'=>'updateprofile','method'=>'PUT']) !!}
                <div class="card mt-4" id="password">
                    <div class="card-header">
                        <h5>Basic Info</h5>
                    </div>

                    <div class="card-body pt-0">
                        <label class="form-label">Name</label>
                        <div class="form-group">
                            <input class="form-control" type="text" id="name" value="{{$user->name}}" name="name"
                                   placeholder="Name">
                        </div>
                        <label class="form-label">Profile Picture</label>
                        <div class="form-group">
                            <input class="form-control" type="file" name="image" placeholder="Image">
                        </div>

                        <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update</button>
                    </div>
                </div>
                {!! Form::close() !!}
                {!! Form::model($user,['url'=>route('users.passwordChange',$user->id),'files'=>true,'id'=>'updateprofilepassword','method'=>'PUT']) !!}
                <div class="card mt-4" id="password">
                    <div class="card-header">
                        <h5>Password Change</h5>
                    </div>

                    <div class="card-body pt-0">

                        <label class="form-label">Current password</label>
                        <div class="form-group">
                            <input class="form-control" type="password" name="old_password"
                                   placeholder="Current password">
                        </div>
                        <label class="form-label">New password</label>
                        <div class="form-group">
                            <input class="form-control" type="password" name="new_password" placeholder="New password">
                        </div>
                        <label class="form-label">Confirm new password</label>
                        <div class="form-group">
                            <input class="form-control" type="password" name="confirm_password"
                                   placeholder="Confirm password">
                        </div>

                        <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update Password</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection

@push('styles')

@endpush

@push('scripts')
    <script>
        $(document).ready(function () {
            jQuery.validator.addMethod("lettersonly", function (value, element) {
                return this.optional(element) || /^[a-z\s]+$/i.test(value);
            }, "Only alphabetical characters");
            $('#updateprofile').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },

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
    <script>
        $(document).ready(function () {
            jQuery.validator.addMethod("lettersonly", function (value, element) {
                return this.optional(element) || /^[a-z\s]+$/i.test(value);
            }, "Only alphabetical characters");
            $('#updateprofilepassword').validate({
                rules: {
                    new_password: {
                        required: true,
                    },
                    old_password: {
                        required: true,
                    },
                    confirm_password: {
                        required: true,
                    },
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
