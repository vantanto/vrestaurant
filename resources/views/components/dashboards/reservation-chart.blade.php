<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="card-title mb-0">Reservation Traffic</h4>
                <div class="small text-muted">{{ Helper::dateFormatMonthYear($dateStart, $dateEnd, true) }}</div>
            </div>
            <form method="get" action="{{ url()->current() }}">
                @foreach (request()->input() as $qs => $queryString)
                    @if($qs != 'rsvc_traffic')
                        <input type="hidden" name="{{ $qs }}" value="{{ $queryString }}" />
                    @endif
                @endforeach
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <div class="btn-group btn-group-toggle mx-3" data-toggle="buttons">
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="rsvc_traffic" autocomplete="off" value="day"
                            @if($rsvTraffic == 'day') checked @endif> Day
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="rsvc_traffic" autocomplete="off" value="month"
                            @if($rsvTraffic == 'month') checked @endif> Month
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="rsvc_traffic" autocomplete="off" value="year"
                            @if($rsvTraffic == 'year') checked @endif> Year
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
            <canvas class="chart" id="reservation-chart" height="300"></canvas>
        </div>
    </div>
    <div class="card-footer">
        <div class="row text-center">
            @foreach ($reservationStatus as $rsv_status)
                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">{{ ucwords($rsv_status) }}</div>
                    <strong>{{ $reservationTotal[$rsv_status] }}</strong>
                    <div class="progress progress-xs mt-2">
                        <div class="progress-bar bg-gradient-reservation-{{ $rsv_status }}" role="progressbar" 
                            style="width: {{ $reservationTotal[$rsv_status] > 0 
                                ? $reservationTotal[$rsv_status]/array_sum($reservationTotal)*100 
                                : 0}}%" 
                            aria-valuenow="{{ $reservationTotal[$rsv_status] }}" 
                            aria-valuemin="0" 
                            aria-valuemax="{{ array_sum($reservationTotal) }}"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/coreui/coreui-chartjs.bundle.min.js') }}"></script>

<script>
    var mainChart = new Chart(document.getElementById('reservation-chart'), {
        type: 'line',
        data: {
        labels: @json($reservationCharts->pluck('label')),
        datasets: [{
            label: "{{ ucwords($reservationStatus['1']) }}",
            backgroundColor: 'transparent',
            borderColor: coreui.Utils.getStyle('--warning'),
            pointHoverBackgroundColor: '#fff',
            borderWidth: 2,
            data: @json($reservationCharts->pluck($reservationStatus['1'].'_count'))
        }, {
            label: "{{ ucwords($reservationStatus['2']) }}",
            backgroundColor: coreui.Utils.hexToRgba(coreui.Utils.getStyle('--info'), 10),
            borderColor: coreui.Utils.getStyle('--success'),
            pointHoverBackgroundColor: '#fff',
            borderWidth: 2,
            data: @json($reservationCharts->pluck($reservationStatus['2'].'_count'))
        }, {
            label: "{{ ucwords($reservationStatus['3']) }}",
            backgroundColor: 'transparent',
            borderColor: coreui.Utils.getStyle('--danger'),
            pointHoverBackgroundColor: '#fff',
            borderWidth: 1,
            borderDash: [8, 5],
            data: @json($reservationCharts->pluck($reservationStatus['3'].'_count'))
        }]
    }, options: {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    drawOnChartArea: false
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    maxTicksLimit: 5,
                    stepSize: Math.ceil(parseInt("{{ $reservationChartsMax }}") / 5),
                    max: parseInt("{{ $reservationChartsMax }}")
                }
            }]
        },
        elements: {
            point: {
                radius: 0,
                hitRadius: 10,
                hoverRadius: 4,
                hoverBorderWidth: 3
            }
        }
    }});
</script>
<script>
    $(document).on('change', 'input[type="radio"][name="rsvc_traffic"]', function() {
        $(this).closest('form').submit();
    })
</script>
@endpush