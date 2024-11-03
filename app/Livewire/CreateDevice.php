<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateDevice extends Component
{
    #[Rule('required')]
    public $pc_name= '';

    public $type= '';

    public $os_type= '';

    public $os_version= '';

    public $username= '';

    public $operator_name= '';

    public $ip= '';

    public $mac= '';

    public $switch= '';

    public $port= '';
    #
    public $location= '';

    public $unit= '';
    #[Rule('required')]
    public $shutdown= '';

    public $vlan= '';

    public function createDevice()
    {
        //error handling try catch must implement
        $this->validate();
        Device::create([
            'pc_name' => $this->pc_name,
            'type' => $this->type,
            'os_type' => $this->os_type,
            'os_version' => $this->os_version,
            'username' => $this->username,
            'operator_name' => $this->operator_name,
            'ip' => $this->ip,
            'mac' => $this->mac,
            'switch' => $this->switch,
            'port' => $this->port,
            'location' => $this->location,
            'unit' => $this->unit,
            'shutdown' => $this->shutdown,
            'vlan' => $this->vlan,
        ]);
        $this->reset(['pc_name','type','os_type','os_version','username','operator_name','ip','mac','switch','port','location','unit','shutdown','vlan']);
        request()->session()->flash('success', 'دستگاه با موفقیت اضافه شد');
        $this->dispatch('close-modal',name:'new-device');
    }
    public function render()
    {
        return view('livewire.create-device');
    }
}
