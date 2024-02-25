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
        Schema::table('payroll_has_benefits', function (Blueprint $table) {
            $table->unsignedBigInteger('payrolls_id')->index();
            $table->unsignedBigInteger('benefits_id')->index();
            $table->foreign('payrolls_id')->references('id')->on('payrolls')->onDelete('cascade');
            $table->foreign('benefits_id')->references('id')->on('benefits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payroll_has_benefits', function (Blueprint $table) {
            $table->dropColumn('payrolls_id');
            $table->dropColumn('benefits_id');
        });
    }
};
