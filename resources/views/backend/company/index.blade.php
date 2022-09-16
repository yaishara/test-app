@extends('backend.layouts.master')

@section('title','Company')
@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Companies </h5>
                            <p class="text-sm mb-0">
                                {{config('app.name')}} Manage All Companies
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            @can('company-create')
                                <div class="ms-auto my-auto">
                                    <button type="button" class="btn bg-gradient-primary btn-sm mb-0"
                                            data-bs-toggle="modal"
                                            data-bs-target="#createModal">
                                        + New Company
                                    </button>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive ">
                    {!! $dataTable->table() !!}
                </div>
                <div class="col-md-12">

                </div>
            </div>
        </div>

        <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog mt-lg-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Create New Company</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {!! Form::open(['route'=>'company.store','files'=>true,'id'=>'companyadd','enctype'=>'multipart/form-data']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="Name" id="name"
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input autocomplete="off" name="telephone" type="number"
                                           class="form-control telephone"
                                           id="telephone"
                                           placeholder="Contact Number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input autocomplete="off" name="website" type="text" class="form-control website"
                                           id="website"
                                           placeholder="Website">
                                </div>
                            </div>
                            <div class="col-md-12 dropzone2" id="dropzone2">
                                <label>Select Logo</label>
                                <img src="" class="image_path">
                                <div class="fallback">
                                    <input name="logo_image_path" type="file" id="logo_image_path" class=""/>
                                </div>
                            </div>
                            <div class="col-md-12 dropzone2" id="dropzone2">
                                <label>Select Cover</label>
                                <img src="" class="image_path">
                                <div class="fallback">
                                    <input name="cover_image_path" type="file" id="cover_image_path" class=""/>
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
                        <h5 class="modal-title" id="ModalLabel">Update Company</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {!! Form::open(['route'=>'company.store','method'=>'put','id'=>'updateForm','files'=>true]) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="Name" id="name"
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input autocomplete="off" name="telephone" type="number"
                                           class="form-control telephone"
                                           id="telephone"
                                           placeholder="Contact Number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input autocomplete="off" name="website" type="text" class="form-control website"
                                           id="website"
                                           placeholder="Website">
                                </div>
                            </div>
                            <div class="col-md-12 dropzone2" id="dropzone2">
                                <p>Select Image</p>
                                <img src="" class="image_path">
                                <div class="fallback">
                                    <input name="logo_image_path" type="file" id="logo_image_path" class=""/>
                                </div>
                            </div>
                            <div class="col-md-12 dropzone2" id="dropzone2">
                                <p>Select Image</p>
                                <img src="" class="image_path">
                                <div class="fallback">
                                    <input name="cover_image_path" type="file" id="cover_image_path" class=""/>
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
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
            <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
            <script src="{{ asset('vendor/Datatables/buttons.server-side.js') }}"></script>
            {!! $dataTable->scripts() !!}


            <script src="{{asset('js/custom/notifications.js')}}"></script>
            <script src="{{asset('js/custom/modal.js')}}"></script>
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

                function edit(company) {
                    let id = company.dataset.id;
                    let name = company.dataset.name;
                    let telephone = company.dataset.telephone;
                    let email = company.dataset.email;
                    let image_path = company.dataset.image_path;
                    let website = company.dataset.website;

                    console.log(email)
                    $("#updateForm").find('.name').val(name);
                    $("#updateForm").find('.telephone').val(telephone);
                    $("#updateForm").find('.email').val(email);
                    $("#updateForm").find('.website').val(website);
                    $("#updateForm").find('.image_path').attr('src', image_path);
                    $("#updateForm").attr('action', '/company/' + id);
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
                                url: '/company/' + id,
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
                    $('#companyadd').validate({
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
    @endpush
