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
        Schema::create('publish_properties', function (Blueprint $table) {
            $table->id();
            $table->string('publish_code');
            $table->string('property_type');
            $table->string('location');
            $table->string('title');
            $table->text('description');
            $table->string('price');
            $table->string('transaction_type');
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->string('total_area');
             $table->string('garage');
            $table->string('energy_certificate');
            $table->string('additional_features')->nullable();
            $table->string('publication_date');
               $table->string('status');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publish_properties');
    }
};
