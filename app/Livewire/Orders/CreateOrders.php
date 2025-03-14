<?php

namespace App\Livewire\Orders;

use App\Models\Orders;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CreateOrders extends Component
{
    public ?array $data;
    #[Computed()]
    public function users(){
        return User::get();
    }

    public function save(){
        $this->data['status'] = 1;
        $this->data['total_amount'] = 0;
        Orders::create($this->data);
    }

    public function render()
    {
        return view('livewire.orders.create-orders',[
            'users' => User::get()
        ]);
    }
}
