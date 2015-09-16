<?php namespace App\Http\Controllers;

use App\ExhibitionEvent;
use App\Tracklogin;
use Auth;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$upcomingexhibitionevents=ExhibitionEvent::where('start_time','>',date("Y-m-d H:i:s"))->take(4)->get();
		$currentlyexhibitionevents=ExhibitionEvent::where('start_time','<',date("Y-m-d H:i:s"))->where('end_time','>',date("Y-m-d H:i:s"))->take(4)->get();
		$tracklogins=Tracklogin::where('user_id','=',Auth::User()->id)->orderBy('created_at','desc')->take(2)->get();
		return view('home',compact('upcomingexhibitionevents','currentlyexhibitionevents','tracklogins'));
	}

}
