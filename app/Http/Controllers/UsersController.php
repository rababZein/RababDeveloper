<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use App\User;
use Auth;
use App\Generalinfo;
use App\Professionalinfo;
use Mail;
use App\Tracklogin;
use App\Systemtrack;
use App\File;
use App\UserFile;
use Session;
use DB;

class UsersController extends Controller {


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
		//authorization
		if (!$this->adminAuth()){
			return view('errors.authorization');
		}
		$users=User::all();
		return view('users.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		if (!$this->adminAuth()){
			return view('errors.authorization');
		}
		return view('users.create');

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
        'name' => 'required|max:255',
		'email' => 'required|email|max:255|unique:users',
		'password' => 'required|confirmed|min:6',
      
       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$user= new User;
			$user->name = Request::get('name');
		    $user->email = Request::get('email');
		    $user->type = Request::get('type');
		    $user->password =  bcrypt(Request::get('password'));
			$user->save();
			$gInfo = new Generalinfo;
			$gInfo->user_id=$user->id;
			$gInfo->save();
			$pInfo = new Professionalinfo;
	        $pInfo->user_id=$user->id;
	        $pInfo->save();

	        $data['email']=Request::get('email');
	        $data['name']=Request::get('name');

		// Mail::send('emails.welcome', $data, function($message) use ($data)
  //           {
  //               $message->from('yoyo80884@gmail.com', "Wavexpo");
  //               $message->subject("Welcome to Wavexpo Please visit our website to continu you information");
  //               $message->to($data['email']);
  //           });

//return redirect()->action('UserFilesController@store', [$user->id,]);

	        // File Storage 

	        $file = new File;
		    $file->name=Request::get('filename');
		    $file->desc=Request::get('desc');
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

            $userfile= new UserFile;
            $userfile->user_id=$user->id;
            $userfile->file_id=$file->id;
            $userfile->save();


			return redirect('users');
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
		if (!$this->adminAuth() && !$this->userAuth($id)){
			return view('errors.404');
		}
	    $user=User::find($id);
		return view('users.show',compact('user'));
	
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
		if (!$this->adminAuth() && !$this->userAuth($id)){
			return view('errors.404');
		}
		$user=User::find($id);
		return view('users.edit',compact('user'));
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
        'name' => 'required|max:255',
       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{

			$id=Request::get('id');
			$user=User::find($id);
			$user->name=Request::get('name');
			$user->save();
			return redirect('/');
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
		$userId = Request::get('id');
	    User::where('id',$userId)->delete();
	    return redirect("users");
	}

	public function listallregular(){

		if (!$this->adminAuth()){
			return view('errors.authorization');
		}
		$users=User::where('type','regular')->get();
		return view('users.index',compact('users'));
	}

	public function listalladmin(){

		if (!$this->adminAuth()){
			return view('errors.authorization');
		}
		$users=User::where('type','admin')->get();
		return view('users.index',compact('users'));
	}

	public function listallsuperadmin(){

		if (!$this->adminAuth()){
			return view('errors.authorization');
		}
		$users=User::where('type','superadmin')->get();
		return view('users.index',compact('users'));
	}

	public function loginhistory($id){
			//authorization
		if (!$this->userAuth($id)){
			return view('errors.404');
		}
		$tracklogins=Tracklogin::where('user_id','=',Auth::User()->id)->orderBy('created_at','desc')->get();
		return view('tracklogins.index',compact('tracklogins'));
	

	}

	public function loginhistoryforall(){
// 		
		if (!$this->adminAuth()){
			return view('errors.404');
		}
		$users=User::all();
		$tracklogins=Tracklogin::orderBy('created_at','desc')->get();
		return view('AdminCP.reports.tracklogins.index',compact('tracklogins','users'));
	
	}


	public function ajaxsearchForloginhistory(){

		$type=Request::get('type');
		$from=Request::get('from');
		$to=Request::get('to');
		if(! empty($from) && ! empty($to) ){


				if ($type=='all') {

					$tracklogins = DB::table('tracklogins')->orderBy('tracklogins.created_at','desc')
										->whereBetween('tracklogins.created_at', [$from, $to])
	                                    ->join('users', 'users.id', '=', 'tracklogins.user_id')->get();
	        

				}else{

					$tracklogins = DB::table('tracklogins')->orderBy('tracklogins.created_at','desc')
										 ->whereBetween('tracklogins.created_at', [$from, $to])
		                                 ->join('users', 'users.id', '=', 'tracklogins.user_id')->where('users.type',$type)->get();
		        
				}



		}elseif(! empty($from) && empty($to)){

			   if ($type=='all') {

					$tracklogins = DB::table('tracklogins')->orderBy('tracklogins.created_at','desc')
										->where('tracklogins.created_at', '>=',$from)
	                                    ->join('users', 'users.id', '=', 'tracklogins.user_id')->get();
	        

				}else{

					$tracklogins = DB::table('tracklogins')->orderBy('tracklogins.created_at','desc')
										 ->where('tracklogins.created_at', '>=',$from)
		                                 ->join('users', 'users.id', '=', 'tracklogins.user_id')->where('users.type',$type)->get();
		        
				}


		}elseif( empty($from) && !empty($to)){

			   if ($type=='all') {

					$tracklogins = DB::table('tracklogins')->orderBy('tracklogins.created_at','desc')
										->where('tracklogins.created_at', '<=',$to)
	                                    ->join('users', 'users.id', '=', 'tracklogins.user_id')->get();
	        

				}else{

					$tracklogins = DB::table('tracklogins')->orderBy('tracklogins.created_at','desc')
										 ->where('tracklogins.created_at', '<=',$to)
		                                 ->join('users', 'users.id', '=', 'tracklogins.user_id')->where('users.type',$type)->get();
		        
				}


		}elseif( empty($from) && empty($to)){

			   if ($type=='all') {

					$tracklogins = DB::table('tracklogins')->orderBy('tracklogins.created_at','desc')
	                                    ->join('users', 'users.id', '=', 'tracklogins.user_id')->get();
	        

				}else{

					$tracklogins = DB::table('tracklogins')->orderBy('tracklogins.created_at','desc')
		                                 ->join('users', 'users.id', '=', 'tracklogins.user_id')->where('users.type',$type)->get();
		        
				}


		}
		
		return view('AdminCP.reports.tracklogins.ajax',compact('tracklogins','users'));


	
	}






}
