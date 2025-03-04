<?php

namespace App\Livewire\Device;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Device;
use Livewire\WithPagination;

class Devices extends Component
{
    use WithPagination;


    #[Url(history: true)]
    public $search = '';
    #[Url()]
    public $perPage = 20;
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function updatedPerPage()
    {
        $this->resetPage();
    }
    public function delete(ModelsDevice $device): void
    {
        $device->delete();
        session()->flash('success', 'دستگاه با موفقیت حذف شد.');
    }
    public function render()
    {
        $devices = Device::search($this->search)->paginate($this->perPage);

        return view('livewire.device.devices', ['devices' => $devices]);
    }
}
