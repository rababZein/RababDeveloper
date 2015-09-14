<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Spot;
use Request;

class SpotsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$spots=Spot::all();
		return view('spots.index',compact('spots'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('spots.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
			//
		$v = Validator::make(Request::all(), [
        'location' => 'required|max:50|unique:spots',
           
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
		    $spot = new Spot;
			$spot->location = Request::get('location');
			$spot->desc = Request::get('desc');
			$spot->save();
			return redirect('spots');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$spot=Spot::find($id);
		return view('spots.show',compact('spot'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$spot=Spot::find($id);
		return view('spots.edit',compact('spot'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$v = Validator::make(Request::all(), [
        	'location' => 'required|max:50|unique:spots',
           
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$id=Request::get('id');
			$spot=Spot::find($id);
			$spot->location=Request::get('location');
			$spot->desc=Request::get('desc');
			$spot->save();
			return redirect("spots");
	    }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$spotId = Request::get('id');
		//echo $spotId; exit();
	    Spot::where('id',$spotId)->delete();

	    return redirect("spots");

	}

}
