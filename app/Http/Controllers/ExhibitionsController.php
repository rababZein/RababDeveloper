<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use Auth;
use App\Exhibition;

class ExhibitionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$exhibitions=Exhibition::all();
		return view('exhibitions.index',compact('exhibitions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('exhibitions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
					//echo "string"; exit();

		$v = Validator::make(Request::all(), [
        'name' => 'required|max:50|unique:modeldesigns',
      
       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$exhibition = new Exhibition;
		    $exhibition->name = Request::get('name');
		    $exhibition->desc = Request::get('desc');
			$exhibition->save();
			return redirect('exhibitions');
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
		$exhibition=Exhibition::find($id);
		return view('exhibitions.show',compact('exhibition'));
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
		$exhibition=Exhibition::find($id);
		return view('exhibitions.edit',compact('exhibition'));
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
        'name' => 'required|max:50',       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
            $id=Request::get('id');
			$exhibition=Exhibition::find($id);
			$exhibition->name = Request::get('name');
		    $exhibition->desc = Request::get('desc');
			$exhibition->save();
			return redirect('exhibitions');
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
		$exhibitionId = Request::get('id');
	    Exhibition::where('id',$exhibitionId)->delete();
	    return redirect("exhibitions");
	}


}
