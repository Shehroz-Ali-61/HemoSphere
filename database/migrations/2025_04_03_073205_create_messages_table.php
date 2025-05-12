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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id'); // User who sent
            $table->unsignedBigInteger('receiver_id'); // Donor who received
            $table->text('message');
            $table->boolean('read')->default(false);
            $table->timestamps();

          

            // Foreign keys with cascade
            $table->foreign('sender_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // Delete messages when sender is deleted

            $table->foreign('receiver_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
