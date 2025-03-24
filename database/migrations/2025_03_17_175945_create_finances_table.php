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
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->decimal('monthly_income', 10, 2);
            $table->decimal('fixed_costs', 10, 2);
            $table->decimal('variable_costs', 10, 2);
            $table->decimal('saving_amount', 10, 2);
            $table->string('saving_target');
            $table->decimal('debts', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finances');
    }
};
