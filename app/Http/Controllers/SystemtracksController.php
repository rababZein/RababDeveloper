<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Systemtrack;
use Session;
use App\Booth;
use App\ExhibitionEvent;
use Auth;

use DB;
use App\User;

class SystemtracksController extends Controller {

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



	private function adminAuth()
	{		
		if (Auth::User()->type !="admin"){
			return false;
		}
		return true;
	}

	/**
	 * Authorize user can view the page
	 * @param  integer $user_id
	 * @return Response
	 */
	private function userAuth($id)
	{		
		if (Auth::User()->id !=$id ){
			return false;
		}
		return true;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	}

	public function userhistory($id){

		if (!$this->userAuth($id)){
			return view('errors.404');
		}
	

		$systemtracks=Systemtrack::where('user_id',$id)->get();
		return view('VisitorCP.systemtracks.index',compact('systemtracks'));
	}


	public function alluserhistory(){

		if (!$this->adminAuth()){
			return view('errors.404');
		}
		$users=User::all();
		$systemtracks=Systemtrack::all();
		return view('AdminCP.reports.systemtracks.user',compact('systemtracks','users'));
	
		
	}


	public function exhibitionevent(){

		if (!$this->adminAuth()){
			return view('errors.404');
		}
		$users=User::all();
		$exhibitionevents=ExhibitionEvent::all();
		$systemtracks=Systemtrack::where('type','exhibitionevent')->get();
		//$i=0;
		//echo sizeof($systemtracks); exit();
		//for ($i=0; $i < sizeof($systemtracks); $i++) { 
			# code...
		
		// 	# code...
			$systemtrack_users = DB::table('systemtracks')
                                    ->join('users', 'users.id', '=', 'systemtracks.user_id')->get();

		
		//}
	//    var_dump($systemtrack_users); exit();
	    

	    return view('AdminCP.reports.systemtracks.exhibitionevent',compact('exhibitionevents','systemtracks','users','systemtrack_users'));

	}


	public function booth(){

		if (!$this->adminAuth()){
			return view('errors.404');
		}
		$users=User::all();
		$booths=Booth::all();
		$systemtracks=Systemtrack::where('type','booth')->get();
	    return view('AdminCP.reports.systemtracks.booth',compact('booths','systemtracks','users'));

	}

}
