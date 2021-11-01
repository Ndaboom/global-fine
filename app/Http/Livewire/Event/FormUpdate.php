<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use App\Models\Event\Organizer;
use Livewire\WithFileUploads;

class FormUpdate extends Component
{
    use WithFileUploads;

    public $organizer;
    public $images;

    public function mount(Organizer $organizer)
    {
        $this->organizer = $organizer;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        if ($this->images) {
            $this->organizer
                ->clearMediaCollection('images');

            foreach ($this->images as $file) {
                $this->organizer
                    ->addMedia($file->getRealPath())
                    ->toMediaCollection('images');
            }
        }

        $this->organizer->save();

        return redirect()->route('event.organizer.show', [$this->organizer]);
    }

    public function rules()
    {
        return [
            'organizer.price' => 'required|numeric|min:0',
            'organizer.name' => 'required|string',
            'images.*' => 'required|file|image|max:200000',
        ];
    }

    public function render()
    {
        return view('livewire.event.form-update');
    }
}
