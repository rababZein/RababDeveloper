<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use App\Professionalinfo;
use Auth;
use Session;
use App\Systemtrack;

class ProfessionalinfosController extends Controller {

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
	 * Authorize admin
	 * @param  integer $user_id
	 * @return Response
	 */
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
		return view('professionalinfos.create');
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
        'currentjob' => 'required|max:30',
        'title' => 'required',
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$pInfo = new Professionalinfo;

			$userId=Auth::user()->id;
	        $pInfo->user_id=$userId;

		    $pInfo->currentjob = Request::get('currentjob');
		    $pInfo->title = Request::get('title');
		    $pInfo->startwork_at = Request::get('startwork_at');
		    $pInfo->companywebsite = Request::get('companywebsite');
		    $pInfo->d_maker = Request::get('d_maker');
		    $pInfo->colleage = Request::get('colleage');
            $pInfo->degree = Request::get('degree');
			$pInfo->graduated_at = Request::get('graduated_at');
			$pInfo->fax = Request::get('fax');
			$pInfo->facebook = Request::get('facebook');
			$pInfo->twitter= Request::get('twitter');
			$pInfo->linkedIn = Request::get('linkedIn');
			$pInfo->ownwebsite = Request::get('ownwebsite');
			$pInfo->language = Request::get('language');
			$pInfo->level = Request::get('level');
			

		    $pInfo->save();
			
			return redirect('/');
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
		
		//authorization
		if (!$this->adminAuth() && !$this->userAuth(Auth::User()->id)){
			return view('errors.404');
		}
		$user=Professionalinfo::where('user_id',$id)->get();
		return view('professionalinfos.show',compact('user'));
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
		//authorization
		if (!$this->adminAuth() && !$this->userAuth(Auth::User()->id)){
			return view('errors.404');
		}
		$user=Professionalinfo::where('user_id',$id)->get();
		return view('professionalinfos.edit',compact('user'));

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
        'currentjob' => 'required|max:30',
        'title' => 'required',
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{


			$userId=Request::get('id');
	    	$pInfo=Professionalinfo::where('user_id',$userId)->get();

	    	$pInfoId=$pInfo[0]->id;


			$pInfo=Professionalinfo::find($pInfoId);

		    $pInfo->currentjob = Request::get('currentjob');

		    $pInfo->title = Request::get('title');
		    $pInfo->startwork_at = Request::get('startwork_at');
		    $pInfo->companywebsite = Request::get('companywebsite');
		    $pInfo->d_maker = Request::get('d_maker');
		    $pInfo->colleage = Request::get('colleage');
            $pInfo->degree = Request::get('degree');
			$pInfo->graduated_at = Request::get('graduated_at');
			$pInfo->fax = Request::get('fax');
			$pInfo->facebook = Request::get('facebook');
			$pInfo->twitter= Request::get('twitter');
			$pInfo->linkedIn = Request::get('linkedIn');
			$pInfo->ownwebsite = Request::get('ownwebsite');
			$pInfo->language = Request::get('language');
			$pInfo->level = Request::get('level');
			

		    $pInfo->save();
			
			return redirect('professionalinfos/'.$userId);
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
	}

}
