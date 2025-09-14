<?php

namespace Tests\Integration\Infrastructure\Repository\Eloquent;

use App\Infrastructure\Repository\Eloquent\EloquentRoleRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EloquentRoleRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_returns_all_roles_as_array()
    {
        $repository = app(EloquentRoleRepository::class);

        $result = $repository->all();

        $this->assertCount(2, $result);
        $this->assertEquals(1, $result[0]['id']);
        $this->assertEquals('Gestor', $result[0]['name']);
        $this->assertEquals(2, $result[1]['id']);
        $this->assertEquals('Funcionário', $result[1]['name']);
    }
}
