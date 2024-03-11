<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServiceInfoToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Add service_id column
            $table->foreignId('s_id')->constrained()->onDelete('cascade');

            // Add service_name column
            $table->string('s_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Remove service_id and service_name columns
            $table->dropForeign(['s_id']);
            $table->dropColumn(['s_id', 's_name']);
        });
    }
}
