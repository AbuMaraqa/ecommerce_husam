<?php

namespace App\Livewire\Tags;

use App\Models\tag;
use Livewire\Component;

class ListTag extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.tags.list-tag',[
            'tags' => tag::where('text', 'like', '%' . $this->search . '%')->paginate(5)
        ]);
    }
}
