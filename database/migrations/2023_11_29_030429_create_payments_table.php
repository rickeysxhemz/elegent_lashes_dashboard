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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->enum('payment_method', ['cash', 'debit', 'credit'])->default('cash');
            $table->string('payment_status')->nullable();
            $table->string('payment_amount')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_time')->nullable();
            $table->string('payment_total')->nullable();
            $table->string('payment_tax')->nullable();
            $table->string('card_number')->nullable();
            $table->string('card_name')->nullable();
            $table->string('card_exp_month')->nullable();
            $table->string('card_exp_year')->nullable();
            $table->string('card_cvv')->nullable();
            $table->string('card_zip')->nullable();
            $table->string('card_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
