<?php

namespace App\Http\Livewire\Immovable;

use App\Models\Immovable\Property;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    const ITEMS_PER_PAGE = 6;

    public function render()
    {
        $properties = Property::paginate(self::ITEMS_PER_PAGE);

        return view('livewire.immovable.index', [
            'properties' => $properties
        ]);
    }
}
