<?php

namespace Database\Seeders;

use App\Domain\Enum\Role;
use App\Models\Address;
use App\Models\TimeClock;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(5)
            ->for(Address::factory())
            ->has(User::factory()->count(10)
                ->for(Address::factory())
                ->has(TimeClock::factory()->count(20))
                ->state(function (array $attributes, User $user) {
                    return [
                        'role_id' => Role::EMPLOYEE->value,
                        'manager_id' => $user->id,
                    ];
                }), 'employees')
            ->create([
                'role_id' => Role::MANAGER->value,
                'manager_id' => 1,
            ]);
    }
}
