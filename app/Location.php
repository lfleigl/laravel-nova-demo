<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $primaryKey = 'location_id';
    protected $appends = ['title'];

    public function company()
    {
        return $this->belongsTo("App\Department_id", 'dep_id', 'department_id');
    }

    public function getTitleAttribute()
    {
        return $this->attributes['name'] . ' custom';
    }
}
