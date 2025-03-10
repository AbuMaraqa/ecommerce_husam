<?php

namespace App\Livewire\Variations;

use App\Models\Variation;
use Livewire\Component;

class ListVariations extends Component
{
    public function render()
    {
        return view('livewire.variations.list-variations',[
            'variations' => Variation::paginate(10),
        ]);
    }
}
