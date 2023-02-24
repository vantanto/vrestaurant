<div class="card">
    <div class="card-header">Reservation Traffic</div>
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
        <!-- /.row--><br>
        <table class="table table-responsive table-hover table-outline mb-0">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">
                        <svg class="c-icon">
                            <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-people"></use>
                        </svg>
                    </th>
                    <th>User</th>
                    <th class="text-center">Country</th>
                    <th>Usage</th>
                    <th class="text-center">Payment Method</th>
                    <th>Activity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">
                        <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/1.jpg" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>
                    </td>
                    <td>
                        <div>Yiorgos Avraamu</div>
                        <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/flag.svg#cif-us"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="clearfix">
                            <div class="float-left"><strong>50%</strong></div>
                            <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                        </div>
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/brand.svg#cib-cc-mastercard"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="small text-muted">Last login</div><strong>10 sec ago</strong>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/2.jpg" alt="user@email.com"><span class="c-avatar-status bg-danger"></span></div>
                    </td>
                    <td>
                        <div>Avram Tarasios</div>
                        <div class="small text-muted"><span>Recurring</span> | Registered: Jan 1, 2015</div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/flag.svg#cif-br"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="clearfix">
                            <div class="float-left"><strong>10%</strong></div>
                            <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                        </div>
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/brand.svg#cib-cc-visa"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="small text-muted">Last login</div><strong>5 minutes ago</strong>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/3.jpg" alt="user@email.com"><span class="c-avatar-status bg-warning"></span></div>
                    </td>
                    <td>
                        <div>Quintin Ed</div>
                        <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/flag.svg#cif-in"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="clearfix">
                            <div class="float-left"><strong>74%</strong></div>
                            <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                        </div>
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/brand.svg#cib-cc-stripe"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="small text-muted">Last login</div><strong>1 hour ago</strong>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/4.jpg" alt="user@email.com"><span class="c-avatar-status bg-secondary"></span></div>
                    </td>
                    <td>
                        <div>Enéas Kwadwo</div>
                        <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/flag.svg#cif-fr"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="clearfix">
                            <div class="float-left"><strong>98%</strong></div>
                            <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                        </div>
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/brand.svg#cib-cc-paypal"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="small text-muted">Last login</div><strong>Last month</strong>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/5.jpg" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>
                    </td>
                    <td>
                        <div>Agapetus Tadeáš</div>
                        <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/flag.svg#cif-es"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="clearfix">
                            <div class="float-left"><strong>22%</strong></div>
                            <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                        </div>
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/brand.svg#cib-cc-apple-pay"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="small text-muted">Last login</div><strong>Last week</strong>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/6.jpg" alt="user@email.com"><span class="c-avatar-status bg-danger"></span></div>
                    </td>
                    <td>
                        <div>Friderik Dávid</div>
                        <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/flag.svg#cif-pl"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="clearfix">
                            <div class="float-left"><strong>43%</strong></div>
                            <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                        </div>
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td class="text-center">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="node_modules/@coreui/icons/sprites/brand.svg#cib-cc-amex"></use>
                        </svg>
                    </td>
                    <td>
                        <div class="small text-muted">Last login</div><strong>Yesterday</strong>
                    </td>
                </tr>
            </tbody>
        </table>
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