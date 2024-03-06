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
        Schema::table('employees_handles_appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->index();
            $table->unsignedBigInteger('appointment_id')->index();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees_handles_appointments', function (Blueprint $table) {
            $table->dropColumn('employee_id');
            $table->dropColumn('appointment_id');
        });
    }
};

