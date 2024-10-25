<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Component;

class GameTimer extends Component
{
    protected $timer = 10;

    public function render()
    {
        return view('livewire.game-timer', [
            'timer' => $this->timer,
        ]);
    }

    public function newCycle()
    {
        $this->timer = 10;

        $game = Game::find(session('current_game_id'));
        $game->balance -= 1000;
    }
}
