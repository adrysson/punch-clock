<?php

namespace App\Http\Controllers;

use App\Domain\Repository\TimeClockRepository;
use Illuminate\Http\Request;

class TimeClockController extends Controller
{
    public function __construct(
        private TimeClockRepository $repository,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $timeClocks = $this->repository->all($startDate, $endDate);

        return view('time-clocks.index', compact('timeClocks'));
    }
}
