<?php

namespace App\Livewire\VariationAttributes;

use App\Models\VariationAttributes;
use Livewire\Component;

class EditVariationAttributes extends Component
{
    public ?array $data;

    public function mount($id){
        $this->data = VariationAttributes::find($id)->toArray();
        $this->data['attribute_name'] = $this->data['attribute_name'][app()->getLocale()];
    }

    protected function rules(): array
    {
        return [
            'data.attribute_name' => 'required',
        ];
    }

    public function messages(){
        return [
            'data.attribute_name.required' => 'Name is required',
        ];
    }

    public function update(){
        $this->validate();
        VariationAttributes::find($this->data['id'])->update([
            'attribute_name' => [app()->getLocale() => $this->data['attribute_name']],
        ]);
        return redirect()->route('variations_attributes.index');
    }
    public function render()
    {
        return view('livewire.variation-attributes.edit-variation-attributes');
    }
}
