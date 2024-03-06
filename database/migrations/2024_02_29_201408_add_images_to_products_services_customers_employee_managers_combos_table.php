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
        Schema::table('products', function (Blueprint $table) {
            $table->string('images');
        });
        Schema::table('services', function (Blueprint $table) {
            $table->string('images');
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->string('images');
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->string('images');
        });
        Schema::table('managers', function (Blueprint $table) {
            $table->string('images');
        });
        Schema::table('combos', function (Blueprint $table) {
            $table->string('images');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('images');
        });
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('images');
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('images');//
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('images');
        });
        Schema::table('managers', function (Blueprint $table) {
            $table->dropColumn('images');
        });
        Schema::table('combos', function (Blueprint $table) {
            $table->dropColumn('images');
        });
    }
};
