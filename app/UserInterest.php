<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model {

	//
	public function user() 
	{
       return $this->belongsTo('App\User');
    }

    public function interest() 
	{
       return $this->belongsTo('App\Interest');
    }

}
