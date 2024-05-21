<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leasing', function (Blueprint $table) {
            $table->id();
            $table->integer('min_amount')->default(10000);
            $table->integer('max_amount')->default(100000);
            $table->float('min_down_payment')->default(0.1);
            $table->float('max_down_payment')->default(0.8);
            $table->integer('min_time_period')->default(12);
            $table->integer('max_time_period')->default(90);
            $table->float('min_interest_rate')->default(0.0203);
            $table->float('max_interest_rate')->default(0.08);
            $table->float('administration_fee')->default(200);
            $table->timestamps();
        });
        DB::table('leasing')->insert([[]]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leasing');
    }
};
