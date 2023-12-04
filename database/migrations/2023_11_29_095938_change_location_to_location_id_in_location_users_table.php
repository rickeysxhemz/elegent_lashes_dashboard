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
        Schema::table('location_users', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->unsignedBigInteger('location_id')->after('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('location_users', function (Blueprint $table) {
             $table->dropColumn('location_id');
             $table->string('location')->after('user_id')->nullable();
        });
    }
};
