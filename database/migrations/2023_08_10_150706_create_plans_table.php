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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->decimal('price',10,2);  
            
            $table->unsignedBigInteger('dome_id');
            $table->foreign('dome_id')->references('id')->on('domes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->boolean('status');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
