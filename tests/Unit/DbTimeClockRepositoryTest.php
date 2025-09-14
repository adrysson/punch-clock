<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Infrastructure\Repository\Db\DbTimeClockRepository;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;

class DbTimeClockRepositoryTest extends TestCase
{
    public function test_all_without_dates_calls_db_select_with_correct_query_and_no_bindings()
    {
        $repository = new DbTimeClockRepository();

        DB::shouldReceive('select')
            ->once()
            ->withArgs(function ($query, $bindings) {
                $this->assertStringContainsString('SELECT', $query);
                $this->assertStringContainsString('FROM time_clocks', $query);
                $this->assertStringNotContainsString('WHERE', $query);
                $this->assertEquals([], $bindings);
                return true;
            })
            ->andReturn([]);

        $result = $repository->all();
        $this->assertIsArray($result);
    }

    public function test_all_with_start_and_end_dates_calls_db_select_with_correct_where_and_bindings()
    {
        $repository = new DbTimeClockRepository();
        $startDate = '2025-09-01 00:00:00';
        $endDate = '2025-09-14 23:59:59';

        DB::shouldReceive('select')
            ->once()
            ->withArgs(function ($query, $bindings) use ($startDate, $endDate) {
                $this->assertStringContainsString('WHERE', $query);
                $this->assertStringContainsString('time_clocks.created_at >= ?', $query);
                $this->assertStringContainsString('time_clocks.created_at <= ?', $query);
                $this->assertEquals([$startDate, $endDate], $bindings);
                return true;
            })
            ->andReturn([]);

        $result = $repository->all($startDate, $endDate);
        $this->assertIsArray($result);
    }

    public function test_all_with_only_start_date_calls_db_select_with_correct_where_and_binding()
    {
        $repository = new DbTimeClockRepository();
        $startDate = '2025-09-01 00:00:00';

        DB::shouldReceive('select')
            ->once()
            ->withArgs(function ($query, $bindings) use ($startDate) {
                $this->assertStringContainsString('WHERE', $query);
                $this->assertStringContainsString('time_clocks.created_at >= ?', $query);
                $this->assertStringNotContainsString('time_clocks.created_at <= ?', $query);
                $this->assertEquals([$startDate], $bindings);
                return true;
            })
            ->andReturn([]);

        $result = $repository->all($startDate, null);
        $this->assertIsArray($result);
    }

    public function test_all_with_only_end_date_calls_db_select_with_correct_where_and_binding()
    {
        $repository = new DbTimeClockRepository();
        $endDate = '2025-09-14 23:59:59';

        DB::shouldReceive('select')
            ->once()
            ->withArgs(function ($query, $bindings) use ($endDate) {
                $this->assertStringContainsString('WHERE', $query);
                $this->assertStringNotContainsString('time_clocks.created_at >= ?', $query);
                $this->assertStringContainsString('time_clocks.created_at <= ?', $query);
                $this->assertEquals([$endDate], $bindings);
                return true;
            })
            ->andReturn([]);

        $result = $repository->all(null, $endDate);
        $this->assertIsArray($result);
    }
}
