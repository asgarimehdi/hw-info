<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'pc_name','username','operator_name','type','os_type','os_build','ip_valid', 'ip_local','mac',
        'net_type','switch','port','location','location_type','unit','shutdown','vlan','motherboard',
        'cpu','ram','hdd','upgrade_hw','upgrade_win','clean_at'
    ];
    public function scopeSearch($query, $value)
    {
        $query->where(function ($q) use ($value) {
            $q->where('pc_name', 'like', "%{$value}%")
                ->orWhere('username', 'like', "%{$value}%")
                ->orWhere('type', 'like', "%{$value}%")
                ->orWhere('operator_name', 'like', "%{$value}%")
                ->orWhere('location', 'like', "%{$value}%")
                ->orWhere('location_type', 'like', "%{$value}%")
                ->orWhere('vlan', 'like', "%{$value}%")
                ->orWhere('unit', 'like', "%{$value}%")
                ->orWhere('mac', 'like', "%{$value}%")
                ->orWhere('ip_valid', 'like', "%{$value}%")
                ->orWhere('ip_local', 'like', "%{$value}%")
                ->orWhere('net_type', 'like', "%{$value}%")
                ->orWhere('os_type', 'like', "%{$value}%");
        });
    }
}
