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
       Schema::create('assessment_questions', function (Blueprint $table) {
    $table->id();

    $table->foreignId('assessment_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->enum('question_type', ['mcq', 'practical']);

    $table->text('question');

    $table->text('options')->nullable();

    $table->text('correct_answer')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_questions');
    }
};
