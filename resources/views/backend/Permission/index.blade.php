@extends('backend.layouts.master')

@section('title','Permissions')

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Permissions </h5>
                            <p class="text-sm mb-0">
                                {{config('app.name')}} Permissions
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            @can('permission-create')
                                <div class="ms-auto my-auto">
                                    <button type="button" class="btn bg-gradient-primary btn-sm mb-0"
                                            data-bs-toggle="modal"
                                            data-bs-target="#createModal">
                                        + New Permission
                                    </button>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Guard Name
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Group Name
                            </th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permissions)
                            <tr>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0"> {{$permissions->name}}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0"> {{$permissions->guard_name}}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0"> {{optional($permissions->group)->name}}</p>
                                </td>
                                <td class="text-sm">
                                    @can('permission-edit')
                                        <a href="javascript:;" onclick="edit(this)" data-id="{{$permissions->id}}"
                                           data-name="{{$permissions->name}}"
                                           data-guard_name="{{$permissions->guard_name}}"
                                           data-permission_group="{{$permissions->permission_group_id}}"
                                           class="mx-3"
                                           data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                            <i class="fas fa-user-edit text-secondary" aria-hidden="true"></i>
                                        </a>
                                    @endcan
                                    @can('permission-delete')
                                        <a onclick="deleteItem({{$permissions->id}})" href="javascript:;"
                                           data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                            <i class="fas fa-trash text-secondary" aria-hidden="true"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{--                    {{ $permissions->links() }}--}}
                </div>
            </div>
        </div>

        <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog mt-lg-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Create New Permission </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {!! Form::open(['route'=>'permissions.store','files'=>true]) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::select('permission_group',$permissionGroup,null,['class'=>'form-control','placeholder'=>'Select Group','required','id'=>'permission_group']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="Name" id="name"
                                           required class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="guard_name" type="text" placeholder="Guard Name" id="Guard Name"
                                           required class="form-control"/>
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
                        <h5 class="modal-title" id="ModalLabel">Update Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {!! Form::open(['route'=>'permissions.store','method'=>'put','id'=>'updateForm','files'=>true]) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::select('permission_group',$permissionGroup,null,['class'=>'form-control permission_group','placeholder'=>'Select Group','required','id'=>'permission_group']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="Name"
                                           required class="form-control name"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="guard_name" type="text" placeholder="Guard Name"
                                           required class="form-control name guard_name"/>
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

                function edit(item) {
                    let id = item.dataset.id;
                    let name = item.dataset.name;
                    let guard_name = item.dataset.guard_name;
                    let permission_group = item.dataset.permission_group;

                    $("#updateForm").find('.name').val(name);
                    $("#updateForm").find('.guard_name').val(guard_name);
                    $("#updateForm").find('.permission_group').val(permission_group);
                    $("#updateForm").attr('action', '/permissions/' + id);
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
                                url: '/permissions/' + id,
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
