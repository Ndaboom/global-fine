<?php

namespace App\Http\Livewire\Service;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service\ExtraService;

class Index extends Component
{
    use WithPagination;

    const ITEMS_PER_PAGE = 12;

    public function render()
    {
        $extraServices = ExtraService::paginate(self::ITEMS_PER_PAGE);

        return view('livewire.service.index', [
            'extraServices' => $extraServices,
        ]);
    }
}
