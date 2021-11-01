<?php

namespace App\Http\Livewire\Immovable;

use Livewire\Component;
use App\Models\Country;
use App\Models\Immovable\Property;
use App\Models\State;
use Livewire\WithFileUploads;

class FormUpdate extends Component
{
    use WithFileUploads;

    public $property,
        $state_id,
        $country_id,
        $countries,
        $images;

    public function mount(Property $property)
    {
        $this->countries = Country::all();

        $this->property = $property;
        $this->country_id = $property->city->state->country->id;
        $this->state_id = $property->city->state->id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        if ($this->images) {
            $this->property->clearMediaCollection('images');

            foreach ($this->images as $file) {
                $this->property
                    ->addMedia($file->getRealPath())
                    ->toMediaCollection('images');
            }
        }

        $this->property->save();

        return redirect()->route('immovable.property.show', [$this->property]);
    }

    public function rules()
    {
        return [
            'property.price' => 'required|numeric|min:1',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'property.city_id' => 'required|numeric',
            'property.commune' => 'nullable|string',
            'property.quarter' => 'nullable|string',
            'property.avenue' => 'nullable|string',
            'property.addr_number' => 'required|string',
            'images.*' => 'required|file|image|max:100000',
        ];
    }

    public function render()
    {
        $states = null;
        $cities = null;

        if ($this->country_id) {
            $states = Country::find($this->country_id)->states;
        }

        if ($this->state_id) {
            $cities = State::find($this->state_id)->cities;
        }

        return view('livewire.immovable.form-update', [
            'states' => $states,
            'cities' => $cities,
        ]);
    }
}
