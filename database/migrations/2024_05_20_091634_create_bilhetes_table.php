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
        Schema::create('bilhetes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->bigInteger("funcionario_id")->nullable()->unsigned();
            $table->foreign("funcionario_id")->references('id')->on('funcionarios')->onDelete('cascade');
            $table->foreignId('viagen_id')->constrained('viagens')->onDelete('cascade');
            $table->string('estado');
            $table->string('descricao')->nullable();
            $table->integer('acento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bilhetes');
    }
};
