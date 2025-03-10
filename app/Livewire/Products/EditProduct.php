<?php

namespace App\Livewire\Products;

use App\Models\Category;
use App\Models\Label;
use App\Models\Product;
use App\Models\tag;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;
    public ?array $data;

    public function mount($id){
        $product = Product::find($id);
        $this->data = $product->toArray();
        $locale = app()->getLocale();
        $this->data['name'] = $this->data['name'][$locale];
        $this->data['description'] = $this->data['description'][$locale];
        $this->data['tags'] = $product->tags()->pluck('id')->toArray();
        $this->data['categories'] = $product->categories()->pluck('id')->toArray();
        $this->data['labels'] = $product->labels()->pluck('id')->toArray();
    }

    #[On('updateLabels')]
    public function setLabels($labels)
    {
        $this->data['labels'] = $labels;
    }

    protected function rules() : array{
        return [
            'data.name' => 'required',
            'data.price' => 'required | numeric | min:0',
            'data.quantity' => 'required | numeric | min:0',
        ];
    }

    public function messages() : array{
        return [
            'data.name.required' => 'يرجى ادخال اسم المنتج',
            'data.price.required' => 'يرجى ادخال سعر المنتج',
            'data.price.numeric' => 'يرجى ادخال سعر المنتج',
            'data.price.min' => 'يرجى ادخال سعر المنتج',
            'data.quantity.required' => 'يرجى ادخال كمية المنتج',
            'data.quantity.numeric' => 'يرجى ادخال كمية المنتج',
            'data.quantity.min' => 'يرجى ادخال كمية المنتج',
        ];
    }

    public function update(){
        $this->validate();

        $product = Product::findOrFail($this->data['id']);
        $product->update(collect($this->data)->except(['image', 'tags', 'categories', 'labels'])->toArray());

        if (!empty($this->data['image'])) {
            $product->addImage($this->data['image'] , 'product_image');
        }

        $product->labels()->sync($this->data['labels'] ?? []);
        $product->tags()->sync($this->data['tags'] ?? []);
        $product->categories()->sync($this->data['categories'] ?? []);


        $this->redirect('/products');
    }
    public function render()
    {
        $tags = tag::get();
        $labels = Label::get();
        $categories = Category::get();
        return view('livewire.products.edit-product',[
            'tags' => $tags,
            'labels' => $labels,
            'categories' => $categories
        ]);
    }
}
