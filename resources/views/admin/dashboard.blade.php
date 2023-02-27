@extends('admin.layouts.app')
@section('content')
<div class="fade-in">
    <x-dashboards.reservation-total />
    
    <x-dashboards.reservation-chart :rsvTraffic="request()->input('rsvc_traffic')" />
    
    <div class="row">
        <div class="col-md-12">
            <x-dashboards.reservation-traffic-by-day :$dateStart :$dateEnd />
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