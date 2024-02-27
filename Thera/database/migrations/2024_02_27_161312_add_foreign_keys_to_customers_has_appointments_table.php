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
        Schema::table('customers_has_appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('customers_id')->index();
            $table->unsignedBigInteger('appointments_id')->index();
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('appointments_id')->references('id')->on('appointments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers_has_appointments', function (Blueprint $table) {
            $table->dropColumn('customers_id');
            $table->dropColumn('appointments_id');
        });
    }
};
