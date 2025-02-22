<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Device as ModelsDevice;
use Livewire\WithPagination;

class Devices extends Component
{
    use WithPagination;
    public $ModelsDevice;

    #[Url(history: true)]
    public $search = '';
    #[Url()]
    public $perPage = 20;
    public function updatedSearch()
    {
        $this->resetPage();
    }
    //Validation Rules
    protected $rules = [
        'pc_name' => 'required',
        'ip_valid' => 'required',
        'username' => 'required',
    ];
    public function delete(ModelsDevice $device): void
    {
        $device->delete();
    }
    public function render()
    {
        $devices = ModelsDevice::search($this->search)->paginate($this->perPage);

        return view('livewire.devices', ['devices' => $devices]);
    }
}
