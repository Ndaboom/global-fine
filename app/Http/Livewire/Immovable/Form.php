<?php

namespace App\Http\Livewire\Immovable;

use App\Models\Country;
use App\Models\Immovable\Property;
use App\Models\State;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $price,
        $country_id,
        $state_id,
        $city_id,
        $commune,
        $quarter,
        $avenue,
        $addr_number,
        $images = [],
        $status,
        $countries;

    public function mount()
    {
        $this->countries = Country::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function rules()
    {
        return [
            'price' => 'required|numeric|min:1',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'commune' => 'nullable|string',
            'quarter' => 'nullable|string',
            'avenue' => 'nullable|string',
            'addr_number' => 'required|string',
            'status' => 'required|in:For rent, For sell',
            'images.*' => 'required|file|image|max:100000',
        ];
    }

    public function store()
    {
        $data = $this->validate();
        unset($data['country_id']);
        unset($data['state_id']);

        $property = new Property($data);
        $property->user_id = auth()->user()->id;

        foreach ($this->images as $file) {
            $property
                ->addMedia($file->getRealPath())
                ->toMediaCollection('images');
        }

        $property->save();

        return redirect()->route('immovable.property.show', [$property]);
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

        return view('livewire.immovable.form', [
            'states' => $states,
            'cities' => $cities,
        ]);
    }
}
