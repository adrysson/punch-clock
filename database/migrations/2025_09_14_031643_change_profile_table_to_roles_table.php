<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('profile_id', 'role_id');
        });

        Schema::rename('profiles', 'roles');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('roles', 'profiles');

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('role_id', 'profile_id');
        });
    }
};
