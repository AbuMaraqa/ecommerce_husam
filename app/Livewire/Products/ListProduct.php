<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ListProduct extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        return view('livewire.products.list-product',[
            'products' => Product::where('name','like',"%$this->search%")->paginate(5)
        ]);
    }
}
