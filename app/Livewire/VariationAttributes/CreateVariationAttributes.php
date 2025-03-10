<?php

namespace App\Livewire\VariationAttributes;

use App\Enums\VariationType;
use App\Enums\VartaionType;
use App\Models\VariationAttributes;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CreateVariationAttributes extends Component
{
    public ?array $data;


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

    public function save(){
        $this->validate();
        VariationAttributes::create([
            'attribute_name' => [app()->getLocale() => $this->data['attribute_name']],
            'type' => $this->data['type'],
        ]);
        return redirect()->route('variations_attributes.index');
    }

    #[Computed]
    public static function getVatraionType(){
        return VariationType::toArray();
    }

    public function render()
    {
        return view('livewire.variation-attributes.create-variation-attributes');
    }
}
