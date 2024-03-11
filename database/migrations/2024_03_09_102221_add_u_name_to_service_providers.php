<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('service_providers', function (Blueprint $table) {
            $table->string('u_name')->nullable(); // Add the u_name column
        });

        // Populate u_name column with names from the associated users
        $sproviders = \App\Models\ServiceProvider::all();
        foreach ($sproviders as $sprovider) {
            $sprovider->u_name = $sprovider->user->name;
            $sprovider->save();
        }
    }

    public function down()
    {
        Schema::table('service_providers', function (Blueprint $table) {
            $table->dropColumn('u_name'); // Drop the u_name column
        });
    }
};
