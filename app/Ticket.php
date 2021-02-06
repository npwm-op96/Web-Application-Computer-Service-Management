<?php

namespace App;
use App\Employee;
use App\Inventory;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $table='ticket';
  protected $primaryKey='id_ticket';
  protected $guarded=[''];




      public function type()
    {
        return $this->belongsTo(Type_problem::class);
    }
  public function user()
  {
    return $this->hasOne('App\User', 'id_emp', 'id_emp');
  }
  public function emps()
  {
  return $this->hasOne('App\Employee', 'id_emp', 'id_emp');
  }
  public function stores()
  {
  return $this->hasOne('App\Store', 'id_emp', 'id_emp');
  }
  public function it()
  {
  return $this->hasOne('App\Employee', 'id_emp', 'id_staff');
  }




}
