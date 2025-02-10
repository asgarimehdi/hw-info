<?php

namespace App\Livewire;

use Livewire\Component;

class ShowMap extends Component
{
    public $apiKey;

    public function mount()
    {
        $this->apiKey = env('NESHAN_API_KEY');
    }

    public function render()
    {
        return view('livewire.show-map');
    }
}
