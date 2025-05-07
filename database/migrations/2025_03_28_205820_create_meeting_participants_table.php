<?php

use App\Models\Meetings;
use App\Models\Textbooks;
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
        Schema::create('meeting_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class , 'participant_id');
            $table->foreignIdFor(Meetings::class, 'meeting_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('status', ['pending', 'accepted', 'rejected', 'declined']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_participants');
    }
};
