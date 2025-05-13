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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('avaliação');
            $table-> unsignedBigInteger('aluno_id');
            $table-> unsignedBigInteger('disciplina_id');
            $table->float('nota');
            $table->timestamps();

            $table->foreign('aluno_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
