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
            $table->string('customer_name')->after('product_id'); // Add customer_name
            $table->string('customer_email')->after('customer_name'); // Add customer_email
            $table->string('customer_phone')->after('customer_email'); // Add customer_phone
            $table->string('payment_id')->nullable()->after('status'); // Add payment_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('customer_name');
            $table->dropColumn('customer_email');
            $table->dropColumn('customer_phone');
            $table->dropColumn('payment_id');
        });
    }
};
