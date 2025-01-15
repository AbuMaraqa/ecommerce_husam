<?php

namespace App\Models;

use App\Enums\CategoryStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, WithFileUploads;

    protected $table = 'categories';
    protected $guarded = [];
    public $translatable = ['name', 'description'];
    protected $casts = [
        'status' => CategoryStatus::class
    ];


    public function getBadge(): string
    {
        // Since 'status' is already cast to CategoryStatus, use it directly
        $status = $this->status;

        // If $status is null, fall back to a default value
        if (!$status) {
            $status = CategoryStatus::INACTIVE; // Default fallback
        }

        return <<<HTML
            <span class="badge {$status->badgeClass()}">{$status->label()}</span>
        HTML;
    }

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
}
