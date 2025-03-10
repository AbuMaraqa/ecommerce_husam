<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class VariationAttributeValue extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory , HasTranslations;

    protected $table = 'variation_attribute_values';

    protected $fillable = [
        'value',
        'attribute_id',
        'color_code',
        'color_image'
    ];

    public $translatable = ['attribute_name'];

    public function variationAttribute()
    {
        return $this->belongsTo(VariationAttributes::class, 'attribute_id', 'id');
    }

    public function getValueBadgeAttribute()
    {
        return '<span class="badge bg-primary">' . $this->variationAttribute->getTranslation('attribute_name', app()->getLocale()) . '</span>';
    }

    public function saveImage($image)
    {
        return $this->addMedia($image)
        ->toMediaCollection('attribute_value_image');
    }
}
