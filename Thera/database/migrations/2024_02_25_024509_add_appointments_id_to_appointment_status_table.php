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
        Schema::table('appointment_status', function (Blueprint $table) {
            $table->unsignedBigInteger('appointments_id')->index();
            $table->foreign('appointments_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointment_status', function (Blueprint $table) {
            $table->dropColumn('appointments_id');
        });
    }
};
