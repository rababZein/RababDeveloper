<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExhibitionFile extends Model {

	//
	public function exhibition() 
	{
       return $this->belongsTo('App\Exhibition');
    }

    public function file() 
	{
       return $this->belongsTo('App\File');
    }

}
