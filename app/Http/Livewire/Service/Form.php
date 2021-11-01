<?php

namespace App\Http\Livewire\Service;

use App\Models\Service\ExtraService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $description;
    public $images = [];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function rules()
    {
        return [
            'description' => 'required',
            'images.*' => 'required|file|image|max:200000',
        ];
    }

    public function store()
    {
        $data = $this->validate();

        $extraService = new ExtraService($data);
        $extraService->user_id = auth()->user()->id;

        foreach ($this->images as $file) {
            $extraService
                ->addMedia($file->getRealPath())
                ->toMediaCollection('images');
        }

        $extraService->save();

        return redirect()->route('service.extraService.show', [$extraService]);
    }

    public function render()
    {
        return view('livewire.service.form');
    }
}
