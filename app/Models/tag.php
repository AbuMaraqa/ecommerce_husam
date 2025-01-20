<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class tag extends Model
{
    use HasFactory , HasTranslations;

    public $translatable = ['text'];

    protected $fillable = [
        'text',
    ];

    protected $table='tags';
}
