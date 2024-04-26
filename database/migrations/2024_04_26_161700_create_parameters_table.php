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
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->integer('min_time_period')->default(12);
            $table->integer('max_time_period')->default(90);
            $table->integer('min_amount')->default(10000);
            $table->integer('max_amount')->default(100000);
            $table->float('min_interest_rate')->default(0.0703);
            $table->float('administration_fee')->default(200);
            $table->float('min_down_payment')->default(0.1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parameters');
    }
};
