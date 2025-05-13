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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('desc');
            $table-> unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->date('semestre');
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
