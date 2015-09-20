<?php namespace App\Http\Controllers;

use App\ExhibitionEvent;
use App\Tracklogin;
use Auth;
use App\Systemtrack;
use App\User;
use App\Company;
use App\Exhibitor;
use App\Booth;

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
		
		$systemtracks=Systemtrack::where('user_id',Auth::User()->id)->get();

		if(Auth::User()->type=='company'){
			$user=User::find(Auth::User()->id);
		    $company=Company::where('user_id',$user->id)->get();
		    $company=$company[0];
		    $companyId = $company->id;       
            $exhibitors=Exhibitor::where('company_id',$companyId)->get();
            //$booths=array();
            $events=array();
            $i=0;
            foreach ($exhibitors as $exhibitor) {

            	$booths=Booth::where('exhibitor_id',$exhibitor->id)->get();
            	foreach ($booths as $booth) {
            		$events[$i]=$booth->exhibition_event_id;
            		$i++;
            	}
            }
            $events = array_unique($events);
            //var_dump($events); exit();
            $i=0;
            $exhibitionevents=array();
            foreach ($events as $event) {
            	$exhibitionevents[$i]=ExhibitionEvent::find($event);
            	$i++;
            }

           // var_dump($exhibitionevents[0]); exit();
	    }

		return view('home',compact('upcomingexhibitionevents','currentlyexhibitionevents','tracklogins','systemtracks','exhibitionevents'));
	}

}
