<?php

namespace App\View\Components\Dashboards;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\View\Component;

class ReservationChart extends Component
{
    public $dateStart;
    public $dateEnd;
    public $rsvTraffic;
    public $reservationStatus = [];
    public $reservationChartsMax = 0;
    public $reservationTotal = [];
    public $reservationCharts = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rsvTraffic = null, $dateStart = null, $dateEnd = null)
    {
        $this->rsvTraffic = $rsvTraffic ?? 'day';
        if ($this->rsvTraffic == 'year') {
            $this->dateStart = date('Y-m-01', strtotime('-5 year'));
        } elseif ($this->rsvTraffic == 'month') {
            $this->dateStart = date('Y-m-01', strtotime('-13 month'));
        } else {
            $this->dateStart = date('Y-m-d', strtotime('-15 day'));
        }
        $this->dateStart = Carbon::parse($dateStart ?? $this->dateStart);
        $this->dateEnd = Carbon::parse($dateEnd ?? date('Y-m-d'));
        $this->reservationStatus = Reservation::$Status;

        $diffDate = $dateLabel = "";

        $temp_reservationChart = Reservation::select('status', 'date')
            ->selectRaw('SUM(people) as chart_sum')
            ->selectRaw('COUNT(id) as chart_count')
            ->whereBetween('date', [$this->dateStart->toDateString(), $this->dateEnd->toDateString()])
            ->orderBy('date')
            ->groupBy('status');

        if ($this->rsvTraffic == 'year') {
            $diffDate = $this->dateStart->diffInYears($this->dateEnd);
            $dateLabel = 'Y';
            $temp_reservationChart->groupByRaw('YEAR(date)');
        } elseif ($this->rsvTraffic == 'month') {
            $diffDate = $this->dateStart->diffInMonths($this->dateEnd);
            $dateLabel = 'm/y';
            $temp_reservationChart->groupByRaw('YEAR(date), MONTH(date)');
        } else {
            $diffDate = $this->dateStart->diffInDays($this->dateEnd);
            $dateLabel = 'd/n';
            $temp_reservationChart->groupByRaw('date');
        }

        $temp_reservationChart = $temp_reservationChart->get();
        
        for ($i=0; $i<=$diffDate; $i++) {
            $checkDate = $this->dateStart->copy();
            $checkDate = $this->rsvTraffic == 'year'
                ? $checkDate->addYears($i)
                : ($this->rsvTraffic == 'month' ? $checkDate->addMonths($i) : $checkDate->addDays($i));
            $checkDate = $checkDate->format($dateLabel);
            $this->reservationCharts[$checkDate]['label'] = $checkDate;
            foreach ($this->reservationStatus as $rsv_status) {
                $this->reservationCharts[$checkDate][$rsv_status.'_sum'] = 0;
                $this->reservationCharts[$checkDate][$rsv_status.'_count'] = 0;
            }
        }

        foreach ($this->reservationStatus as $rsv_status) {
            $this->reservationTotal[$rsv_status] = 0;
        }

        foreach ($temp_reservationChart as $temp) {
            if ($temp->chart_count > $this->reservationChartsMax) $this->reservationChartsMax = $temp->chart_count;
            $checkDate = Carbon::parse($temp->date)->format($dateLabel);
            $this->reservationCharts[$checkDate][$temp->status.'_sum'] += $temp->chart_sum;
            $this->reservationCharts[$checkDate][$temp->status.'_count'] += $temp->chart_count;
            $this->reservationTotal[$temp->status] += $temp->chart_count;
        }

        $this->reservationCharts = collect($this->reservationCharts);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboards.reservation-chart');
    }
}
