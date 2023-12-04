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
        Schema::table('client_waivers', function (Blueprint $table) {
             // Drop the existing foreign key constraint
             $table->dropForeign(['location_id']);

             // Change the foreign key reference
             $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_waivers', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['location_id']);

            // Restore the foreign key constraint to location_users
            $table->foreign('location_id')->references('id')->on('location_users')->onDelete('cascade');
        });
    }
};
