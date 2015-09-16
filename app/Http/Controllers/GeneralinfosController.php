<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use App\Generalinfo;
use Auth;
use App\UserInterest;
use App\Interest;
use App\Country;

class GeneralinfosController extends Controller {

    //check user login or not
	public function __construct()
	{
		$this->middleware('auth');
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
	   $interests=Interest::all();
	   $countries=Country::all();
	   return view('generalinfos.create',compact('interests','countries'));

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
        'city' => 'required|max:30',
        'dob' => 'required',
        'phone' => 'required',

       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$gInfo = new Generalinfo;

			$userId=Auth::user()->id;
	        $gInfo->user_id=$userId;

		    $gInfo->country_id = Request::get('country');

		    $gInfo->city = Request::get('city');
		    $gInfo->dob = Request::get('dob');
		    $gInfo->image = Request::get('image');
		    $gInfo->address = Request::get('address');
		    $gInfo->phone = Request::get('phone');
		    $gInfo->anotherphone = Request::get('anotherphone');
		    $gInfo->skypename = Request::get('skypename');
		    $gInfo->howhearaboutus = Request::get('howhearaboutus');

		    $gInfo->save();

		    $userInterest = new UserInterest();
            $userInterest->user_id=$userId;
            $userInterest->interest_id=Request::get('interest');
            $userInterest->save();

			
			return redirect('professionalinfos/create');
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
		//authorization
		if (!$this->adminAuth() && !$this->userAuth($id)){
			return view('errors.404');
		}
		$user=Generalinfo::where('user_id',$id)->get();
		//var_dump($user[0]); exit();
		return view('generalinfos.show',compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//authorization
		if (!$this->adminAuth() && !$this->userAuth(Auth::User()->id)){
			return view('errors.404');
		}
		$interests=Interest::all();
	    $countries=Country::all();
		$user=Generalinfo::where('user_id',$id)->get();
		$userinterest=UserInterest::where('user_id',$id)->get();
		return view('generalinfos.edit',compact('user','interests','countries','userinterest'));
		
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
        'city' => 'required|max:30',
        'dob' => 'required',
        'phone' => 'required',
       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
            $userId=Request::get('id');
	    	$gInfo=Generalinfo::where('user_id',$userId)->get();

	    	$gInfoId=$gInfo[0]->id;


			
			$gInfo=Generalinfo::find($gInfoId);

		

		    $gInfo->country_id = Request::get('country');

		    $gInfo->city = Request::get('city');
		    $gInfo->dob = Request::get('dob');
		    $gInfo->image = Request::get('image');
		    $gInfo->address = Request::get('address');
		    $gInfo->phone = Request::get('phone');
		    $gInfo->anotherphone = Request::get('anotherphone');
		    $gInfo->skypename = Request::get('skypename');
		    $gInfo->howhearaboutus = Request::get('howhearaboutus');

		    $gInfo->save();
            
            $interestId=Request::get('interest');
		    // UserInterest::where('user_id',$userId)->update['interest_id'=>$interestId];
		 

		   UserInterest::where('user_id', $userId)
          ->update(['interest_id' => $interestId]);
            

			
			return redirect('generalinfos/'.$userId);
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
