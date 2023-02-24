<div class="row">
    @foreach ($reservationTotals as $keyReservationTotal => $reservationTotal)
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white 
                    @if($keyReservationTotal == 'people') bg-gradient-primary
                    @else bg-gradient-reservation-{{ $keyReservationTotal }}
                    @endif
                ">
                <div class="card-body card-body d-flex justify-content-between align-items-start">
                    <div>
                        <div class="text-value-lg">{{ $reservationTotal }}</div>
                        <div>{{ ucwords($keyReservationTotal) }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>