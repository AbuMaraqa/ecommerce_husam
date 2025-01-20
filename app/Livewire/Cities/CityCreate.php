<?php

namespace App\Livewire\Cities;

use App\Models\City;
use Livewire\Component;

class CityCreate extends Component
{
    public ?array $data;

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

    public function save()
    {
        $this->validate();
        City::create([
            'name' => [app()->getLocale() => $this->data['name']]
        ]);
        $this->redirect('/cities');
    }

    public function render()
    {
        return view('livewire.cities.city-create');
    }
}
