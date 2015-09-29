<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use Auth;
use App\SeriesEvent;
use App\Event;
use Session;
use App\Systemtrack;

class EventsController extends Controller {

	
	 //check user login or not
	public function __construct()
	{
		$this->middleware('auth');


		// Checking event_id key exist in session.
		if (Session::has('event_id')) {

		   $eventId=Session::get('event_id'); 
		   $systemtrackId=Session::get('systemtrack_event_id');
		   $systemtrack = Systemtrack::find($systemtrackId);
		   $systemtrack->leave_at=date("Y-m-d H:i:s");
		   $systemtrack->save();
		   Session::forget('event_id');
		 //  Session::forget('systemtrack_id');

		}

		if (Session::has('booth_id')) {
		  
		   $boothId=Session::get('booth_id');
		   $systemtrackId=Session::get('systemtrack_booth_id');

		   $systemtrack = Systemtrack::find($systemtrackId);
		   $systemtrack->leave_at=date("Y-m-d H:i:s");
		   $systemtrack->save();
		   Session::forget('booth_id');
		  // Session::forget('systemtrack_id');


		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$events=Event::all();
		return view('events.index',compact('events'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$seriesevents = SeriesEvent::all();
		return view('events.create',compact('seriesevents'));
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
        'name' => 'required|max:50|unique:events',
        'type' => 'required',
        'seriesevent_id' => 'required',
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$event = new Event;
		    $event->name = Request::get('name');
		    $event->desc = Request::get('desc');
		    $event->type = Request::get('type');
		    $event->privacy = Request::get('privacy');
		    $event->series_event_id = Request::get('seriesevent_id');
			$event->save();
			return redirect('events');
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
		$event=Event::find($id);
		return view('events.show',compact('event'));
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
		$seriesevents = SeriesEvent::all();		
		$event=Event::find($id);
		return view('events.edit',compact('seriesevents','event'));
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
        'type' => 'required',
        'seriesevent_id' => 'required',   
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
            $id=Request::get('id');
			$event = Event::find($id);
		    $event->name = Request::get('name');
		    $event->desc = Request::get('desc');
		    $event->type = Request::get('type');
		    $event->privacy = Request::get('privacy');
		    $event->series_event_id = Request::get('seriesevent_id');
			$event->save();
			return redirect('events');
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
		$eventId = Request::get('id');
	    Event::where('id',$eventId)->delete();
	    return redirect("events");
	}

}
