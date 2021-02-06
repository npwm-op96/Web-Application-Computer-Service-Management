<?php

namespace App;
use App\Employee;
use App\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{   protected $table="users";
    protected $filable=['id_emp,password,type,status'];
    protected $guarded=[];
    use Notifiable;
    const ADMIN_TYPE = 1;
    const DEFAULT_TYPE = 0;
    const Online = 1;

    public function emps()
    {
    return $this->hasOne('App\Employee', 'id_emp', 'id_emp');
    }

    public function isAdmin(){
      return $this->type === self::ADMIN_TYPE;
    }
        public function active(){
      return $this->status === self::Online;
    }

    public function dep()
    {
        return $this->belongsTo(Department::class);
    }

    //ระบบ Profile


  public function stores()
  {
  return $this->hasOne('App\Store', 'id_emp', 'id_emp');
  }
  public function it()
  {
  return $this->hasOne('App\User', 'id_emp', 'id_staff');
  }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     /**
 * A user can have many messages
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
    public function messages()
      {
          return $this->hasMany(Message::class);
      }
   }
