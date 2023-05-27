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
        Schema::create('my_plans', function (Blueprint $table) {
            $table->id();
             $table->foreignId('property_id')->constrained('publish_properties')->onUpdate('cascade')->onDelete('cascade');
              $table->string('publish_code');
               $table->foreignId('plan_id')->constrained('plans')->onUpdate('cascade')->onDelete('cascade');
             
               $table->string('myplan_status');
              $table->string('date_myplan');
               $table->string('expiration_date');
               
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_plans');
    }
};
