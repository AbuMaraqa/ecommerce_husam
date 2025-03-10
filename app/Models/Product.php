<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, WithFileUploads;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'sku',
        'wholesale_price',
        'low_stock',
        'active',
        'available',
        'sold_count',
        'featured',
        'delivery_class',
        'category_id',
        'user_id',
        'sale_price'
    ];

    public $translatable = [
        'name',
        'description',
    ];

    public function addImage($file, $collection)
    {
        // Remove the current media from the collection if it exists
        if ($this->getFirstMedia($collection)) {
            $this->clearMediaCollection($collection);
        }

        // Add the new media to the collection
        $this->addMedia($file)->toMediaCollection($collection);
    }

    public function getImage($collection)
    {
        if ($this->getFirstMediaUrl($collection)) {
            return $this->getFirstMediaUrl($collection);
        } else {
            return asset('image/category/no_category.png');
        }
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'product_labels', 'product_id', 'label_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(VariationAttributes::class, 'variation_attribute_value_variation', 'variation_id', 'attribute_id');
    }

    public function variations()
{
    return $this->hasMany(ProductVariation::class);
}
}
