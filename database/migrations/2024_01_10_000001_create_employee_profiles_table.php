<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('index_number')->unique();
            $table->string('full_name');
            $table->string('current_location');
            $table->string('education_level');
            $table->boolean('remote_work_available');
            $table->enum('software_expertise', ['beginner', 'intermediate', 'expert']);
            $table->json('languages_spoken');
            $table->string('responsibility_level');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_profiles');
    }
};
