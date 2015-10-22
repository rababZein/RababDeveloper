<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use Auth;
use App\User;
use App\Country;
use App\Company;
use App\Exhibitor;
use Session;
use App\Systemtrack;

use App\File;
use App\ExhibitorFile;


class ExhibitorsController extends Controller {

	
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
		if (Auth::User()->type !="admin" && Auth::User()->type !="super admin" ){
			return false;
		}
		return true;
	}

	private function checkCompanyType()
	{		
		if (Auth::User()->type !="company"){
			return false;
		}
		return true;
	}

	/**
	 * Authorize user can view the page
	 * @param  integer $user_id
	 * @return Response
	 */
	private function companyAuth($id)
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
		$exhibitors=Exhibitor::all();
		return view('exhibitors.index',compact('exhibitors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		if(!$this->adminAuth()&&!$this->checkCompanyType()){
				return view('errors.404');
		}
		$countries=Country::all();
		return view('exhibitors.create',compact('countries'));
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
        'name' => 'required|max:50',

        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$exhibitor = new Exhibitor;

			$userId=Auth::user()->id;
			$company=Company::where('user_id',$userId)->get();
			$companyId=$company[0]->id;
	        $exhibitor->company_id=$companyId;

		    $exhibitor->country_id = Request::get('country');

		    $exhibitor->city = Request::get('city');
		    $exhibitor->address = Request::get('address');
		    $exhibitor->name = Request::get('name');
		    $exhibitor->desc = Request::get('desc');
		    $exhibitor->phone = Request::get('phone');
		    $exhibitor->anotherphone = Request::get('anotherphone');

		    $exhibitor->fax = Request::get('fax');
			
		    
		    $exhibitor->save();

		   

			
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
		
		$exhibitor=Exhibitor::find($id);
		return view('exhibitors.show',compact('exhibitor'));
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
		
	    $countries=Country::all();
		$exhibitor=Exhibitor::find($id);
		//authorization
		if (!$this->adminAuth() && !$this->companyAuth($exhibitor->company->user->id)){
			return view('errors.404');
		}
		return view('exhibitors.edit',compact('exhibitor','countries'));
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
            $exhibitorId=Request::get('id');



			
			$exhibitor=Exhibitor::find($exhibitorId);

			$exhibitor->country_id = Request::get('country');

		    $exhibitor->city = Request::get('city');
		    $exhibitor->address = Request::get('address');
		    $exhibitor->desc = Request::get('desc');
		    $exhibitor->phone = Request::get('phone');
		    $exhibitor->anotherphone = Request::get('anotherphone');

		    $exhibitor->fax = Request::get('fax');
		
		    $exhibitor->save();

		

			
			return redirect('exhibitors/'.$exhibitorId);
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
		$exhibitorId = Request::get('id');
	    Exhibitor::where('id',$exhibitorId)->delete();
	    return redirect("exhibitors");
	}


	public function createexhibitorbyadmin(){

		$countries=Country::all();
		$companies=Company::all();
		return view('AdminCP.exhibitors.create',compact('countries','companies'));

	}

	public function storeexhibitorbyadmin(){

		$v = Validator::make(Request::all(), [
        'name' => 'required|max:50',
        'company'=>'required',
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$exhibitor = new Exhibitor;

	        $exhibitor->company_id=Request::get('company');

		    $exhibitor->country_id = Request::get('country');

		    $exhibitor->city = Request::get('city');
		    $exhibitor->address = Request::get('address');
		    $exhibitor->name = Request::get('name');
		    $exhibitor->desc = Request::get('desc');
		    $exhibitor->phone = Request::get('phone');
		    $exhibitor->anotherphone = Request::get('anotherphone');

		    $exhibitor->fax = Request::get('fax');
			
		    
		    $exhibitor->save();

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

            $exhibitorfile= new ExhibitorFile;
            $exhibitorfile->exhibitor_id=$exhibitor->id;
            $exhibitorfile->file_id=$file->id;
            $exhibitorfile->save();

            // Admin
            if($this->adminAuth()){
				return redirect('exhibitors');
		    }


		    //Company
		    $user=User::find(Auth::User()->id);
	   		$company=Company::where('user_id',$user->id)->get();
	  		$company=$company[0];	

	   		$companyId = $company->id;       
       		$exhibitors=Exhibitor::where('company_id',$companyId)->get();
       		return view('companies.listallexhibitorsofCompany',compact('exhibitors'));


			
			
	    }


	}


}
