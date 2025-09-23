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
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('reason', 20);
            $table->string('subject', 150);
            $table->text('message');
            $table->string('name', 120);
            $table->string('company', 150)->nullable();
            $table->string('email', 255);
            $table->string('phone', 50)->nullable();
            $table->string('attachment_original_name')->nullable();
            $table->json('meta');
            $table->timestamps();

            $table->index('created_at');
            $table->index('reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};
