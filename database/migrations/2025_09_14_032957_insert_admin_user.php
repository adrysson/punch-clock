<?php

use App\Domain\Enum\Role;
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
        $address = DB::table('addresses')->insert([
            'id' => 1,
            'street' => 'Admin Street',
            'number' => '1000',
            'complement' => 'Suite 1',
            'neighborhood' => 'Admin Neighborhood',
            'city' => 'Admin City',
            'state' => 'AS',
            'zip_code' => '00000-000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@punchclock.com',
            'password' => bcrypt('admin123'),
            'role_id' => Role::MANAGER->value,
            'created_at' => now(),
            'updated_at' => now(),
            'document' => '084.168.040-01',
            'birth_date' => '1955-07-02',
            'address_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->where('id', 1)->delete();
    }
};
