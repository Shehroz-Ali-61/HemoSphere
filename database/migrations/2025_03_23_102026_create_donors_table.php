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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            // Store path or filename for image
            $table->string('image')->nullable();
            // Basic text fields
            $table->string('fullName');
            $table->string('phone');
            // Numeric
            $table->unsignedInteger('age');
            // Blood type
            $table->string('bloodType');
            // Address and city
            $table->string('address');
            $table->string('city');
            // Additional message
            $table->text('message')->nullable();
            // Medical certificate path or filename
            $table->string('medicalCertificate')->nullable();
            // Timestamps (created_at, updated_at)
            $table->timestamps();
            // Add user relationship
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
