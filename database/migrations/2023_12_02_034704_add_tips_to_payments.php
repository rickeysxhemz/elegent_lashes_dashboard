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
        Schema::table('payments', function (Blueprint $table) {
            $table->decimal('tips', 8, 2)->after('payment_amount')->nullable();
            $table->decimal('payment_amount', 8, 2)->nullable()->change();
            $table->decimal('payment_total', 8, 2)->nullable()->change();
            $table->decimal('payment_tax', 8, 2)->nullable()->change();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('tips');
            $table->string('payment_amount')->nullable()->change();
            $table->string('payment_total')->nullable()->change();
            $table->string('payment_tax')->nullable()->change();
        });
    }
};
