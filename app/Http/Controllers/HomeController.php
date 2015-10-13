<?php namespace App\Http\Controllers;

use App\ExhibitionEvent;
use App\Tracklogin;
use Auth;
use App\Systemtrack;
use App\User;
use App\Company;
use App\Exhibitor;
use App\Booth;
use Session;

use Illuminate\Routing\Route;

use DateTime;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;



class HomeController extends Controller {

protected $auth;
    
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
	 //check user login or not
	public function __construct()
	{


		//echo "yarab far7a"; 
       
		$this->middleware('auth');

		if (Session::has('booth_id')) {
		  
		   $boothId=Session::get('booth_id');
		   $systemtrackId=Session::get('systemtrack_booth_id');

		   $systemtrack = Systemtrack::find($systemtrackId);
		   $systemtrack->leave_at=date("Y-m-d H:i:s");
		   $systemtrack->save();
		   Session::forget('booth_id');
		  // Session::forget('systemtrack_id');


		}

		// Checking event_id key exist in session.

		if (Session::has('event_id')) {



		   $eventId=Session::get('event_id'); 

		  //  if (Session::has('booth_id')) {

				// $boothId=Session::get('booth_id');
				// $booth=Booth::find($boothId);

				// if ($booth->exhibition_event_id != $eventId) {

				// 	   $systemtrackId=Session::get('systemtrack_event_id');
				// 	   $systemtrack = Systemtrack::find($systemtrackId);
				// 	   $systemtrack->leave_at=date("Y-m-d H:i:s");
				// 	   $systemtrack->save();
				// 	   Session::forget('event_id');
				// }
			
		  //  }else{

		   		$systemtrackId=Session::get('systemtrack_event_id');
			    $systemtrack = Systemtrack::find($systemtrackId);
			    $systemtrack->leave_at=date("Y-m-d H:i:s");
			    $systemtrack->save();
			    Session::forget('event_id');


		 //  }
		   

		}




		
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Route $route)
	{

 //echo $route->getActionName();


	//	 exit();
		$upcomingexhibitionevents=ExhibitionEvent::where('start_time','>',date("Y-m-d H:i:s"))->take(4)->get();
		$currentlyexhibitionevents=ExhibitionEvent::where('start_time','<',date("Y-m-d H:i:s"))->where('end_time','>',date("Y-m-d H:i:s"))->take(4)->get();
		$tracklogins=Tracklogin::where('user_id','=',Auth::User()->id)->orderBy('created_at','desc')->take(2)->get();
		
		$systemtracks=Systemtrack::where('user_id','=',Auth::User()->id)->orderBy('created_at','desc')->take(5)->get();

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
            $upcomingcompanyevents=array();
            $currentlycompanyevents=array();
            $finishedcompanyevents=array();
            $i=0;
            foreach ($exhibitionevents as $exhibitionevent) {

            	if ($exhibitionevent->start_time > date("Y-m-d H:i:s")) {
            		 $upcomingcompanyevents[$i]=$exhibitionevent;
            		 $i++;
            	}elseif ($exhibitionevent->start_time < date("Y-m-d H:i:s") && $exhibitionevent->end_time > date("Y-m-d H:i:s") ) {
            		 $currentlycompanyevents[$i]=$exhibitionevent;
            		 $i++;
            	}else{
            		$finishedcompanyevents[$i]=$exhibitionevent;
            		$i++;

            	}

            }

	    }

		return view('home',compact('upcomingexhibitionevents','currentlyexhibitionevents','tracklogins','systemtracks','upcomingcompanyevents','currentlycompanyevents','finishedcompanyevents'));
	}

	public function outFromSystem(){

//ignore_user_abort(true);

// 		$date1 = new DateTime(Session::get('sessionstart'));
//         $date2 = new DateTime(date("Y-m-d H:i:s"));
//         $date3 = new DateTime(Session::get('timer'));
//         $diff1 = $date2->diff($date1); //login
//         $diff2 = $date2->diff($date3); //refresh
//    //     echo $diff->format('%h hours %i mintues %s secounds');

// 	   // echo $diff->i; 

// 		//if($diff1->i > 1 ){
//          ob_flush();
// if (connection_aborted()) {
// 				// Checking event_id key exist in session.
// 				if (Session::has('event_id')) {

// 				   $eventId=Session::get('event_id'); 
// 				   $systemtrackId=Session::get('systemtrack_event_id');
// 				   $systemtrack = Systemtrack::find($systemtrackId);
// 				   $systemtrack->leave_at=date("Y-m-d H:i:s");
// 				   $systemtrack->save();
// 				   Session::forget('event_id');
// 				 //  Session::forget('systemtrack_id');

// 				}

// 				if (Session::has('booth_id')) {
				  
// 				   $boothId=Session::get('booth_id');
// 				   $systemtrackId=Session::get('systemtrack_booth_id');

// 				   $systemtrack = Systemtrack::find($systemtrackId);
// 				   $systemtrack->leave_at=date("Y-m-d H:i:s");
// 				   $systemtrack->save();
// 				   Session::forget('booth_id');
// 				  // Session::forget('systemtrack_id');


// 				}
// 				$userId=Auth::user()->id;

// 				$now = new DateTime();

// 				$maxLogin=DB::table('tracklogins')
// 		                        ->where('user_id', $userId)
// 		          			    ->max('login_at');

// 			    DB::table('tracklogins')
// 			        ->where('user_id', $userId)
// 			        ->where('login_at', $maxLogin) 
// 			        ->update(['logout_at' => $now]);

			 
// 			   Auth::logout();


// }   

		   ignore_user_abort(true);


		        // inactive  

    $date1 = new DateTime(Session::get('sessiontimer'));
    $date2 = new DateTime(date("Y-m-d H:i:s"));

	$diff1 = $date2->diff($date1); //refresh

    if ($diff1->i  > 10) {

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
							
			   		$userId=Auth::user()->id;

					$now = new DateTime();

					$maxLogin=DB::table('tracklogins')
			                        ->where('user_id', $userId)
			          			    ->max('login_at');

				    DB::table('tracklogins')
				        ->where('user_id', $userId)
				        ->where('login_at', $maxLogin) 
				        ->update(['logout_at' => $now]);
						 
					Auth::logout();

    }else{

    	 for ($i = 0; $i < 5; $i++) {
		       flush();
	           ob_flush();
echo connection_status();
			   if (connection_aborted()) {


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
							
			   		$userId=Auth::user()->id;

					$now = new DateTime();

					$maxLogin=DB::table('tracklogins')
			                        ->where('user_id', $userId)
			          			    ->max('login_at');

				    DB::table('tracklogins')
				        ->where('user_id', $userId)
				        ->where('login_at', $maxLogin) 
				        ->update(['logout_at' => $now]);
						 
					Auth::logout();
	                       //exit;

			  }
			  sleep(1);
         }
    }      

	}

}
