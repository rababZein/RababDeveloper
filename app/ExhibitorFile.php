<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExhibitorFile extends Model {

	//
	public function exhibitor() 
	{
       return $this->belongsTo('App\Exhibitor');
    }

    public function file() 
	{
       return $this->belongsTo('App\File');
    }

}
