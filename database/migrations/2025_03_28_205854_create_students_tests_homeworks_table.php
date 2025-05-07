<?php

use App\Models\Meetings;
use App\Models\Tests_homeworks;
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
        Schema::create('students_tests_homeworks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class , 'student_id');
            $table->foreignIdFor(Tests_homeworks::class, 'test_homework_id');
            $table->enum('status', ['pending', 'completed', 'missing']);
            $table->float('grade');
            $table->integer('weight');
            $table->date('submitted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_tests_homeworks');
    }
};
