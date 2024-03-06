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
        Schema::table('managers_assignments', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->index();
            $table->unsignedBigInteger('manager_id')->index();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('manager_id')->references('id')->on('managers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('managers_assignments', function (Blueprint $table) {
            $table->dropColumn('employee_id');
            $table->dropColumn('manager_id');
        });
    }
};
