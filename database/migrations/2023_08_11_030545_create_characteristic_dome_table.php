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
        Schema::create('characteristic_dome', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('characteristic_id');
            $table->foreign('characteristic_id')->references('id')->on('characteristics')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('dome_id');
            $table->foreign('dome_id')->references('id')->on('domes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
            $table->unique(['characteristic_id', 'dome_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characteristic_dome');
    }
};
