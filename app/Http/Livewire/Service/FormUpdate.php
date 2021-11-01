<?php

namespace App\Http\Livewire\Service;

use Livewire\Component;
use App\Models\Service\ExtraService;
use Livewire\WithFileUploads;

class FormUpdate extends Component
{
    use WithFileUploads;

    public $extraService;
    public $images;

    public function mount(ExtraService $extraService)
    {
        $this->extraService = $extraService;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        if ($this->images) {
            $this->extraService
                ->clearMediaCollection('images');

            foreach ($this->images as $file) {
                $this->extraService
                    ->addMedia($file->getRealPath())
                    ->toMediaCollection('images');
            }
        }

        $this->extraService->save();

        return redirect()->route('service.extraService.show', [$this->extraService]);
    }

    public function rules()
    {
        return [
            'extraService.description' => 'required',
            'images.*' => 'required|file|image|max:200000',
        ];
    }

    public function render()
    {
        return view('livewire.service.form-update');
    }
}
