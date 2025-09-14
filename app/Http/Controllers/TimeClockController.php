<?php

namespace App\Http\Controllers;

use App\Models\TimeClock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $query = $this->buildQuery($request);

        $timeClocks = DB::select($query);

        return view('time-clocks.index', compact('timeClocks'));
    }

    private function buildQuery(Request $request): string
    {
        $startDateFilter = $this->getStartDateFilter($request);

        $endDateFilter = $this->getEndDateFilter($request);

        $query = "SELECT
                time_clocks.id,
                employee.name AS employee_name,
                employee_role.name AS employee_role_name,
                employee.birth_date AS employee_bith_date,
                manager.name AS manager_name,
                time_clocks.created_at AS clock_in_time
            FROM time_clocks
                INNER JOIN users AS employee ON employee.id = time_clocks.user_id
                INNER JOIN roles as employee_role ON employee_role.id = employee.role_id
                LEFT JOIN users AS manager ON manager.id = employee.manager_id
            $startDateFilter
            $endDateFilter
            ORDER BY time_clocks.created_at DESC
        ";

        return $query;
    }

    private function getStartDateFilter(Request $request)
    {
        if (! $request->filled('start_date')) {
            return '';
        }

        return "WHERE time_clocks.created_at >= '" . $request->input('start_date') . "'";
    }

    private function getEndDateFilter(Request $request)
    {
        if (! $request->filled('end_date')) {
            return '';
        }

        $filter = "time_clocks.created_at <= '" . $request->input('end_date') . "'";

        $operator = $request->filled('start_date') ? 'AND' : 'WHERE';

        return "$operator $filter";
    }
}
