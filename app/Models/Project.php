<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reward',
        'status',
        'difficulty',
        'game_id',
        'developer_id'
    ];

    protected $guarded = [];

    public function difficultyLabel()
    {
        return match ($this->difficulty) {
            '1' => 'Easy',
            '2' => 'Medium',
            '3' => 'Hard',
        };
    }

    public function statusClass()
    {
        return match ($this->status) {
            'pending' => 'text-red-500',
            'in_progress' => 'text-yellow-500',
            'completed' => 'text-green-500'
        };
    }

    public function statusLabel()
    {
        return match ($this->status) {
            'pending' => 'Pending',
            'in_progress' => 'In Progress',
            'completed' => 'Completed'
        };
    }
}
