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
        Schema::table('bookings', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['customer_id']);

            // Drop the customer_id column
            $table->dropColumn('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Add the customer_id column back (nullable)
            $table->foreignId('customer_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');
        });
    }
};
