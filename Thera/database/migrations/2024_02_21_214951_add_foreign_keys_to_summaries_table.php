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
        Schema::table('summaries', function (Blueprint $table) {
            $table->unsignedBigInteger('services_id')->index();
            $table->unsignedBigInteger('products_id')->index();
            $table->unsignedBigInteger('customers_id')->index();
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('customers_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('summaries', function (Blueprint $table) {
            $table->dropColumn('services_id');
            $table->dropColumn('products_id');
            $table->dropColumn('customers_id');
        });
    }
};
