<?php

namespace App\Livewire\Device;

use App\Models\Device;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateDevice extends Component
{
    public $pc_name;
    public $username;
    public $operator_name;
    public $type;
    public $os_type;
    public $os_build;
    public $ip_valid;
    public $ip_local;
    public $mac;
    public $net_type;
    public $switch;
    public $port;
    public $location;
    public $location_type;
    public $unit;
    public $shutdown;
    public $vlan;
    public $motherboard;
    public $cpu;
    public $ram;
    public $hdd;
    public $upgrade_hw;
    public $upgrade_win;
    public $clean_at;

    public $types;
    public $os_types;
    public $os_builds;
    public $net_types;
    public $switches;
    public $locations;
    public $location_types;
    public $units;
    public $vlans;
    public $deviceId;
    public function mount($deviceId = null)
    {
        $this->types = DB::table('devices')->distinct('type')->pluck('type')->toArray();
        $this->os_types = DB::table('devices')->distinct('os_type')->pluck('os_type')->toArray();
        $this->os_builds = DB::table('devices')->distinct('os_build')->pluck('os_build')->toArray();
        $this->net_types = DB::table('devices')->distinct('net_type')->pluck('net_type')->toArray();
        $this->switches = DB::table('devices')->distinct('switch')->pluck('switch')->toArray();
        $this->locations = DB::table('devices')->distinct('location')->pluck('location')->toArray();
        $this->location_types = DB::table('devices')->distinct('location_type')->pluck('location_type')->toArray();
        $this->units = DB::table('devices')->distinct('unit')->pluck('unit')->toArray();
        $this->vlans = DB::table('devices')->distinct('vlan')->pluck('vlan')->toArray();
        $this->deviceId = $deviceId;
        if ($this->deviceId) {
            $device = Device::find($this->deviceId);
            if ($device) {
                $this->pc_name = $device->pc_name;
                $this->username = $device->username;
                $this->operator_name = $device->operator_name;
                $this->type = $device->type;
                $this->os_type = $device->os_type;
                $this->os_build = $device->os_build;
                $this->ip_valid = $device->ip_valid;
                $this->ip_local = $device->ip_local;
                $this->mac = $device->mac;
                $this->net_type = $device->net_type;
                $this->switch = $device->switch;
                $this->port = $device->port;
                $this->location = $device->location;
                $this->location_type = $device->location_type;
                $this->unit = $device->unit;
                $this->shutdown = $device->shutdown;
                $this->vlan = $device->vlan;
                $this->motherboard = $device->motherboard;
                $this->cpu = $device->cpu;
                $this->ram = $device->ram;
                $this->hdd = $device->hdd;
                $this->upgrade_hw = $device->upgrade_hw;
                $this->upgrade_win = $device->upgrade_win;
                $this->clean_at = $device->clean_at;
            }
        }
    }

    public function saveDevice()
    {
        $this->validate([
            'pc_name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'operator_name' => 'nullable|string|max:255',
            'type' => 'required|string|max:255',
            'os_type' => 'nullable|string|max:255',
            'os_build' => 'nullable|string|max:255',
            'ip_valid' => 'nullable|string|max:255',
            'ip_local' => 'nullable|string|max:255',
            'mac' => 'nullable|string|max:255',
            'net_type' => 'nullable|string|max:255',
            'switch' => 'nullable|string|max:255',
            'port' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'location_type' => 'nullable|string|max:255',
            'unit' => 'nullable|string|max:255',
            'shutdown' => 'string|in:1,0',
            'vlan' => 'nullable|string|max:255',
            'motherboard' => 'nullable|string|max:255',
            'cpu' => 'nullable|string|max:255',
            'ram' => 'nullable|string|max:255',
            'hdd' => 'nullable|string|max:255',
            'upgrade_hw' => 'nullable|string|max:255',
            'upgrade_win' => 'nullable|string|max:255',
            'clean_at' => 'nullable|date',
        ]);

        if ($this->deviceId) {
            // بروزرسانی دستگاه موجود
            $device = Device::find($this->deviceId);
            if ($device) {
                $device->update([
                    'pc_name' => $this->pc_name,
                    'username' => $this->username,
                    'operator_name' => $this->operator_name,
                    'type' => $this->type,
                    'os_type' => $this->os_type,
                    'os_build' => $this->os_build,
                    'ip_valid' => $this->ip_valid,
                    'ip_local' => $this->ip_local,
                    'mac' => $this->mac,
                    'net_type' => $this->net_type,
                    'switch' => $this->switch,
                    'port' => $this->port,
                    'location' => $this->location,
                    'location_type' => $this->location_type,
                    'unit' => $this->unit,
                    'shutdown' => $this->shutdown,
                    'vlan' => $this->vlan,
                    'motherboard' => $this->motherboard,
                    'cpu' => $this->cpu,
                    'ram' => $this->ram,
                    'hdd' => $this->hdd,
                    'upgrade_hw' => $this->upgrade_hw,
                    'upgrade_win' => $this->upgrade_win,
                    'clean_at' => $this->clean_at,
                ]);
                session()->flash('success', 'دستگاه با موفقیت بروزرسانی شد!');
            }
        } else {
            // ایجاد دستگاه جدید
            Device::create([
                'pc_name' => $this->pc_name,
                'username' => $this->username,
                'operator_name' => $this->operator_name,
                'type' => $this->type,
                'os_type' => $this->os_type,
                'os_build' => $this->os_build,
                'ip_valid' => $this->ip_valid,
                'ip_local' => $this->ip_local,
                'mac' => $this->mac,
                'net_type' => $this->net_type,
                'switch' => $this->switch,
                'port' => $this->port,
                'location' => $this->location,
                'location_type' => $this->location_type,
                'unit' => $this->unit,
                'shutdown' => $this->shutdown,
                'vlan' => $this->vlan,
                'motherboard' => $this->motherboard,
                'cpu' => $this->cpu,
                'ram' => $this->ram,
                'hdd' => $this->hdd,
                'upgrade_hw' => $this->upgrade_hw,
                'upgrade_win' => $this->upgrade_win,
                'clean_at' => $this->clean_at,
            ]);
            session()->flash('success', 'دستگاه با موفقیت ثبت شد!');
        }
        return redirect()->route('devices'); // Change
        //$this->reset(); // Clear the form
    }

    public function render()
    {
        return view('livewire.device.create-device');
    }
}
