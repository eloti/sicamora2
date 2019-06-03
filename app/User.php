<?php
// User model.  Básicamente es la conexión a la base de datos.

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\PasswordResetServiceProvider;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use App\Language;

//class User extends Authenticatable
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Método de fechas
      public function created_at()
      {
        $date = new Carbon($this->created_at);
        return $date->format('d/m/y');
      }
      public function birth()
      {
        $date = new Carbon($this->birth);
        return $date->format('d/m/y');
      }

//Relaciones
      public function language()
        {
            return $this->belongsToMany('App\Language');
        }

}
