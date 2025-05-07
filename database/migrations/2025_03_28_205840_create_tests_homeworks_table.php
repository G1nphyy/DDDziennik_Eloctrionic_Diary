<?php

use App\Models\Classes;
use App\Models\schools;
use App\Models\Subjects;
use App\Models\User;
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
        Schema::create('tests_homeworks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(schools::class, 'school_id');
            $table->foreignIdFor(classes::class, 'class_id');
            $table->foreignIdFor(subjects::class, 'subject_id');
            $table->foreignIdFor(User::class , 'teacher_id');
            $table->enum('type', ['homework', 'test', 'quiz']);
            $table->string('name');
            $table->text('description');
            $table->date('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests_homeworks');
    }
};
