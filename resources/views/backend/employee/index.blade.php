@extends('backend.layouts.master')

@section('title','Employee')

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Employee </h5>
                            <p class="text-sm mb-0">
                                {{config('app.name')}} Employee
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            @can('employee-create')
                                <div class="ms-auto my-auto">
                                    <button type="button" class="btn bg-gradient-primary btn-sm mb-0"
                                            data-bs-toggle="modal"
                                            data-bs-target="#createModal">
                                        + New Employee
                                    </button>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
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
                        <h5 class="modal-title" id="ModalLabel">Create New Employee </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {!! Form::open(['route'=>'employee.store','files'=>true]) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::select('company_id',$company,null,['class'=>'form-control','placeholder'=>'Select Comapny','required','id'=>'company_id']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="first_name" type="text" placeholder="First Name" id="first_name"
                                           required class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="last_name" type="text" placeholder="Last Name" id="last_name"
                                           required class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="email" type="text" placeholder="Email" id="email"
                                           required class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="phone" type="text" placeholder="Phone Number" id="phone"
                                           required class="form-control"/>
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
                        <h5 class="modal-title" id="ModalLabel">Update Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {!! Form::open(['route'=>'employee.store','method'=>'put','id'=>'updateForm','files'=>true]) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::select('company_id',$company,null,['class'=>'form-control company_id','placeholder'=>'Select Company','required','id'=>'company_id']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="first_name" type="text" placeholder="First Name"  id="first_name"
                                           required class="form-control first_name"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="last_name" type="text" placeholder="Last Name" id="last_name"
                                           required class="form-control last_name"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="email" type="text" placeholder="Email" id="email"
                                           required class="form-control email"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="phone" type="text" placeholder="Phone Number" id="phone"
                                           required class="form-control phone"/>
                                </div>
                            </div>
                            <div class="col-md-12 dropzone2" id="dropzone2">
                                <p>Select Image</p>
                                <img src="" class="image_path">
                                <div class="fallback">
                                    <input name="image_path" type="file" id="image_path" class="image_path"/>
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

            <script>

                function edit(item) {
                    let id = item.dataset.id;
                    let first_name = item.dataset.first_name;
                    let last_name = item.dataset.last_name;
                    let email = item.dataset.email;
                    let phone = item.dataset.phone;
                    let company_id = item.dataset.company_id;

                    $("#updateForm").find('.first_name').val(first_name);
                    $("#updateForm").find('.last_name').val(last_name);
                    $("#updateForm").find('.email').val(email);
                    $("#updateForm").find('.phone').val(phone);
                    $("#updateForm").find('.company_id').val(company_id);
                    $("#updateForm").attr('action', '/employee/' + id);
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
                                url: '/employee/' + id,
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
    @endpush
