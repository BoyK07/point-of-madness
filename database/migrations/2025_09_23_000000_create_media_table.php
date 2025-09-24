<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('disk')->default('public');
            $table->string('path');
            $table->string('purpose')->unique();
            $table->string('alt')->nullable();
            $table->string('mime')->nullable();
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->decimal('focal_x', 5, 2)->nullable();
            $table->decimal('focal_y', 5, 2)->nullable();
            $table->string('hash')->nullable();
            $table->unsignedInteger('version')->default(0);
            $table->timestamps();

            $table->unique(['disk', 'path']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
