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
        Schema::table('employees_has_skill_cards', function (Blueprint $table) {
            $table->unsignedBigInteger('employees_id')->index();
            $table->unsignedBigInteger('employee_skill_cards_id')->index();
            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('employee_skill_cards_id')->references('id')->on('employee_skill_cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees_has_skill_cards', function (Blueprint $table) {
            $table->dropColumn('employees_id');
            $table->dropColumn('employee_skill_cards_id');
        });
    }
};
