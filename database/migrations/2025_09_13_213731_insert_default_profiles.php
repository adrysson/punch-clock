<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('profiles')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'description' => 'Perfil de administrador com acesso total',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
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
