<?php

use App\Models\Classes;
use App\Models\Textbooks;
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
        Schema::create('class_textbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Classes::class, 'class_id');
            $table->foreignIdFor(Textbooks::class, 'textbook_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_textbooks');
    }
};
