<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'pc_name',
        'type',
        'os_type',
        'os_version',
        'ip',
        'username',
        'operator_name',
        'mac',
        'switch',
        'port',
        'location',
        'unit',
        'shutdown',
        'vlan',
    ];
    public function scopeSearch($query,$value)
    {
        $query->where('pc_name','like',"%{$value}%")
            ->orWhere('username','like',"%{$value}%")
            ->orWhere('type','like',"%{$value}%")
            ->orWhere('operator_name','like',"%{$value}%")
            ->orWhere('location','like',"%{$value}%")
            ->orWhere('vlan','like',"%{$value}%")
            ->orWhere('unit','like',"%{$value}%")
            ->orWhere('ip','like',"%{$value}%");
    }
}
