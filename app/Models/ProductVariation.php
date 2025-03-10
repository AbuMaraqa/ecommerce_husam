<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductVariation extends Model
{
    use HasFactory;

    protected $table = 'product_variations';

    protected $guarded = [];

    public function attributeValues()
{
    return $this->belongsToMany(VariationAttributeValue::class);
}

public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(
            VariationAttributeValue::class,
            'product_variation_attributes', // اسم الجدول الوسيط
            'variation_id', // المفتاح الخارجي للجدول الحالي
            'attribute_id' // المفتاح الخارجي للجدول المرتبط
        );
    }
}
