<?php

namespace App\Livewire\Tags;

use App\Models\tag;
use Livewire\Component;

class CreateTag extends Component
{
    public ?array $data;

    protected function rules(): array
    {
        return [
            'data.text' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.text.required' => __('translations.labels.text_required'),
        ];
    }

    public function save()
    {
        $this->validate();
        tag::create([
            'text' => [app()->getLocale() => $this->data['text']],
        ]);
        $this->redirect('/tags');
    }
    public function render()
    {
        return view('livewire.tags.create-tag');
    }
}
