<?php

namespace App\Infrastructure\Repository\Db;

use App\Domain\Repository\TimeClockRepository;
use Illuminate\Support\Facades\DB;

class DbTimeClockRepository implements TimeClockRepository
{
    /**
     * {@inheritdoc}
     */
    public function all(?string $startDate = null, ?string $endDate = null): array
    {
        [$where, $bindings] = $this->buildWhereAndBindings($startDate, $endDate);
        $whereClause = $this->buildWhereClause($where);

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
            $whereClause
            ORDER BY time_clocks.created_at DESC
        ";

        return DB::select($query, $bindings);
    }

    /**
     * Cria o array de condições para o WHERE
     */
    /**
     * Cria o array de condições para o WHERE e os bindings
     */
    private function buildWhereAndBindings(?string $startDate, ?string $endDate): array
    {
        $where = [];
        $bindings = [];
        if ($startDate) {
            $where[] = "time_clocks.created_at >= ?";
            $bindings[] = $startDate;
        }
        if ($endDate) {
            $where[] = "time_clocks.created_at <= ?";
            $bindings[] = $endDate;
        }
        return [$where, $bindings];
    }

    /**
     * Cria a cláusula WHERE a partir do array de condições
     */
    private function buildWhereClause(array $where): string
    {
        if (count($where) > 0) {
            return 'WHERE ' . implode(' AND ', $where);
        }
        return '';
    }
}
