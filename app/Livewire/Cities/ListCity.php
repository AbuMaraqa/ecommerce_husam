<?php

namespace App\Livewire\Cities;

use App\Models\City;
use Livewire\Component;

class ListCity extends Component
{
    public function render()
    {
        return view('livewire.cities.list-city',[
            'cities' => City::get()
        ]);
    }
}
