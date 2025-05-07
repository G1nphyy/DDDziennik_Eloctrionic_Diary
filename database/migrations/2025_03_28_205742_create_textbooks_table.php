<?php

use App\Models\schools;
use App\Models\Subjects;
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
        Schema::create('textbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(schools::class, 'school_id');
            $table->foreignIdFor(subjects::class, 'subject_id');
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->string('isbn')->nullable();
            $table->string('edition')->nullable();
            $table->integer('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('textbooks');
    }
};
