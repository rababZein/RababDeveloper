<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Booth extends Model {

	//
	public function type() 
   {
       return $this->belongsTo('App\Type');
   }

   public function modeldesign() 
   {
       return $this->belongsTo('App\Modeldesign');
   }

   public function exhibitor() 
   {
       return $this->belongsTo('App\Exhibitor');
   }

   public function exhibition_event() 
   {
       return $this->belongsTo('App\ExhibitionEvent');
   }

   public function booth() 
   {
       return $this->belongsTo('App\Booth');
   }


}
