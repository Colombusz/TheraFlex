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
         Schema::table('performance_reviews', function (Blueprint $table) {
             $table->unsignedBigInteger('appointment_id')->index();
             $table->foreign('appointment_id')->references('id')->on('appointments')->onDeleted('cascade');
         });
     }

     /**
      * Reverse the migrations.
      */
     public function down(): void
     {
         Schema::table('performace_reviews', function (Blueprint $table) {
             $table->dropColumn('appointment_id');
         });
     }
 };
