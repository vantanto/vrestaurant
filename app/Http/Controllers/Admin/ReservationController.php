<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $statuses = Reservation::$Status;
        $times = Time::where('active', true)->get();
        $reservations = Reservation::orderBy('id', 'desc');

        if ($request->search != null) {
            $reservations->where(
                fn ($query)  =>
                $query->where('code', 'like', '%' . $request->seach . '%')
                    ->orWhere('name', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
            );
        }
        if ($request->status != null){
            $reservations->where('status', $request->status);
        }
        if ($request->date_start != null) {
            $reservations->where('date', '>=', $request->date_start);
        }
        if ($request->date_end != null) {
            $date_end = Carbon::parse($request->date_end);
            $reservations->where('date', '<=', $request->date_end);
        }
        if ($request->time_start != null) {
            $reservations->where('time', '>=', $request->time_start);
        }
        if ($request->time_end != null) {
            $reservations->where('time', '<=', $request->time_end);
        }
        if ($request->people != null) {
            $reservations->where('people', $request->people);
        }

        $reservations = $reservations->paginate(10);
        return view('admin.reservation.index', compact('statuses', 'times', 'reservations'));
    }

    public function create(Request $request)
    {
        $times = Time::where('active', true)
            ->orderBy('time')
            ->get();
        return view('admin.reservation.create', compact('times'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'date' => 'required|after:tommorrow',
            'time' => 'required|exists:times,time',
            'people' => 'required|numeric|min:1|max:12',
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $reservation = new Reservation();
            $reservation->fill($request->only([
                'date',
                'time',
                'name',
                'phone',
                'email',
                'people',
            ]));
            $reservation->code = (new \App\Http\Controllers\ReservationController)->generateCode($reservation->date);
            $reservation->status = Reservation::$Status['1'];
            $reservation->save();
            DB::commit();
            return response()->json(['status' => 'success', 'msg' => 'Reservation Successfully Created.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Reservation Failed Created.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function show(Request $request, $code)
    {
        $reservation = Reservation::where('code', $code)->firstOrFail();
        return view('admin.reservation.show', compact('reservation'));
    }

    public function edit(Request $request, $code)
    {
        $times = Time::where('active', true)
            ->orderBy('time')
            ->get();
        $reservation = Reservation::where('code', $code)->firstOrFail();
        return view('admin.reservation.edit', compact('times', 'reservation'));
    }

    public function update(Request $request, $code)
    {
        $reservation = Reservation::where('code', $code)->firstOrFail();
        $validator = \Validator::make($request->all(), [
            'date' => 'required|after:tommorrow',
            'time' => 'required|exists:times,time',
            'people' => 'required|numeric|min:1|max:12',
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $reservation->fill($request->only([
                'date',
                'time',
                'name',
                'phone',
                'email',
                'people',
            ]));
            $reservation->save();
            DB::commit();

            return response()->json(['status' => 'success', 'msg' => 'Reservation Successfully Updated.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Reservation Failed Updated.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function updateStatus(Request $request, $code)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $reservation = Reservation::where('code', $code)->firstOrFail();
        $reservation->status = $request->status;
        $reservation->save();
        return back()->with('success', 'Reservation Status Successfully Updated.');
    }

    public function destroy(Request $request, $code)
    {
        $reservation = Reservation::where('code', $code)->firstOrFail();
        $reservation->delete();
        return redirect()->back()->with('success', 'Reservation Successfully Deleted.');
    }
}
