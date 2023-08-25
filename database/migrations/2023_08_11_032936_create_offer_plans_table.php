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
        Schema::create('offer_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->date('start_date');
            $table->date('end_date');

            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->decimal('discount', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_plans');
    }
};
