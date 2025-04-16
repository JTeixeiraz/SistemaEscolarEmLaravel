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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turma_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->unsignedBigInteger('professor_id');
            $table->dateTime('data_hora_inicio');
            $table->dateTime('data_hora_fim');
            $table->string('conteudo');
            $table->timestamps();

            $table->foreign('turma_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('professor_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
