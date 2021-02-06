<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    protected $table='number';
    protected $guarded=[];
    protected $filable=['numbers','num_group','id_emp'];
        public function emps()
    {
    return $this->hasOne('App\Employee', 'id_emp', 'id_emp');
    }

}
