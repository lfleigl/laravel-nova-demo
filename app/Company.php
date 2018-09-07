<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'company_id';

    public function departments()
    {
        return $this->hasMany("App\Department", 'comp_id', 'company_id');
    }
}
