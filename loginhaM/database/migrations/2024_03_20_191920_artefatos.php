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
        Schema::create('artefatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->integer('raridade');
            $table->string('sintonizacao');
            // Se 'tipo' se refere a uma tabela 'tipos', então deve ser uma chave estrangeira
            $table->foreignId('tipo_id')->constrained('tipos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artefatos');
    }
};
