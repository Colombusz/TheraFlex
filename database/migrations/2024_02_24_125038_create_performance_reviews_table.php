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
         Schema::create('performance_reviews', function (Blueprint $table) {
             $table->id();
             $table->decimal('skill', $precision = 3, $scale = 1);
             $table->decimal('approachability', $precision = 3, $scale = 1);
             $table->decimal('communication', $precision = 3, $scale = 1);
             $table->decimal('fulfillingRequest', $precision = 3, $scale = 1);
             $table->decimal('overallExperience', $precision = 3, $scale = 1);
             $table->timestamps();
         });
     }

     /**
      * Reverse the migrations.
      */
     public function down(): void
     {
         Schema::dropIfExists('performance_reviews');
     }
 };
