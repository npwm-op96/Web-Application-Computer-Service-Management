<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   protected $table='messages';
   protected $fillable = ['message'];
       public function user()
    {
        return $this->belongsTo(User::class);
    }
 public function ticket()
  {
  return $this->hasOne('App\Ticket', 'id_ticket', 'id_ticket');
  }
}
