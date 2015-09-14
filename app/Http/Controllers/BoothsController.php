<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use Auth;
use App\Booth;
use App\Type;
use App\Modeldesign;
use App\Exhibitor;
use App\ExhibitionEvent;

class BoothsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$booths=Booth::all();
		return view('booths.index',compact('booths'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$exhibitors=Exhibitor::all();
		$exhibitionevents=ExhibitionEvent::all();
		$types=Type::all();
		$models=Modeldesign::all();
		return view('booths.create',compact('types','models','exhibitors','exhibitionevents'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$v = Validator::make(Request::all(), [
        'name' => 'required|max:50|unique:halls',
        'type_id' => 'required',
        'modeldesign_id' => 'required',
        'exhibitor' => 'required',
        'exhibitionevent' => 'required', 
       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$booth = new Booth;
		    $booth->name = Request::get('name');
		    $booth->desc = Request::get('desc');
		    $booth->type_id = Request::get('type_id');
		    $booth->modeldesign_id = Request::get('modeldesign_id');
		    $booth->exhibitor_id = Request::get('exhibitor');
		    $booth->exhibitionevent_id = Request::get('exhibitionevent');
			$booth->save();
			return redirect('booths');
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
		$booth=Booth::find($id);
		return view('booths.show',compact('booth'));
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
		$booth=Booth::find($id);
		$types=Type::all();
		$models=Modeldesign::all();
		return view('booths.edit',compact('booth','types','models'));
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
        'type_id' => 'required',
        'modeldesign_id' => 'required', 
        'exhibitor' => 'required',
        'exhibitionevent' => 'required',    
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
            $id=Request::get('id');
			$booth=Booth::find($id);
			$booth->name = Request::get('name');
		    $booth->desc = Request::get('desc');
		    $booth->type_id = Request::get('type_id');
		    $booth->modeldesign_id = Request::get('modeldesign_id');
		    $booth->exhibitor_id = Request::get('exhibitor');
		    $booth->exhibitionevent_id = Request::get('exhibitionevent');
			$booth->save();
			return redirect('booths');
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
		$boothId = Request::get('id');
	    Booth::where('id',$boothId)->delete();
	    return redirect("booths");
	}

	

}
