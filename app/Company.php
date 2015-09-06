<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

	//

   public function user() 
   {
       return $this->belongsTo('App\User');
   }

   public function country() 
   {
       return $this->belongsTo('App\Country');
   }

   public function exhibitors()
    {
        return $this->hasMany('App\Exhibitor');
    }

}
