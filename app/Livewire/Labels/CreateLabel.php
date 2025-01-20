<?php

namespace App\Livewire\Labels;

use App\Models\Label;
use Livewire\Component;

class CreateLabel extends Component
{
    public ?array $data;

    protected function rules(): array
    {
        return [
            'data.text' => ['required', 'string', 'max:255'],
            'data.bg_color' => ['required', 'string', 'max:255'],
            'data.text_color' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.text.required' => __('translations.labels.text_required'),
            'data.bg_color.required' => __('translations.labels.bg_color_required'),
            'data.text_color.required' => __('translations.labels.text_color_required'),
        ];
    }

    public function save()
    {
        $this->validate();
        Label::create([
            'text' => [app()->getLocale() => $this->data['text']],
            'bg_color' => $this->data['bg_color'],
            'text_color' => $this->data['text_color'],
        ]);
        $this->redirect('/labels');
    }
    public function render()
    {
        return view('livewire.labels.create-label');
    }
}
