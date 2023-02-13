@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Detail Reservation</strong></div>
            <div class="card-body">
                <p class="text-center"><strong>{{ $reservation->code }}</strong></p>
                <table class="table table-sm">
                    <tr>
                        <td>
                            {{ date('d/m/Y', strtotime($reservation->date)) }} 
                            {{ date('H:i', strtotime($reservation->time)) }}
                        </td>
                        <td>
                            <x-reservation.badge-status :status="$reservation->status" />
                        </td>
                    </tr>
                </table>
                <table class="table table-sm table-borderless">
                    <colgroup>
                        <col class="col-md-4">
                        <col class="col-md-8">
                    </colgroup>
                    <tr>
                        <td>Name</td>
                        <td>{{ $reservation->name }}</td>
                    </tr>
                    <tr>
                        <td>People</td>
                        <td>{{ $reservation->people }} person</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $reservation->phone }}</td>
                    </tr>
                    <tr>
                        <td>Emall</td>
                        <td>{{ $reservation->email }}</td>
                    </tr>
                </table>
                @if ($reservation->status == \App\Models\Reservation::$Status['1'])
                    <div class="text-center">
                        <form method="post" action="{{ route('reservations.update.status', $reservation->code) }}">
                            @csrf
                            <input type="hidden" id="status" name="status" value="">
                            <button type="button" class="btn btn-success btn-update-status"
                                value="{{ \App\Models\Reservation::$Status['2'] }}"
                                onclick="confirmSwalAlert(this, null, '<span class=\'text-success\'>CONFIRMED</span> this Reservation.')">
                                Confirmed
                            </button>
                            <button type="button" class="btn btn-danger btn-update-status"
                                value="{{ \App\Models\Reservation::$Status['3'] }}"
                                onclick="confirmSwalAlert(this, null, '<span class=\'text-danger\'>CANCELLED</span> this Reservation.')">
                                Cancelled
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).on('click', '.btn-update-status', function() {
        $("#status").val(this.value);
    });
</script>
@endpush