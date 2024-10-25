<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'position',
        'first_name',
        'last_name',
        'gender',
        'status',
        'game_id',
        'hired',
        'seniority',
    ];

    public function seniorityLabel()
    {
        return match ($this->seniority) {
            '1' => 'Junior',
            '2' => 'Middle',
            '3' => 'Senior',
        };
    }
}
