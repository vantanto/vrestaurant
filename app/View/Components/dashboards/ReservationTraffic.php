<?php

namespace App\View\Components\Dashboards;

use App\Helpers\Helper;
use App\Models\Reservation;
use Illuminate\View\Component;

class ReservationTraffic extends Component
{
    public $dateStart = "";
    public $dateEnd = "";
    public $reservationStatus = [];
    public $reservationByStatuses = [];
    public $reservationByDays = [];
    public $reservationByTimes = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dateStart = null, $dateEnd = null)
    {
        $this->dateStart = $dateStart ?? date('Y-m-01');
        $this->dateEnd = $dateEnd ?? date('Y-m-d');
        $this->reservationStatus = Reservation::$Status;

        $temp_reservationByDays = Reservation::selectRaw("
                DAYNAME(date) as day_name,
                time as day_time,
                status as day_status,
                COUNT(id) as day_count
            ")
            ->whereBetween('date', [$this->dateStart, $this->dateEnd])
            ->groupBy('day_name', 'time', 'status')
            ->orderBy('day_count', 'desc')
            ->get();
        
        foreach (Helper::$Days as $day) {
            foreach ($this->reservationStatus as $rsv_status) {
                $this->reservationByStatuses[$rsv_status] = 0;
                $this->reservationByDays[$day][$rsv_status] = 0;
                $this->reservationByTimes[$day][$rsv_status] = [];
            }
        }

        foreach ($temp_reservationByDays as $temp) {
            $this->reservationByStatuses[$temp->day_status] += $temp->day_count; 
            $this->reservationByDays[$temp->day_name][$temp->day_status] += $temp->day_count;
            $this->reservationByTimes[$temp->day_name][$temp->day_status][$temp->day_time] = $temp->day_count + 
                ($this->reservationByTimes[$temp->day_name][$temp->day_status][$temp->day_time] ?? 0);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboards.reservation-traffic');
    }
}
