@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Create Reservation</strong></div>
            <div class="card-body">
                <form id="mainForm" method="post" action="{{ route('reservations.store') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="time">Time</label>
                            <select id="time" name="time" class="form-control" required>
                                @foreach ($times as $time)
                                    <option value="{{ $time->time }}">{{ date('H:i', strtotime($time->time)) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="people">People</label>
                            <select id="people" name="people" class="form-control" required>
                                @for ($i=1; $i<=12; $i++)
                                    <option value="{{ $i }}">{{ $i }} person</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>mainFormSubmit();</script>
@endpush