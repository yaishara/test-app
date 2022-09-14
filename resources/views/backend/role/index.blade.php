@extends('backend.layouts.master')

@section('title','Roles')

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Roles </h5>
                            <p class="text-sm mb-0">
                                {{config('app.name')}} Manage All Roles
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            @can('role-create')
                            <div class="ms-auto my-auto">
                                <a type="button" class="btn bg-gradient-primary btn-sm mb-0"
                                   href="{{route('role.create')}}">
                                    + New Role
                                </a>
                            </div>
                                @endcan
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Permision Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">{{$role->name}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">{{$role->permissions->count()}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-sm">
                                    @can('role-edit')
                                    <a href="{{route('role.edit',$role->id)}}"
                                       class="mx-1"
                                       data-bs-toggle="tooltip" data-bs-original-title="Edit role">
                                        <i class="fas fa-edit text-info" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                        @can('role-delete')
                                    <a onclick="deleteItem({{$role->id}})" href="javascript:;"
                                       data-bs-toggle="tooltip" data-bs-original-title="Delete role">
                                        <i class="fas fa-trash text-danger" aria-hidden="true"></i>
                                    </a>
                                            @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $roles->links() }}
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
                                url: '/role/' + id,
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
