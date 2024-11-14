<?php

namespace App\Livewire;

use App\Events\ProjectProcessed;
use App\Models\Game;
use Livewire\Attributes\On;
use Livewire\Component;

class GameBalance extends Component
{
    public string $balance;

    public function getListeners()
    {
        return [
            'echo:balance-updated,BalanceUpdated'   => 'updateBalance',
            'statusChanged'                         => '$refresh',
        ];
    }

    public function mount()
    {
        $this->balance = Game::find(session('current_game_id'))->balance;
    }

    public function render()
    {
        return view('livewire.game-balance');
    }

    public function updateBalance($data)
    {
        $this->balance = $data['game']['balance'];

        $this->dispatch('statusChanged');
        $this->dispatch('checkDevelopers');
    }
}
