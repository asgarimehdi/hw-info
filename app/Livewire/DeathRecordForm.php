<?php

namespace App\Livewire;

use App\Models\DeathRecord;
use Livewire\Component;
use App\Models\Region_counties;

class DeathRecordForm extends Component
{
    public $apiKey;
    public $regionCounties; 
    public function mount()
    {
        $this->apiKey = env('NESHAN_API_KEY');
        $this->regionCounties = Region_counties::all(); 

    }
    public $location;
    public $death_date;
    public $cause_of_death;
    public $lat;
    public $lng;
    
    protected $rules = [
        'location' => 'required|string|max:255',
        'death_date' => 'required|date',
        'cause_of_death' => 'required|string|max:255',
        'lat' => 'required|numeric',
        'lng' => 'required|numeric',
    ];

    public function submit()
    {
        $this->validate();

        DeathRecord::create([
            'user_id' => auth()->id(),
            'location' => $this->location,
            'death_date' => $this->death_date,
            'cause_of_death' => $this->cause_of_death,
            'lat' => $this->lat,
            'lng' => $this->lng,
        ]);

        session()->flash('message', 'ثبت مرگ با موفقیت انجام شد.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.death-record-form');
    }
}

