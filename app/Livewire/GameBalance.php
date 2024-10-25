<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Component;

class GameBalance extends Component
{
    protected $balance;

    public function __construct()
    {
        $this->balance = Game::find(session('current_game_id'))->balance;
    }

    public function render()
    {
        return view('livewire.game-balance', [
            'balance' => $this->balance,
        ]);
    }
}
