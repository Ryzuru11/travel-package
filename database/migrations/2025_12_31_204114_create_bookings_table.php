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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('travel_package_id')->constrained()->onDelete('cascade');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('total_person');
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending'); // pending, confirmed, rejected
            $table->string('payment_receipt')->nullable(); // path to payment receipt image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};