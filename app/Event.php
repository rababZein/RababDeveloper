<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	//
   public function series_event() 
   {
       return $this->belongsTo('App\SeriesEvent');
   }


}
