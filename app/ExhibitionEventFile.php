<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExhibitionEventFile extends Model {

	//
	public function exhibition_event() 
	{
       return $this->belongsTo('App\ExhibitionEvent');
    }

    public function file() 
	{
       return $this->belongsTo('App\File');
    }

}
