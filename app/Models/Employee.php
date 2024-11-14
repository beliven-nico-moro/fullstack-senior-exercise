<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'first_name',
        'last_name',
        'gender',
        'status',
        'game_id',
        'hired',
        'seniority',
        'salary'
    ];

    protected $guarded = [];

    public function seniorityLabel()
    {
        return match ((strval($this->seniority))) {
            '1' => 'Junior',
            '2' => 'Middle',
            '3' => 'Senior',
        };
    }
}
