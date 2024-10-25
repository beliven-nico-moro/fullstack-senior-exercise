<?php

use App\Models\Employee;
use App\Models\Game;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('reward');
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->enum('difficulty', [1, 2, 3])->default(1);
            $table->foreignIdFor(Employee::class, 'developer_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Game::class, 'game_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
