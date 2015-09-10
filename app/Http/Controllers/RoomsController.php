<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use Auth;
use App\Room;
use App\Spot;
use App\Event;

class RoomsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$rooms=Room::all();
		return view('rooms.index',compact('rooms'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$spots=Spot::all();
		$events=Event::all();
		return view('rooms.create',compact('spots','events'));
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
        'name' => 'required|max:50|unique:rooms',
        'spot_id' => 'required',
        'event_id' => 'required',
      
       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$room = new Room;
		    $room->name = Request::get('name');
		    $room->desc = Request::get('desc');
		    $room->spot_id = Request::get('spot_id');
		    $room->event_id = Request::get('event_id');
			$room->save();
			return redirect('rooms');
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
		$room=Room::find($id);
		return view('rooms.show',compact('room'));
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
		$room=Room::find($id);
		$spots=Spot::all();
		$events=Event::all();
		return view('rooms.edit',compact('room','spots','events'));
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
        'spot_id' => 'required',
        'event_id' => 'required',    
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
            $id=Request::get('id');
			$room =Room::find($id);
		    $room->name = Request::get('name');
		    $room->desc = Request::get('desc');
		    $room->spot_id = Request::get('spot_id');
		    $room->event_id = Request::get('event_id');
			$room->save();
			return redirect('rooms');
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
		$roomId = Request::get('id');
	    Room::where('id',$roomId)->delete();
	    return redirect("rooms");
	}

}
