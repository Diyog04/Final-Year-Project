<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->string('purchase_order_id')->unique();
            $table->decimal('amount', 10, 2);
            $table->string('pidx')->nullable()->comment('Payment ID from Khalti');
            $table->string('transaction_id')->nullable();
            $table->string('status')->default('unpaid');
            $table->timestamps();

            // Foreign key relation
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
