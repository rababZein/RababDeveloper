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

class ExhibitorsController extends Controller {

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

		   

			
			return redirect('exhibitors');
	    }


	}


}
