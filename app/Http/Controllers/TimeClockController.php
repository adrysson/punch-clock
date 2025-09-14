<?php

namespace App\Http\Controllers;

use App\Models\TimeClock;
use Illuminate\Http\Request;

class TimeClockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $builder = TimeClock::query();

        if ($request->filled('start_date')) {
            $builder->whereDate('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $builder->whereDate('created_at', '<=', $request->input('end_date'));
        }

        $timeClocks = $builder->paginate();

        return view('time-clocks.index', compact('timeClocks'));
    }
}
