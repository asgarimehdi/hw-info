<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeathRecord extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'location',
        'death_date',
        'cause_of_death',
        'lat',
        'lng',
        'description',
        'national_id'
    ];
}
