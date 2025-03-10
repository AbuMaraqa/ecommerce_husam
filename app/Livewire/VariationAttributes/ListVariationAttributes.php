<?php

namespace App\Livewire\VariationAttributes;

use App\Models\VariationAttributes;
use Livewire\Component;

class ListVariationAttributes extends Component
{
    public $search;

    public function delete($id){
        VariationAttributes::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.variation-attributes.list-variation-attributes',[
            'variationAttributes' => VariationAttributes::where('attribute_name', 'like', '%' . $this->search . '%')->paginate(10),
        ]);
    }
}
