<?php

namespace App\Livewire\VariationAttributesValue;

use App\Models\VariationAttributes;
use App\Models\VariationAttributeValue;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVariationAttributesValue extends Component
{
    use WithFileUploads;

    public ?array $data;
    public $attribute_type;

    protected function rules(): array
    {
        return [
            'data.value' => 'required',
        ];
    }

    public function messages(){
        return [
            'data.value.required' => 'Value is required',
        ];
    }

    // #[Computed]
    public function getVariationType(){
        if (!isset($this->data['attribute_id'])) {
            return;
        }

        $this->attribute_type = VariationAttributes::find($this->data['attribute_id'])?->type;
    }

    public function save()
    {
        $this->validate();
        $VariationAttributeValue = VariationAttributeValue::create($this->data);

        if (isset($this->data['image'])) {
            $VariationAttributeValue->saveImage($this->data['image']);
        }
        $this->redirect(route('variation-attributes-values.index'));
    }

    public function render()
    {
        return view('livewire.variation-attributes-value.create-variation-attributes-value',[
            'variationAttributes' => VariationAttributes::get(),
        ]);
    }
}
