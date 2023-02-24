<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $dateStart = Carbon::now()->startOfMonth()->format('Y-m-d');
        $dateEnd = Carbon::now()->format('Y-m-d');

        return view('admin.dashboard', compact('dateStart', 'dateEnd'));
    }
}
