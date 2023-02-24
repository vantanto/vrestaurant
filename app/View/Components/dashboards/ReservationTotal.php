<?php

namespace App\View\Components\Dashboards;

use App\Models\Reservation;
use Illuminate\View\Component;

class ReservationTotal extends Component
{
    public $dateStart;
    public $dateEnd;
    public $reservationStatus = [];
    public $reservationTotals = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dateStart = null, $dateEnd = null)
    {
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
        $this->reservationStatus = Reservation::$Status;
        
        $this->reservationTotals['people'] = Reservation::where('status', Reservation::$Status['2'])
            ->whereBetween('date', [$this->dateStart, $this->dateEnd])
            ->sum('people');
        
        foreach ($this->reservationStatus as $rsv_status) {
            $this->reservationTotals[$rsv_status] = Reservation::where('status', $rsv_status)
                ->whereBetween('date', [$this->dateStart, $this->dateEnd])
                ->count();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboards.reservation-total');
    }
}
