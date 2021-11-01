<?php

namespace App\Http\Livewire\Automobile;

use App\Models\Automobile\Make;
use App\Models\Automobile\Model;
use App\Models\Automobile\Vehicule;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormUpdate extends Component
{
    use WithFileUploads;

    public Vehicule $vehicule;
    public $images = [],
        $make,
        $makes_list;

    public function mount(Vehicule $vehicule)
    {
        $this->makes_list = Make::all();
        $this->vehicule = $vehicule;
        $this->make = $vehicule->model->make->id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if ($propertyName == 'status') {
            if ($this->vehicule->status == 'For sell') {
                $this->vehicule->precision = null;
            } else {
                $this->vehicule->plate_number
                    = $this->vehicule->made_year
                    = null;
            }
        }
    }

    public function rules()
    {
        return [
            'vehicule.price' => 'required|numeric|min:1',
            'vehicule.status' => 'required|in:For sell,For rent',
            'make' => 'required|numeric',
            'vehicule.model_id' => 'required|numeric',
            'vehicule.description' => 'required|string',
            'vehicule.plate_number' => 'nullable|string|min:9|max:17|required_if:status,For sell',
            'vehicule.made_year' => 'nullable|required_if:status,For sell|numeric|min:1940|max:' . date('Y'),
            'vehicule.precision' => 'nullable|required_if:status,For rent|in:With driver,Without driver',
            'images.*' => 'nullable|file|image|max:100000',
        ];
    }

    public function store()
    {
        $this->validate();

        if ($this->images) {
            $this->vehicule->clearMediaCollection('images');

            foreach ($this->images as $file) {
                $this->vehicule
                    ->addMedia($file->getRealPath())
                    ->toMediaCollection('images');
            }
        }

        $this->vehicule->save();

        return redirect()->route('automobile.vehicule.show', [$this->vehicule]);
    }

    public function render()
    {
        $models = Model::where('make_id', $this->make)
            ->get();

        return view('livewire.automobile.form-update', [
            'models_list' => $models
        ]);
    }
}
