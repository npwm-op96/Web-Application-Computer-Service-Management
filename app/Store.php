<?php

namespace App;
use App\Employee;
use App\Department;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table='stores';
    protected $guarded=[''];

    public function emps()
    {
    return $this->hasOne('App\Employee', 'id_emp', 'id_emp');
    }
     public function dep()
    {
        return $this->belongsTo(Department::class);
    }

}
