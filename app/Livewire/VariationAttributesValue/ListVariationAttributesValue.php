<?php

namespace App\Livewire\VariationAttributesValue;

use App\Models\VariationAttributeValue;
use Livewire\Component;

class ListVariationAttributesValue extends Component
{
    public $search;

    public function delete($id){
        VariationAttributeValue::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.variation-attributes-value.list-variation-attributes-value',[
            'variationAttributesValues' => VariationAttributeValue::paginate(10),
        ]);
    }
}
