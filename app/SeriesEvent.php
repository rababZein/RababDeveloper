<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SeriesEvent extends Model {

	//
   public function exhibition() 
   {
       return $this->belongsTo('App\Exhibition');
   }
   public function exhibitor() 
   {
       return $this->belongsTo('App\Exhibitor');
   }

}
