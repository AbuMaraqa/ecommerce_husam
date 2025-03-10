<?php

namespace App\Livewire\DeliveryAreas;

use App\Models\DeliveryArea;
use Livewire\Component;

class CreateDeliveryArea extends Component
{
    public ?array $data;

    public function mount()
    {

    }

    protected function rules()
    {
        return [
            'data.name' => 'required',
            'data.price' => 'required | numeric | min:0',
        ];
    }

    public function messages(){
        return [
            'data.name.required' => 'يرجى ادخال اسم المنطقة',
            'data.price.required' => 'يرجى ادخال سعر المنطقة',
            'data.price.numeric' => 'يرجى ادخال سعر المنطقة',
            'data.price.min' => 'يرجى ادخال سعر المنطقة',
        ];
    }

    public function save(){
        $this->validate();
        DeliveryArea::create([
            'name' => [app()->getLocale() => $this->data['name']],
            'price' => $this->data['price'],
        ]);
        return redirect()->route('delivery_areas.index');
    }

    public function render()
    {
        return view('livewire.delivery-areas.create-delivery-area');
    }
}
