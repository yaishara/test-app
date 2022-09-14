@extends('backend.layouts.master')

@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 position-relative z-index-2">
            <div class="card card-plain mb-4">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <h2 class="font-weight-bolder mb-0">Dashboard</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-lg-12 col-sm-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0">Vendors</h6>

                        <canvas id="chart-pie" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')

@endpush

@push('scripts')
    <script src="{{asset('js/plugins/chartjs.min.js')}}"></script>
    <script src="{{asset('js/soft-ui-dashboard.min.js')}}"></script>
    <script>


    </script>
@endpush
