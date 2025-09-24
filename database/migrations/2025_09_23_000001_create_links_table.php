<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('label');
            $table->string('url');
            $table->string('target')->nullable();
            $table->string('rel')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('visible')->default(true);
            $table->string('group')->default('default');
            $table->timestamps();

            $table->index(['group', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
