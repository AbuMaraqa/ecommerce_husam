<?php

namespace App\Livewire\Labels;

use App\Models\Label;
use Livewire\Component;

class ListLabel extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.labels.list-label',[
            'labels' => Label::where('text', 'like', '%' . $this->search . '%')->paginate(5)
        ]);
    }
}
