<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $primaryKey = 'warehouse_id';

    public function company()
    {
        return $this->belongsTo("\App\Company", 'comp_id', 'company_id');
    }

    public function department()
    {
        return $this->belongsTo("\App\Department", 'dep_id', 'department_id');
    }

    public function location()
    {
        return $this->belongsTo("\App\Location", 'loc_id', 'location_id');
    }
}
