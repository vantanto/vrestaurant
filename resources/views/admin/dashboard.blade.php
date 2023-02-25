@extends('admin.layouts.app')
@section('content')
<div class="fade-in">
    <x-dashboards.reservation-total />
    <!-- /.row-->
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="card-title mb-0">Traffic</h4>
                    <div class="small text-muted">September 2019</div>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <div class="btn-group btn-group-toggle mx-3" data-toggle="buttons">
                        <label class="btn btn-outline-secondary">
                            <input id="option1" type="radio" name="options" autocomplete="off"> Day
                        </label>
                        <label class="btn btn-outline-secondary active">
                            <input id="option2" type="radio" name="options" autocomplete="off" checked=""> Month
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input id="option3" type="radio" name="options" autocomplete="off"> Year
                        </label>
                    </div>
                    <button class="btn btn-primary" type="button">
                        <svg class="c-icon">
                            <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-cloud-download"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
                <canvas class="chart" id="main-chart" height="300"></canvas>
            </div>
        </div>
        <div class="card-footer">
            <div class="row text-center">
                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Visits</div><strong>29.703 Users (40%)</strong>
                    <div class="progress progress-xs mt-2">
                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Unique</div><strong>24.093 Users (20%)</strong>
                    <div class="progress progress-xs mt-2">
                        <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Pageviews</div><strong>78.706 Views (60%)</strong>
                    <div class="progress progress-xs mt-2">
                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">New Users</div><strong>22.123 Users (80%)</strong>
                    <div class="progress progress-xs mt-2">
                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Bounce Rate</div><strong>40.15%</strong>
                    <div class="progress progress-xs mt-2">
                        <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-->
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-header bg-facebook content-center">
                    <svg class="c-icon c-icon-3xl text-white my-4">
                        <use xlink:href="node_modules/@coreui/icons/sprites/brand.svg#cib-facebook-f"></use>
                    </svg>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl">89k</div>
                        <div class="text-uppercase text-muted small">friends</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">459</div>
                        <div class="text-uppercase text-muted small">feeds</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-header bg-twitter content-center">
                    <svg class="c-icon c-icon-3xl text-white my-4">
                        <use xlink:href="node_modules/@coreui/icons/sprites/brand.svg#cib-twitter"></use>
                    </svg>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl">973k</div>
                        <div class="text-uppercase text-muted small">followers</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">1.792</div>
                        <div class="text-uppercase text-muted small">tweets</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-header bg-linkedin content-center">
                    <svg class="c-icon c-icon-3xl text-white my-4">
                        <use xlink:href="node_modules/@coreui/icons/sprites/brand.svg#cib-linkedin"></use>
                    </svg>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl">500+</div>
                        <div class="text-uppercase text-muted small">contacts</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">292</div>
                        <div class="text-uppercase text-muted small">feeds</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->
    <div class="row">
        <div class="col-md-12">
            <x-dashboards.reservation-traffic :$dateStart :$dateEnd />
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Today Reservation ({{ count($reservations) }})</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-outline mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Time</th>
                                    <th>People</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td>
                                            <a href="{{ route('reservations.show', $reservation->code) }}">
                                                {{ $reservation->code }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ date('H:i', strtotime($reservation->time)) }}
                                        </td>
                                        <td>
                                            {{ $reservation->people }} person
                                        </td>
                                        <td>
                                            {{ $reservation->name }}
                                        </td>
                                        <td>
                                            {{ $reservation->phone }}
                                        </td>
                                        <td>
                                            {{ $reservation->email }}
                                        </td>
                                        <td>
                                            <x-reservation.badge-status :status="$reservation->status" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection