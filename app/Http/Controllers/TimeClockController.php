<?php

namespace App\Http\Controllers;

use App\Models\TimeClock;
use Illuminate\Http\Request;

class TimeClockController extends Controller
{
    public function store(Request $request)
    {
        $timeClock = TimeClock::create([
            'user_id' => $request->user()->id,
        ]);

        return response()->json($timeClock, 201);
    }
}
