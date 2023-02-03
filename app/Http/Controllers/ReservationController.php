<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function generateCode($date)
    {
        $date = strtotime($date);
        $monthAlph = date('F', $date);
        $lastReservation = Reservation::where('date', date('Y-m-d', $date))
            ->orderBy('id', 'desc')
            ->limit(1)->value('code') ?? '000---';
        $reservationCount = (int) substr($lastReservation, -6, 3) + 1;
        return strtoupper(
            'B'.
            date('y', $date).
            date('H').
            str_pad($reservationCount, 3, '0', STR_PAD_LEFT).
            date('d', $date).
            ($monthAlph == "January" ? "U" : ($monthAlph == "Mach" ? "H" : substr($monthAlph, 2, 1)))
        );
    }

    public function create()
    {
        $times = Time::where('active', true)
            ->orderBy('time')
            ->get();
        return view('reservation.create', compact('times'));
    }
    
    public function store(ReservationStoreRequest $request)
    {
        $reservation = new Reservation();
        $reservation->fill($request->only([
            'time',
            'name',
            'phone',
            'email',
            'people',
            'status', 
        ]));
        $reservation->date = Carbon::createFromFormat('d/m/Y', $request->date)->toDateString();
        $reservation->code = $this->generateCode($reservation->date);
        $reservation->status = Reservation::$Status['1'];
        $reservation->save();
    }

    public function show(Request $request, $code)
    {
        $reservation = Reservation::select('code', 'date', 'time', 'name', 'people')
            ->where('code', $code)
            ->firstOrFail();
        return view('reservation.show', compact('reservation'));
    }
}
