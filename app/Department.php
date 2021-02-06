<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
class Department extends Model
{
  protected $table='department';
  protected $primaryKey = "id_dep";
  protected $guarded=[''];



}
