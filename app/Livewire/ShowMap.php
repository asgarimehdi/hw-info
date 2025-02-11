<?php

namespace App\Livewire;
use App\Models\Region_counties;

use Livewire\Component;

class ShowMap extends Component
{
    public $apiKey;
    public $regionCounties; 
    public function mount()
    {
        $this->apiKey = env('NESHAN_API_KEY');
        $this->regionCounties = Region_counties::all(); 

    }

    public function render()
    {
        return view('livewire.show-map');
    }
}
