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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->boolean('presente');
            $table-> unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('aula_id');
            $table->string('justificativa');
            $table->timestamps();

            $table->foreign('aluno_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('aula_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
