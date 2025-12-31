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

            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->integer('total_amount');
            $table->string('address');
            $table->tinyInteger('status');
            $table->string('transaction_id')->unique();
            $table->tinyInteger('currency');

            $table->tinyInteger('user_id');
            $table->tinyInteger('courseModule_id');
            // $table->tinyInteger('payment')->comment('0= BKash','1= Card');
            $table->tinyInteger('teacher_created_by_id');
            
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
