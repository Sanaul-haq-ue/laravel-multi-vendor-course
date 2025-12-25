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
        Schema::create('course_modules', function (Blueprint $table) {
             $table->id();

            $table->foreignId('subject_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('course_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('course_name');
            $table->longText('description');
            $table->longText('image');
            $table->tinyInteger('status')->comment('0=Active', '1=Inactive');

            $table->integer('regular_price')->nullable();
            $table->integer('main_price');
            $table->integer('seats');
            $table->string('schedule');
            $table->string('timing');

            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users')->null();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_modules');
    }
};
