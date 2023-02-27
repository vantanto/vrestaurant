<div class="card">
    <div class="card-header">
        Reservation Traffic by Day
        <div class="small text-muted">{{ Helper::dateFormatMonthYear($dateStart, $dateEnd) }}</div>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($reservationByStatuses as $keyReservation => $reservationByStatus)
            <div class="col-4">
                <div class="c-callout c-callout-reservation-{{ $keyReservation }}"><small class="text-muted">{{ ucwords($keyReservation) }}</small>
                    <div class="text-value-lg">{{ number_format($reservationByStatus) }}</div>
                </div>
            </div>
            @endforeach
        </div>
        <hr class="mt-0">
        <div class="row">
            <div class="col-md-6">
                @foreach ($reservationByDays as $keyDay => $reservationByDay)
                    <div class="progress-group mb-4">
                        <div class="progress-group-prepend">
                            <span class="progress-group-text">
                                <span class="text-hover reservation-day-tab @if($loop->first) active @endif" 
                                    data-tab="tabview"
                                    data-tab-active=".reservation-day-tab"
                                    data-tab-target="#tab-reservation-day-{{ $keyDay }}"
                                    data-tab-hidden=".tab-reservation-day">
                                    {{ $keyDay }}
                                </span>
                            </span>
                        </div>
                        <div class="progress-group-bars">
                            @foreach ($reservationStatus as $rsv_status)
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-reservation-{{ $rsv_status }}" role="progressbar" 
                                        style="width: {{ $reservationByDay[$rsv_status] > 0 
                                            ? $reservationByDay[$rsv_status]/array_sum($reservationByDay)*100 
                                            : 0}}%" 
                                        aria-valuenow="{{ $reservationByDay[$rsv_status] }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="{{ array_sum($reservationByDay) }}"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-sm-6">
                @foreach ($reservationByDays as $keyDay => $reservationByDay)
                    <div id="tab-reservation-day-{{ $keyDay }}" class="tab-reservation-day" style="@if(!$loop->first) display: none; @endif">
                        <p class="mb-0">{{ $keyDay }}</p>
                        <div class="row">
                            @foreach ($reservationStatus as $rsv_status)
                                <div class="col-4">
                                    <div class="c-callout c-callout-reservation-{{ $rsv_status }} reservation-time-tab-{{ $keyDay }} text-hover @if($loop->first) active @endif"
                                        data-tab="tabview"
                                        data-tab-active=".reservation-time-tab-{{ $keyDay }}"
                                        data-tab-target="#tab-reservation-time-{{ $keyDay }}-{{ $rsv_status }}"
                                        data-tab-hidden=".tab-reservation-time-{{ $keyDay }}">
                                        <small class="text-muted">{{ ucwords($rsv_status) }}</small>
                                        <div class="text-value-lg">{{ $reservationByDay[$rsv_status] }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr class="mt-0">
                        @foreach ($reservationStatus as $rsv_status)
                            <div id="tab-reservation-time-{{ $keyDay }}-{{ $rsv_status }}" class="tab-reservation-time-{{ $keyDay }}" style="@if(!$loop->first) display: none; @endif">
                                <p class="mb-0 text-center">{{ ucwords($rsv_status) }}</p>
                                <div class="table-responsive" style="max-height: 200px; overflow: auto;">
                                    <table class="table table-sm table-borderless table-striped">
                                        <colgroup>
                                            <col class="col-6">
                                            <col class="col-6">
                                        </colgroup>
                                        @foreach ($reservationByTimes[$keyDay][$rsv_status] as $keyTime => $reservationTime)
                                            <tr>
                                                <td>{{ date('H:i', strtotime($keyTime)) }}</td>
                                                <th class="text-right">{{ $reservationTime }}</th>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).on('click', '[data-tab="tabview"]', function() {
        const element = $(this);
        $(element.attr('data-tab-hidden')).hide();
        $(element.attr('data-tab-active')).removeClass('active');
        $(element.attr('data-tab-target')).fadeIn();
        if(element.attr('data-tab-active')) element.addClass('active');
    });
</script>
@endpush