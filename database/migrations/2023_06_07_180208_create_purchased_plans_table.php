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
        Schema::create('purchased_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->string('publish_code');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('plan_id');
          $table->string('purchase_date');
            $table->string('expiration_date');
          $table->timestamps();

            $table->foreign('property_id')->references('id')->on('publish_properties');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('plan_id')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchased_plans');
    }
};
