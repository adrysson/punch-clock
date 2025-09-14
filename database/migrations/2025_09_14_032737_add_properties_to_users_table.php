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
// • CPF
// • Validação obrigatória (deve recusar CPFs inválidos ou duplicados)
// • Data de nascimento
// • Endereço (address_id) 
        Schema::table('users', function (Blueprint $table) {
            $table->string('document')->unique();
            $table->date('birth_date');
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
            $table->dropColumn(['cpf', 'birth_date', 'address_id']);
        });
    }
};
