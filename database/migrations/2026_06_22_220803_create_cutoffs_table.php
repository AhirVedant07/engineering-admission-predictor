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
    Schema::create('cutoffs', function (Blueprint $table) {

        $table->id();

        $table->integer('year');

        $table->string('college_code');

        $table->string('college_name');

        $table->string('branch_code');

        $table->string('branch_name');

        $table->string('category');

        $table->decimal('percentile',10,6);

       
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutoffs');
    }
};
