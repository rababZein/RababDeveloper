<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use Auth;
use App\Exhibition;
use Session;
use App\Systemtrack;
use App\File;
use App\ExhibitionFile;

class ExhibitionsController extends Controller {

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
        'name' => 'required|max:50|unique:exhibitors',
      
       
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



			 // File Storage 

	        $file = new File;
		    $file->name=Request::get('filename');
		    $file->desc=Request::get('filedesc');
		    $file->type=Request::get('filetype');
			if (Request::hasFile('file')) { 
				$destination='files/';
				$filename=str_random(6)."_".Request::file('file')->getClientOriginalName();
				Request::file('file')->move($destination,$filename);
				$file->file=$filename;
			}else{
				$file->file=Request::get('file');
			}
            $file->save();

            $userfile= new ExhibitionFile;
            $userfile->exhibition_id=$exhibition->id;
            $userfile->file_id=$file->id;
            $userfile->save();


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
