@extends('backend.layouts.master')

@section('title','Role')

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Create a Role </h5>
                            <p class="text-sm mb-0">
                                {{config('app.name')}} create new Role
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['route'=>'role.store','files'=>true,'id'=>'createproduct']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Role Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Role Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                        @foreach($permissionGroups as $value)

                            <div class="col-md-4">
                                <ol>
                                    <li style="list-style-type: none; ">
                                        <label style="font-weight: bold;color: #0a6aa1">
                                            {{ $value->name }}</label>
                                    </li>
                                    <ul>
                                        <li style="list-style-type: none;">
                                            @foreach($value->permissions as $key=>$per)

                                                <div class="col-md-3">
                                                    <div class="form-check my-auto text-nowrap">
                                                        <input class="form-check-input" name="permission[]"
                                                               type="checkbox"
                                                               id="permission[]" value="{{$per->name}}">{{$per->name}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </li>
                                    </ul>
                                </ol>
                            </div>

                        @endforeach
                    </div>
                    <hr>
                    <div class="card-footer float-end">
                        <button type="button" class="btn bg-gradient-secondary btn-sm">Cancel</button>
                        <button type="submit" class="btn bg-gradient-primary btn-sm">Create</button>
                    </div>
                    {!! Form::close() !!}
                </div>
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
            $('#createproduct').validate({
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
@endpush
