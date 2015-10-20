<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyFile extends Model {

	//
	
	public function company() 
	{
       return $this->belongsTo('App\Company');
    }

    public function file() 
	{
       return $this->belongsTo('App\File');
    }

}
