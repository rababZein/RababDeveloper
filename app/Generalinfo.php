<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Generalinfo extends Model {

	//
   public function user() 
   {
       return $this->belongsTo('App\User');
   }

    public function country() 
   {
       return $this->belongsTo('App\Country');
   }


}
