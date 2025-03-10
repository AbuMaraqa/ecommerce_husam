<?php

namespace App\Livewire\DeliveryAreas;

use App\Models\DeliveryArea;
use Livewire\Component;

class EditDeliveryArea extends Component
{
    public ?array $data;

    public function mount($id)
    {
        $this->data = DeliveryArea::findOrFail($id)->toArray();
        $this->data['name'] = $this->data['name'][app()->getLocale()];
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

    public function update(){
        $this->validate();
        DeliveryArea::find($this->data['id'])->update([
            'name' => [app()->getLocale() => $this->data['name']],
            'price' => $this->data['price'],
        ]);
        return redirect()->route('delivery_areas.index');
    }
    public function render()
    {
        return view('livewire.delivery-areas.edit-delivery-area');
    }
}
