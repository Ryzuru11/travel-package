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
        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();
        
        // Drop existing bookings table if exists
        Schema::dropIfExists('bookings');
        
        // Create new bookings table with correct structure
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->constrained('travel_packages')->onDelete('cascade');
            $table->date('date');
            $table->integer('number_of_adult');
            $table->integer('number_of_child');
            $table->string('pick_up_location');
            $table->longText('pick_up_location_details');
            $table->decimal('total_fee', 10, 2);
            $table->string('reservation_status')->default('pending');
            $table->string('invoice_status')->default('pending');
            $table->string('payment_status')->default('pending');
            $table->text('payment_receipt')->nullable();
            $table->timestamps();
        });
        
        // Re-enable foreign key checks
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
