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
        Schema::table('travel_packages', function (Blueprint $table) {
            $table->enum('service_type', [
                'hotel_pickup', 
                'airport_transfer', 
                'komodo_tour', 
                'lombok_destination', 
                'sumbawa_destination'
            ])->default('lombok_destination')->after('tour_type');
            
            $table->text('destination_details')->nullable()->after('service_type');
            $table->json('included_destinations')->nullable()->after('destination_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_packages', function (Blueprint $table) {
            $table->dropColumn(['service_type', 'destination_details', 'included_destinations']);
        });
    }
};