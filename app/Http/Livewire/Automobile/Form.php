<?php

namespace App\Http\Livewire\Automobile;

use App\Models\Automobile\Make;
use App\Models\Automobile\Model;
use App\Models\Automobile\Vehicule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $price,
        $status,
        $model_id,
        $make,
        $made_year,
        $plate_number,
        $precision,
        $makes_list,
        $description,
        $images = [];

    public function mount()
    {
        $this->makes_list = Make::all();
        // $this->status = 'For sell';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if ($propertyName == 'status') {
            if ($this->status == 'For sell') {
                $this->precision = null;
            } else {
                $this->plate_number
                    = $this->made_year
                    = null;
            }
        }
    }

    public function rules()
    {
        return [
            'price' => 'required|numeric|min:1',
            'status' => 'required|in:For sell,For rent',
            'make' => 'required|numeric',
            'model_id' => 'required|numeric',
            'description' => 'required|string',
            'plate_number' => 'nullable|string|min:9|max:17|required_if:status,For sell',
            'made_year' => 'nullable|required_if:status,For sell|numeric|min:1940|max:' . date('Y'),
            'precision' => 'nullable|required_if:status,For rent|in:With driver,Without driver',
            'images.*' => 'required|file|image|max:100000',
        ];
    }

    public function store()
    {
        // dd($this->getErrorBag());
        $data = $this->validate();
        unset($data['make']); // Not needed for our model

        $vehicule = new Vehicule($data);
        $vehicule->user_id = auth()->user()->id;

        foreach ($this->images as $file) {
            $vehicule
                ->addMedia($file->getRealPath())
                ->toMediaCollection('images');
        }

        $vehicule->save();

        return redirect()->route('automobile.vehicule.show', [$vehicule]);
    }

    public function render()
    {
        $models = null;

        if ($this->make) {
            $models = Model::where('make_id', $this->make)
                ->get();
        }

        return view('livewire.automobile.form', [
            'models_list' => $models
        ]);
    }
}
