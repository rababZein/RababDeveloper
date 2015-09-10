<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\SeriesEvent;
use Request;
use Validator;
use Auth;
use App\Exhibitor;
use App\Exhibition;

class SeriesEventsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
public function index()
	{
		//
		$seriesevents=SeriesEvent::all();
		return view('seriesevents.index',compact('seriesevents'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$exhibitions=Exhibition::all();
		$exhibitors=Exhibitor::all();
		return view('seriesevents.create',compact('exhibitions','exhibitors'));
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
        'name' => 'required|max:50|unique:seriesevents',
        'exhibitor_id' => 'required',
        'exhibition_id' => 'required',
      
       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$seriesevent = new SeriesEvent;
		    $seriesevent->name = Request::get('name');
		    $seriesevent->desc = Request::get('desc');
		    $seriesevent->exhibitor_id = Request::get('exhibitor_id');
		    $seriesevent->exhibition_id = Request::get('exhibition_id');
			$seriesevent->save();
			return redirect('seriesevents');
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
		$seriesevent=SeriesEvent::find($id);
		return view('seriesevents.show',compact('seriesevent'));
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
		$seriesevent=SeriesEvent::find($id);
		$exhibitions=Exhibition::all();
		$exhibitors=Exhibitor::all();
		return view('seriesevents.edit',compact('seriesevent','Exhibitors','exhibitions'));
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
        'exhibitor_id' => 'required',
        'exhibition_id' => 'required',     
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
            $id=Request::get('id');
			$seriesevent=SeriesEvent::find($id);
	        $seriesevent->name = Request::get('name');
		    $seriesevent->desc = Request::get('desc');
		    $seriesevent->exhibitor_id = Request::get('exhibitor_id');
		    $seriesevent->exhibition_id = Request::get('exhibition_id');
			$seriesevent->save();
			return redirect('seriesevents');
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
		$serieseventId = Request::get('id');
	    SeriesEvent::where('id',$serieseventId)->delete();
	    return redirect("seriesevents");
	}


}
