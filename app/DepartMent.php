<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartMent extends Model
{
    protected $primaryKey = 'department_id';
    protected $table = 'departments';

    public function company()
    {
        return $this->belongsTo("App\Company", 'comp_id', 'company_id');
    }

    public function locations()
    {
        return $this->hasMany("App\Locations");
    }
}
