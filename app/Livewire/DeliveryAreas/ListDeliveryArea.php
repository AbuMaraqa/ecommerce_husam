<?php

namespace App\Livewire\DeliveryAreas;

use App\Models\DeliveryArea;
use Livewire\Component;

class ListDeliveryArea extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.delivery-areas.list-delivery-area',[
            'delivery_areas' => DeliveryArea::where('name', 'like', '%' . $this->search . '%')->paginate(5)
        ]);
    }
}
