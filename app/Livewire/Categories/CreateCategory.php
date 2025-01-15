<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $status;
    public $icon;
    public $image;
    public $parent_id;

    public function mount()
    {
        $this->status = 1;
        if (!$this->parent_id) {
            $this->parent_id = Category::first()->id ?? null;
        }
    }

    #[Computed]
    public function getCategory(){
        return Category::get();
    }

    public function createCategory()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $category = Category::create([
            'name' => [app()->getLocale() => $this->name],
            'description' => [app()->getLocale() => $this->description],
            'status' => $this->status,
            'parent_id' => $this->parent_id,
        ]);

        if ($this->icon) {
            // $iconPath = $this->icon->store('icons', 'public');
            // $category->icon_path = $iconPath;
            $category->addImage($this->icon , 'category_icon');
        }

        if ($this->image) {
            // $imagePath = $this->image->store('images', 'public');
            // $category->image_path = $imagePath;
            $category->addImage($this->image , 'category_image');
        }

        $this->reset();

        session()->flash('success', 'تم اضافة القسم بنجاح');

        $this->redirect('/categories');
    }

    public function messages(){
        return [
            'name.required' => 'يرجى ادخال اسم القسم',
        ];
    }



    public function render()
    {
        return view('livewire.categories.create-category',[
            'categories' => $this->getCategory()
        ]);
    }
}
