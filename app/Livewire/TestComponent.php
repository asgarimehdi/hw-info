<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class TestComponent extends Component
{
    public $testValue = 'January';

  
    public function updated($propertyName)
    {
        \Log::info('پراپرتی تغییر کرد: ' . $propertyName);

        
    }
    public function render()
    {
        return view('livewire.test-component');
    }
}