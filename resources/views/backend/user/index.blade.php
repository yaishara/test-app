@extends('backend.layouts.master')

@section('title','Users')
@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Users </h5>
                            <p class="text-sm mb-0">
                                {{config('app.name')}} Manage All Users
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            @can('user-create')
                                <div class="ms-auto my-auto">
                                    <button type="button" class="btn bg-gradient-primary btn-sm mb-0"
                                            data-bs-toggle="modal"
                                            data-bs-target="#createModal">
                                        + New User
                                    </button>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="userTable">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role
                            </th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">

                </div>
            </div>
        </div>

        <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog mt-lg-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Create New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {!! Form::open(['route'=>'users.store','files'=>true,'enctype'=>'multipart/form-data']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::select('role',$roles,null,['class'=>'form-control','placeholder'=>'Select Role','required']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="Full Name" id="full_name"
                                           required class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input autocomplete="off" name="email" type="email" class="form-control"
                                           required id="email"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input autocomplete="off" name="password" type="password" class="form-control"
                                           required id="password"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="confirm_password" type="password" placeholder="Confirm Password"
                                           required id="confirm_password" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12 dropzone" id="dropzone">
                                <p>Select Image</p>
                                <div class="fallback">
                                    <input name="image_path" type="file"/>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn bg-gradient-primary btn-sm">Create</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog mt-lg-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Update User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {!! Form::open(['route'=>'users.store','method'=>'put','id'=>'updateForm','files'=>true]) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::select('role',$roles,null,['class'=>'form-control role','placeholder'=>'Select Role','required']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="Full Name" id="full_name"
                                           required class="form-control name"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input autocomplete="off" name="email" type="email" class="form-control email"
                                           id="email"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-12 dropzone2" id="dropzone2">
                                <p>Select Image</p>
                                <img src="" class="image_path">
                                <div class="fallback">
                                    <input name="image_path" type="file" id="image_path" class=""/>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn bg-gradient-primary btn-sm">Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endsection

        @push('styles')

        @endpush

        @push('scripts')
            <script src="{{asset('js/plugins/datatables.js')}}"></script>
            <script src="{{asset('js/custom/notifications.js')}}"></script>
            <script src="{{asset('js/custom/modal.js')}}"></script>
            <script src="{{asset('js/custom/dataTable.js')}}"></script>
            <script src="{{asset('js/custom/FormOptions.js')}}"></script>
            <script src="{{asset('js/dropzone.min.js')}}"></script>
            <script>
                Dropzone.autoDiscover = false;
                var drop = document.getElementById('dropzone')
                var myDropzone = new Dropzone(drop, {
                    // url: "/categories/store",
                    autoProcessQueue: false,
                    maxFilesize: 1,
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
                    addRemoveLinks: true
                });

                function edit(user) {
                    let id = user.dataset.id;
                    let name = user.dataset.name;
                    let role = user.dataset.category;
                    let email = user.dataset.email;
                    let image_path = user.dataset.image_path;
                    let is_active = user.dataset.is_active;

                    console.log(email)
                    $("#updateForm").find('.name').val(name);
                    $("#updateForm").find('.role').val(role);
                    $("#updateForm").find('.email').val(email);
                    $("#updateForm").find('.is_active').attr('checked', is_active);
                    $("#updateForm").find('.image_path').attr('src', image_path);
                    $("#updateForm").attr('action', '/users/' + id);
                    ModalOptions.toggleModal('editModal');
                }

                function deleteItem(id) {
                    const a = Swal.mixin({
                        customClass: {
                            confirmButton: "btn bg-gradient-success",
                            cancelButton: "btn bg-gradient-danger"
                        }, buttonsStyling: 0
                    });
                    a.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        type: "warning",
                        icon: "warning",
                        showCancelButton: 1,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: 1
                    }).then(e => {
                        if (e.value) {
                            $.ajax({
                                url: '/users/' + id,
                                type: 'DELETE',
                                data: {id: id}, //<-----this should be an object.
                                contentType: 'application/json',  // <---add this
                                dataType: 'text',                // <---update this
                                success: function (result) {
                                    if (result) {
                                        a.fire("Deleted!", "Your file has been deleted.", "success")
                                        location.reload();
                                    } else {
                                        e.dismiss === Swal.DismissReason.cancel;
                                        a.fire("Cancelled", "Your imaginary file is safe :)", "error")
                                    }
                                },
                                error: function (result) {
                                    e.dismiss === Swal.DismissReason.cancel;
                                    a.fire("Cancelled", "Your imaginary file is safe :)", "error")
                                }
                            });

                        } else {
                            e.dismiss === Swal.DismissReason.cancel;
                            a.fire("Cancelled", "Your imaginary file is safe :)", "error")
                        }
                    })
                }
            </script>
            <script type="text/javascript">
                $('#image').change(function () {

                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#preview-image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);

                });
            </script>
            <script>
                $(document).ready(function () {
                    jQuery.validator.addMethod("lettersonly", function (value, element) {
                        return this.optional(element) || /^[a-z\s]+$/i.test(value);
                    }, "Only alphabetical characters");
                    $('#useradd').validate({
                        rules: {
                            name: {
                                required: true,
                                minlength: 3
                            },
                            email: {
                                required: true,
                            },
                            password: {
                                minlength: 5
                            },
                            confirm_password: {
                                minlength: 5,
                                equalTo: "#password"
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
            <script>
                $(document).ready(function () {
                    jQuery.validator.addMethod("lettersonly", function (value, element) {
                        return this.optional(element) || /^[a-z\s]+$/i.test(value);
                    }, "Only alphabetical characters");
                    $('#updateForm').validate({
                        rules: {
                            name: {
                                required: true,
                                minlength: 3
                            },
                            email: {
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
            <script>
                $(document).ready(function () {
                    $('#userTable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{route('users.dataList')}}',
                        columns: [
                            {data: 'name'},
                            {data: 'email'},
                            {data: 'created_at'},

                        ], columnDefs: [
                            {
                                targets: -1,
                                data: null,
                                defaultContent: '<button>Click!</button>',
                            },
                        ],

                    });
                    $('#userTable tbody').on('click', 'button', function () {
                        var data = table.row($(this).parents('tr')).data();
                        alert(data[0] + "'s salary is: " + data[5]);
                    });
                });

            </script>
    @endpush
