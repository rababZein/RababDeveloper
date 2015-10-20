<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BoothFile extends Model {

	//
	public function booth() 
	{
       return $this->belongsTo('App\Booth');
    }

    public function file() 
	{
       return $this->belongsTo('App\File');
    }
}
