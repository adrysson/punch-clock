<?php

namespace Tests\Unit;

use App\Infrastructure\Repository\Eloquent\EloquentRoleRepository;
use App\Models\Role;
use PHPUnit\Framework\TestCase;
use Mockery;

class EloquentRoleRepositoryTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_all_returns_roles_as_array_from_model_mock()
    {
        $expected = [
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 2, 'name' => 'User'],
        ];

        $mockCollection = Mockery::mock('Illuminate\\Database\\Eloquent\\Collection');
        $mockCollection->shouldReceive('toArray')->once()->andReturn($expected);

        $model = Mockery::mock(Role::class);
        $model->shouldReceive('all')->once()->andReturn($mockCollection);

        $repository = new EloquentRoleRepository($model);

        $result = $repository->all();

        $this->assertEquals($expected, $result);
    }
}
