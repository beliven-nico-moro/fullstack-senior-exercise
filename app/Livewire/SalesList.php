<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SalesList extends Component
{
    public $sales;

    public function getListeners()
    {
        return [
            'statusChanged'                     => '$refresh',
            'echo:project-found,ProjectFound'   => 'projectFound',
        ];
    }

    public function mount()
    {
        $this->sales = Auth::user()->currentGame()->sales;
    }

    public function render()
    {
        return view('livewire.sales-list');
    }

    public function projectFound()
    {
        $this->dispatch('statusChanged');
    }
}
