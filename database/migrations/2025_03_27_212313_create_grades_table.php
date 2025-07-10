<?php

//use App\Models\Classes;
use App\Models\GradeCategory;
use App\Models\Subjects;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'student_id');
            $table->foreignIdFor(User::class, 'teacher_id');
            $table->foreignIdFor(Subjects::class, 'subject_id');
            $table->float('grade');
            $table->integer('weight');
            $table->foreignIdFor(GradeCategory::class, 'category_id');
            $table->text('description');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
