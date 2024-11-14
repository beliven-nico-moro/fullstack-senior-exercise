<?php

namespace App\Livewire;

use App\Jobs\UpdateBalance;
use App\Models\Game;
use Carbon\Carbon;
use Livewire\Component;

class GameTimer extends Component
{
    public $startingTime;
    public $timer;
    public $timerLabel;

    public function mount()
    {
        $this->timer = Carbon::parse(session('current_game_starting_time'));
        $this->timerLabel = Carbon::now()->diff($this->timer)->format('%H:%I:%S');
    }

    public function render()
    {
        return view('livewire.game-timer');
    }

    public function updateTimer()
    {
        $interval = Carbon::now()->diff($this->timer);

        if ($interval->s % 10 === 0) {
            $this->updateGameBalance();
        }

        $this->timerLabel = $interval->format('%H:%I:%S');
    }

    public function updateGameBalance()
    {
        // Update game balance
        UpdateBalance::dispatch(Game::where('id', session('current_game_id'))->first())->withoutDelay();
    }
}
