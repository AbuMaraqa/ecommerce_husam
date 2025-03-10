<?php

namespace App\Livewire\Products;

use App\Models\Category;
use App\Models\Label;
use App\Models\Product;
use App\Models\tag;
use App\Models\VariationAttributes;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    public ?array $data;

    public $variations = [];
    public $availableAttributes;
    public $attributeValues = [];

    public function mount(){
        $this->availableAttributes = VariationAttributes::with('values')->get();
    }

    public function addVariation()
{
    $this->variations[] = [
        'variation_name' => '',
        'variation_values' => [],
        'price' => null,
        'stock_quantity' => 0,
        'sku' => '',
        'attributes' => []
    ];
}

public function removeVariation($index)
{
    unset($this->variations[$index]);
    $this->variations = array_values($this->variations);
}

public function updatedVariations($value, $path)
{
    $parts = explode('.', $path);

    // التحقق من وجود العناصر الأساسية في المصفوفة
    if (count($parts) < 3) {
        return;
    }

    $index = $parts[1];
    $field = $parts[2];

    // التحقق من وجود الفهرس في المصفوفة
    if (!isset($this->variations[$index])) {
        return;
    }

    if ($field === 'variation_name') {
        $this->variations[$index]['attributes'] = [];
    }
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

    public function addAttribute(){
        $this->attributes[] = [
            'name' => '',
            'value' => '',
            'price' => '',
            'stock_quantity' => '',
            'sku' => '',
        ];
    }

    public function save(){
        // $this->validate();
        $product = Product::create($this->data);

        if ($this->data['image']) {
            $product->addImage($this->data['image'] , 'product_image');
        }

        if (!empty($this->data['labels'])) {
            $product->labels()->sync($this->data['labels']);
        }

        if (!empty($this->data['tags'])) {
            $product->tags()->sync($this->data['tags']);
        }

        if (!empty($this->data['categories'])) {
            $product->categories()->sync($this->data['categories']);
        }

        foreach ($this->variations as $variationData) {
            $variation = $product->variations()->create([
                'variation_name' => $variationData['variation_name'],
                'price' => $variationData['price'],
                'stock_quantity' => $variationData['stock_quantity'],
                'sku' => $variationData['sku']
            ]);

            foreach ($variationData['attributes'] as $attributeId) {
                $variation->attributes()->attach($attributeId);
            }
        }


        $this->redirect('/products');
    }

    public function render()
    {
        $tags = tag::get();
        $labels = Label::get();
        $categories = Category::get();
        return view('livewire.products.create-product',[
            'tags' => $tags,
            'labels' => $labels,
            'categories' => $categories
        ]);
    }
}
