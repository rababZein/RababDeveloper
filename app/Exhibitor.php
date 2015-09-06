<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model {

	//
 
   public function country() 
   {
       return $this->belongsTo('App\Country');
   }

   public function company() 
   {
       return $this->belongsTo('App\Company');
   }

   
}
