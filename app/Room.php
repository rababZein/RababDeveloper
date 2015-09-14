<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {

	//
   public function event() 
   {
       return $this->belongsTo('App\Event');
   }

   public function spot() 
   {
       return $this->belongsTo('App\Spot');
   }

}
