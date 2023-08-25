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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('document',20);
            $table->string('name',50);
            $table->string('last_name',50);
            $table->string('email',100)->unique();
            $table->string('cellphone',20)->unique();
            $table->date('birthdate')->nullable();
            $table->string('city',20)->default('Medellín');
            $table->string('address',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
