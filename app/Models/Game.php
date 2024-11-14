<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $fillable = [
        'name',
        'balance',
        'user_id',
    ];

    protected $guarded = [];

    /**
     * Return the user that owns the game.
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function employees() : HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function developers()
    {
        return $this->employees()
            ->where([
                'position'  => 'developer',
                'hired'     => true,
            ]);
    }

    public function sales()
    {
        return $this->employees()
            ->where([
                'position'  => 'sale',
                'hired'     => true,
            ]);
    }

    public function unloadedDevelopers()
    {
        return $this->employees()
            ->where([
                'position'  => 'developer',
                'status'    => 'unloaded',
                'hired'     => true,
            ]);
    }

    public function unloadedSales()
    {
        return $this->employees()
            ->where([
                'position'  => 'sale',
                'status'    => 'unloaded',
                'hired'     => true,
            ]);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function availableProjects()
    {
        return $this->projects()->where('status', '!=', 'completed');
    }

    public function employeesToHire()
    {
        return $this->employees()->where(['hired' => false]);
    }

    public function hiredEmployees()
    {
        return $this->employees()->where(['hired' => true])->get();
    }
}
