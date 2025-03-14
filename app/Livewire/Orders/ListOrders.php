<?php

namespace App\Livewire\Orders;

use App\Models\Orders;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ListOrders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        return view('livewire.orders.list-orders',[
            'orders' => Orders::where('id','like',"%$this->search%")->paginate(5)
        ]);
    }
}
