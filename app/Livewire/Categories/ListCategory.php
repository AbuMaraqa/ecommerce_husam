<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class ListCategory extends Component
{
    use WithPagination;
    public $categories = [];
    protected $paginationTheme = 'bootstrap';

    #[Computed]
    public function getCategory(){
        return Category::paginate(5);
    }

    public function render()
    {
        return view('livewire.categories.list-category');
    }
}
