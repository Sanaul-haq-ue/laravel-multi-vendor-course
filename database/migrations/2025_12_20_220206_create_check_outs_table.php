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
        Schema::create('check_outs', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->integer('courseModule_id');
            $table->integer('price');
            $table->tinyInteger('payment')->comment('0= BKash','1= Card');
            $table->tinyInteger('status')->comment('0= Pedning','1= Approved','2= Unapproved');
            $table->integer('teacher_created_by_id');
            
            $table->foreign('teacher_created_by_id')
                  ->references('id')
                  ->on('user');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_outs');
    }
};
