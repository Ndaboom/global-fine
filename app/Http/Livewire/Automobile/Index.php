<?php

namespace App\Http\Livewire\Automobile;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Automobile\Vehicule;

class Index extends Component
{
    use WithPagination;

    const ITEMS_PER_PAGE = 12;

    public function render()
    {
        $vehicules = Vehicule::paginate(self::ITEMS_PER_PAGE);

        return view('livewire.automobile.index', [
            'vehicules' => $vehicules,
        ]);
    }
}
