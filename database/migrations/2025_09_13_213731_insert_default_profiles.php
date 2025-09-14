<?php

use App\Domain\Enum\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('profiles')->insert([
            [
                'id' => Role::MANAGER->value,
                'name' => 'Gestor',
                'description' => 'Perfil de gestor com acesso total',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Role::EMPLOYEE->value,
                'name' => 'Funcionário',
                'description' => 'Perfil de funcionário com acesso limitado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('profiles')->whereIn('name', ['admin', 'employee'])->delete();
    }
};
