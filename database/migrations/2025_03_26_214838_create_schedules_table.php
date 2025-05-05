<?php

use App\Models\Classes;
use App\Models\Classrooms;
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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Classes::class, 'class_id');
            $table->foreignIdFor(Subjects::class, 'subject_id');
            $table->foreignIdFor(User::class, 'teacher_id');
            $table->foreignIdFor(Classrooms::class, 'classroom_id');
            $table->smallInteger('day_of_week');
            $table->time('start_time');
            $table->time('end_time');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
