<?php

use App\Domain\Enum\Profile;
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
                'id' => Profile::ADMIN->value,
                'name' => 'admin',
                'description' => 'Perfil de administrador com acesso total',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Profile::EMPLOYEE->value,
                'name' => 'employee',
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
