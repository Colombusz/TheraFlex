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
            $table->unsignedBigInteger('service_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('customer_id')->index();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('summaries', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('product_id');
            $table->dropColumn('customer_id');
        });
    }
};
