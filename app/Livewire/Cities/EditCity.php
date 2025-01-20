<?php

namespace App\Livewire\Cities;

use App\Models\City;
use Livewire\Component;

class EditCity extends Component
{
    public ?array $data;

    public function mount($id)
    {
        $this->data = City::findOrFail($id)->toArray();
        $this->data['name'] = $this->data['name'][app()->getLocale()];
    }

    protected function rules(): array
    {
        return [
            'data.name' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.name.required' => 'يرجى ادخال اسم المدينة',
        ];
    }

    public function update()
    {
        $this->validate();
        City::create([
            'name' => [app()->getLocale() => $this->data['name']]
        ]);
        $this->redirect('/cities');
    }

    public function render()
    {
        return view('livewire.cities.edit-city');
    }
}
