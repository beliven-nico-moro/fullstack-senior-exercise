<?php

namespace App\Livewire;

use App\Jobs\FindProject;
use App\Models\Employee;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SendSales extends Component
{
    public $sales;
    public $sale_id;

    public function getListeners()
    {
        return [
            'statusChanged' => '$refresh',
            'echo:project-found,ProjectFound' => 'projectProcessed',
        ];
    }

    public function mount()
    {
        $this->sales = Auth::user()->currentGame()->unloadedSales;
    }

    public function render()
    {
        return view('livewire.send-sales');
    }

    public function sendSale()
    {
        // lock sale
        $sale = Employee::find($this->sale_id);
        $sale->status = 'busy';
        $sale->save();

        // get game
        $game = Auth::user()->currentGame();

        $this->sales = $game->unloadedSales;

        // dispatch refresh
        $this->dispatch('statusChanged');

        // dispatch job
        FindProject::dispatch($sale, $game);
    }

    public function projectProcessed($data)
    {
        $this->sales = Auth::user()->currentGame()->unloadedSales;
        $this->dispatch('statusChanged');
    }
}
