<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Attributes\On;
use Livewire\Component;

class SaleList extends Component
{
    public $sales;

    public function render()
    {
        return view('livewire.sale-list', ['sales' => $this->sales]);
    }

    public function mount()
    {
        $this->updateSaleList();
    }

    #[On('sale-created')]
    public function updateSaleList()
    {
        $this->sales = Sale::get();
    }
}
