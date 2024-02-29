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
        Schema::table('employee_skill_cards', function (Blueprint $table) {
            $table->unsignedBigInteger('performance_review_id')->index();
            $table->foreign('performance_review_id')->references('id')->on('performance_reviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_skill_cards', function (Blueprint $table) {
            $table->dropColumn('performance_review_id');
        });
    }
};
