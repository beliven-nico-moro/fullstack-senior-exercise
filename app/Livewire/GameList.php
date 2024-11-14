<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class GameList extends Component
{
    protected $games;

    public function mount()
    {
        $this->games = Auth::user()->gameList();
    }

    public function render()
    {
        return view('livewire.game-list', [
            'games' => $this->games,
        ]);
    }
}
