<?php

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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'student_id');
            $table->foreignIdFor(Schedule::class, 'schedule_id');
            $table->foreignIdFor(User::class, 'teacher_id');
            $table->date('date');
            $table->enum('status', ['present', 'absent', 'late', 'excused','absent_I', 'absent_S'])->default('present');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
