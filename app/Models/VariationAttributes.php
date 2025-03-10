<?php

namespace App\Models;

use App\Enums\VariationType;
use App\Enums\VartaionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class VariationAttributes extends Model
{
    use HasFactory , HasTranslations;

    protected $table = 'variation_attributes';

    protected $fillable = [
        'id',
        'attribute_name',
        'type'
    ];

    public $translatable = [
        'attribute_name',
    ];

    public $casts = [
        'type' => VariationType::class
    ];

    public function values()
    {
        return $this->hasMany(VariationAttributeValue::class , 'attribute_id' , 'id');
    }
}
