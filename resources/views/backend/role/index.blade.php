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
                    {!! $dataTable->table() !!}
                </div>
                <div class="col-md-12">

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
