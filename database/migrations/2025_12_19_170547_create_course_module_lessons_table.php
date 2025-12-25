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
        Schema::create('course_module_lessons', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_module_section_id');
            
            $table->string('name');
            $table->string('value');

            $table->timestamps();

            $table->foreign('course_module_section_id')
                  ->references('id')
                  ->on('course_module_sections')
                  ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_module_lessons');
    }
};
