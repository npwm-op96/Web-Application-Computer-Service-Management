<?php

namespace App;
use App\Department;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $table='employee';
  protected $fillable = [
   'first_name', 'last_name','id_emp','id_dep','postion', 'image'
  ];
  
  public function dep()
  {
  return $this->hasOne('App\Department', 'id_dep', 'id_dep');
  }
    public function stores()
  {
  return $this->hasOne('App\Store', 'id_emp', 'id_emp');
  }
}
