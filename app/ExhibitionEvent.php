<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExhibitionEvent extends Model {

	//
	 public function exhibition() 
   {
       return $this->belongsTo('App\Exhibition');
   }

}
