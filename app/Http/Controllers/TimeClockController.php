<?php

namespace App\Http\Controllers;

use App\Models\TimeClock;
use Illuminate\Http\Request;

class TimeClockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timeClocks = TimeClock::latest()->paginate();

        return view('time-clocks.index', compact('timeClocks'));
    }
}
