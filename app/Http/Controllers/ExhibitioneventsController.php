<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use Auth;
use App\Exhibition;
use App\ExhibitionEvent;
use App\Hall;
use App\ExhibitionEventHall;

class ExhibitioneventsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$exhibitionevents=ExhibitionEvent::all();
		return view('exhibitionevents.index',compact('exhibitionevents'));
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
		$halls = Hall::all();
		return view('exhibitionevents.create',compact('exhibitions','halls'));
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
        'hall_id' => 'required',
        'exhibition_id' => 'required',
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$exhibitionevent = new ExhibitionEvent;
		    $exhibitionevent->name = Request::get('name');
		    $exhibitionevent->desc = Request::get('desc');
		    $exhibitionevent->start_time = Request::get('start_time');
		    $exhibitionevent->end_time = Request::get('end_time');
		  //  $exhibitionevent->hall_id = Request::get('hall_id');
		    $exhibitionevent->exhibition_id = Request::get('exhibition_id');
			$exhibitionevent->save();

			$exhibitioneventhall=new ExhibitionEventHall;
			$exhibitioneventhall->exhibition_event_id=$exhibitionevent->id;
			$exhibitioneventhall->hall_id=Request::get('hall_id');
			$exhibitioneventhall->save();
			return redirect('exhibitionevents');
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
		$exhibitionevent=ExhibitionEvent::find($id);
		return view('exhibitionevents.show',compact('exhibitionevent'));
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
		$exhibitions=Exhibition::all();
		$halls=Hall::all();
		$exhibitionevent=ExhibitionEvent::find($id);
		return view('exhibitionevents.edit',compact('exhibitionevent','exhibitions','halls'));
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
        'hall_id' => 'required',
        'exhibition_id' => 'required',    
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
            $id=Request::get('id');
			$exhibitionevent = ExhibitionEvent::find($id);
		    $exhibitionevent->name = Request::get('name');
		    $exhibitionevent->desc = Request::get('desc');
		    $exhibitionevent->start_time = Request::get('start_time');
		    $exhibitionevent->end_time = Request::get('end_time');
		   // $exhibitionevent->hall_id = Request::get('hall_id');
		    $exhibitionevent->exhibition_id = Request::get('exhibition_id');
			$exhibitionevent->save();

			$exhibitioneventhall=ExhibitionEventHall::find($id); 
			$exhibitioneventhall->hall_id=Request::get('hall_id');
			$exhibitioneventhall->save();


			return redirect('exhibitionevents');
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
		$exhibitioneventId = Request::get('id');
	    ExhibitionEvent::where('id',$exhibitioneventId)->delete();
	    return redirect("exhibitionevents");
	}

}
