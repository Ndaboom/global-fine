<?php

namespace App\Http\Livewire\Event;

use App\Models\Event\Organizer;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $price;
    public $name;
    public $images = [];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function rules()
    {
        return [
            'price' => 'required|numeric|min:0',
            'name' => 'required|string',
            'images.*' => 'required|file|image|max:200000',
        ];
    }

    public function store()
    {
        $data = $this->validate();

        $organizer = new Organizer($data);
        $organizer->user_id = auth()->user()->id;

        foreach ($this->images as $file) {
            $organizer
                ->addMedia($file->getRealPath())
                ->toMediaCollection('images');
        }

        $organizer->save();

        return redirect()->route('event.organizer.show', [$organizer]);
    }

    public function render()
    {
        return view('livewire.event.form');
    }
}
