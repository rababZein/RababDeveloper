<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Systemtrack extends Model {

	//
	 public function user() 
	 {
       return $this->belongsTo('App\User');
    }

    public function activity() 
	  {
       return $this->belongsTo('App\Activity');
    }

    public function spot() 
	  {
       return $this->belongsTo('App\Spot');
    }

}
