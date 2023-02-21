@extends('admin.layouts.app')
@section('content')
<x-forms.filter :search_placeholder="'Code, Name, Phone, Email'" :status="false">
    <x-slot name="slot_top">
        <div class="form-group col-md-2">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="">All Status</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status }}"
                        @if($status == request()->input('status')) selected @endif>
                        {{ ucwords($status) }}
                    </option>
                @endforeach
            </select>
        </div>
    </x-slot>
    <div class="row">
        <div class="form-group col-md-4">
            <label>Date Start</label>
            <input type="datetime-local" name="date_start" class="form-control" value="{{ request()->input('date_start') }}" >
        </div>
        <div class="form-group col-md-4">
            <label>Date End</label>
            <input type="datetime-local" name="date_end" class="form-control" value="{{ request()->input('date_end') }}" >
        </div>
        <div class="form-group col-md-4">
            <label>People</label>
            <select name="people" class="form-control">
                <option value="">All People</option>
                @for ($i=1; $i<=12; $i++)
                    <option value="{{ $i }}">{{ $i }} person</option>
                @endfor
            </select>
        </div>
    </div>
</x-forms.filter>
<div class="card">
    <div class="card-header">
        <strong>List Reservation</strong>
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('reservations.create') }}">
                <i class="fa fa-plus"></i>
                Create Reservation
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Date</th>
                    <th>People</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
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
                            {{ date('D, d/m/Y', strtotime($reservation->date)) }} 
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
                        <td>
                            <a href="{{ route('reservations.show', $reservation->code) }}" class="btn btn-info mb-1">Detail</a>
                            <a href="{{ route('reservations.edit', $reservation->code) }}" class="btn btn-warning mb-1">Edit</a>
                            <form method="post" action="{{ route('reservations.destroy', $reservation->code) }}" class="d-inline mb-1">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reservations->links() }}
    </div>
</div>
@endsection