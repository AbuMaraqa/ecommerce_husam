<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCategory extends Component
{
    use WithFileUploads;
    public $category;
    public $category_id;
    public $name;
    public $description;
    public $status;
    public $icon;
    public $image;
    public $parent_id;

    public function mount($id)
    {
        $data = Category::find($id);
        $this->category = $data;
        $this->category_id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->status = $data['status'];
        $this->icon = $data['icon'];
        $this->image = $data['image'];
        $this->parent_id = $data['parent_id'];
    }

    #[Computed]
    public function getCategory(){
        return Category::get();
    }

    public function getCategoryImage($collection){
        return $this->category->getImage($collection);
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $category = Category::find($this->category_id);

        $category->update([
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

        session()->flash('success', 'تم تعديل القسم بنجاح');

        $this->redirect('/categories');

    }

    public function messages(){
        return [
            'name.required' => 'يرجى ادخال اسم القسم',
        ];
    }



    public function render()
    {
        return view('livewire.categories.edit-category',[
            'categories' => $this->getCategory(),
            'category' => $this->category,
        ]);
    }
}
