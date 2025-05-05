<?php

use App\Models\Classes;
use App\Models\Classrooms;
use App\Models\Schedule;
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
        Schema::create('schedule_modifications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Schedule::class, 'schedule_id');
            $table->foreignIdFor(User::class, 'new_teacher_id');
            $table->foreignIdFor(Classes::class, 'new_class_id');
            $table->foreignIdFor(Classrooms::class, 'new_classroom_id');
            $table->date('modification_date');
            $table->integer('new_day_of_week');
            $table->time('new_start_time');
            $table->time('new_end_time');
            $table->text('note');
            $table->enum('change_type', ['cancelled', 'moved', 'replaced']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_modifications');
    }
};
