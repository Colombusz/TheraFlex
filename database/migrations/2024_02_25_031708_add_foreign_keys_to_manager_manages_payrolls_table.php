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
        Schema::table('manager_manages_payrolls', function (Blueprint $table) {
            $table->unsignedBigInteger('manager_id')->index();
            $table->unsignedBigInteger('payroll_id')->index();
            $table->foreign('manager_id')->references('id')->on('managers')->onDelete('cascade');
            $table->foreign('payroll_id')->references('id')->on('payrolls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('manager_manages_payrolls', function (Blueprint $table) {
            $table->dropColumn('manager_id');
            $table->dropColumn('payroll_id');
        });
    }
};
