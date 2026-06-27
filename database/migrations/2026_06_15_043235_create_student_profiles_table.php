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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('phone')->nullable();
            $table->string('current_city')->nullable();

            $table->decimal('cgpa',4,2)->nullable();

            $table->string('portfolio_url')->nullable();
            $table->string('resume_url')->nullable();

            $table->foreignId('career_path_id')->nullable()->constrained('career_paths')->nullOnDelete();

            $table->decimal('readiness_score',5,2)->default(0);

            $table->enum('profile_status', ['draft','public'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
