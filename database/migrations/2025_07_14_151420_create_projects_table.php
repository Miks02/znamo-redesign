<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('project_link');
            $table->year('year_of_creation');
            $table->year('year_of_redesign')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('active_updating')->default(false);
            $table->enum('status', ['active','inactive','finished']);
            $table->timestamps();
        });
    }
  
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
