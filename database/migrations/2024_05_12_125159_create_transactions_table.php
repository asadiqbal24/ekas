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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('payment_intent')->unique()->nullable();
            $table->decimal('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('status')->nullable();
            $table->string('phone')->nullable();
            $table->string('service')->nullable();
            $table->dateTime('selected_date')->nullable();
            $table->string('guidance_package')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
