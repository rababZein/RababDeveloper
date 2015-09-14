<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use App\Company;
use Auth;
use Mail;
use App\User;
use App\Country;
use App\Exhibitor;

class CompaniesController extends Controller {

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
		$companies=Company::all();
		return view('companies.index',compact('companies'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$countries=Country::all();
		return view('companies.create',compact('countries'));
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
        // 'name' => 'required|max:50',

        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$company = new Company;

			$userId=Auth::user()->id;
	        $company->user_id=$userId;

		    $company->country_id = Request::get('country');

		    $company->city = Request::get('city');
		    $company->logo = Request::get('company');
		    $company->address = Request::get('address');
		    $company->desc = Request::get('desc');
		    $company->phone = Request::get('phone');
		    $company->anotherphone = Request::get('anotherphone');

		    $company->fax = Request::get('fax');
			$company->facebook = Request::get('facebook');
			$company->twitter= Request::get('twitter');
			$company->linkedIn = Request::get('linkedIn');
			$company->website = Request::get('website');
		    
		    $company->save();

		   

			
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
		//
		$company=Company::find($id);
		return view('companies.show',compact('company'));
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
		if (!$this->adminAuth() && !$this->companyAuth(Auth::User()->id)){
			return view('errors.404');
		}
	    $countries=Country::all();
		$company=Company::find($id);
		return view('companies.edit',compact('company','countries'));
		
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
      //  'name' => 'required|max:50',

        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
            $companyId=Request::get('id');
			$company=Company::find($companyId);

			$company->country_id = Request::get('country');

		    $company->city = Request::get('city');
		    $company->logo = Request::get('company');
		    $company->address = Request::get('address');
		    $company->desc = Request::get('desc');
		    $company->phone = Request::get('phone');
		    $company->anotherphone = Request::get('anotherphone');

		    $company->fax = Request::get('fax');
			$company->facebook = Request::get('facebook');
			$company->twitter= Request::get('twitter');
			$company->linkedIn = Request::get('linkedIn');
			$company->website = Request::get('website');
		    
		    $company->save();

		

			
			return redirect('companies/'.$companyId);
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
		$companyId = Request::get('id');
		$company=Company::find($companyId);
		$userId=$company->user->id;
	    User::where('id',$userId)->delete();
	    return redirect("companies");
	}



	public function listallexhibitorsofCompany($id){
       $companyId = $id;       
       //echo $companyId; exit();
       $exhibitors=Exhibitor::where('company_id',$companyId)->get();
       //var_dump($exhibitors); exit();
       return view('companies.listallexhibitorsofCompany',compact('exhibitors'));

	}

	public function createcompanybyadmin(){

		$countries=Country::all();
		return view('AdminCP.companies.create',compact('countries'));

	}

	public function storecompanybyadmin(){


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
		    $user->type = 'companyuuuuuu';
		    $user->password =  bcrypt(Request::get('password'));
			$user->save();

			$company = new Company;

			//$userId=Auth::user()->id;
	        $company->user_id=$user->id;

		    $company->country_id = Request::get('country');

		    $company->city = Request::get('city');
		    $company->logo = Request::get('company');
		    $company->address = Request::get('address');
		    $company->desc = Request::get('desc');
		    $company->phone = Request::get('phone');
		    $company->anotherphone = Request::get('anotherphone');

		    $company->fax = Request::get('fax');
			$company->facebook = Request::get('facebook');
			$company->twitter= Request::get('twitter');
			$company->linkedIn = Request::get('linkedIn');
			$company->website = Request::get('website');
		    
		    $company->save();

		   
		// Mail::send('emails.welcome', $data, function($message) use ($data)
  //           {
  //               $message->from('yoyo80884@gmail.com', "Wavexpo");
  //               $message->subject("Welcome to Wavexpo Please visit our website to continu you information");
  //               $message->to($data['email']);
  //           });

			
			return redirect('companies');

		}
	}

}
