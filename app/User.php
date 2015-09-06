<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function tracklogins()
    {
        return $this->hasMany('App\Tracklogin');
    }

    public function systemtracks()
    {
        return $this->hasMany('App\Systemtrack');
    }

     public function generalinfo() 
	 {
        return $this->belongsTo('App\Generalinfo');
     }


	public function professionalinfo() 
	{
           return $this->belongsTo('App\Professionalinfo');
    }


    public function company() 
	 {
        return $this->belongsTo('App\Company');
     }


}
