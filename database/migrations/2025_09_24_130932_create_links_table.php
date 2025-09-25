<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('label');
            $table->string('url');
            $table->string('target')->default('_self');
            $table->string('rel')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->boolean('visible')->default(true);
            $table->string('group')->nullable();
            $table->timestamps();

            $table->index(['group', 'visible']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
