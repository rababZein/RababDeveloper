<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use Auth;
use App\User;
use App\Company;
use App\Booth;
use App\Type;
use App\Modeldesign;
use App\Exhibitor;
use App\ExhibitionEvent;
use App\Systemtrack;
use App\Spot;

use Session;

use App\File;
use App\BoothFile;

class BoothsController extends Controller {

	 
	public function __construct()
	{
		//check user login or not
		$this->middleware('auth');


	
	}


	/**
	 * Authorize admin
	 * @param  integer $user_id
	 * @return Response
	 */
	private function adminAuth()
	{		
		if (Auth::User()->type !="admin" && Auth::User()->type !="super admin"){
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
		$booths=Booth::all();
		return view('booths.index',compact('booths'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$exhibitors=Exhibitor::all();
		$exhibitionevents=ExhibitionEvent::all();
		$spots=Spot::all();
		$types=Type::all();
		$models=Modeldesign::all();
		return view('booths.create',compact('types','models','exhibitors','exhibitionevents','spots'));
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
        'name' => 'required|max:50|unique:halls',
        'type_id' => 'required',
        'modeldesign_id' => 'required',
        'exhibitor' => 'required',
        'exhibitionevent' => 'required', 
       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{

			$booth = new Booth;
		    $booth->name = Request::get('name');
		    $booth->desc = Request::get('desc');
		    $booth->type_id = Request::get('type_id');
		    $booth->modeldesign_id = Request::get('modeldesign_id');
		    $booth->exhibitor_id = Request::get('exhibitor');
		    $booth->exhibition_event_id = Request::get('exhibitionevent');
			$booth->spot_id=Request::get('spot_id');
			$booth->save();


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

            $boothfile= new BoothFile;
            $boothfile->booth_id=$booth->id;
            $boothfile->file_id=$file->id;
            $boothfile->save();


			return redirect('booths');
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
		$booth=Booth::find($id);

		$systemtrack=new Systemtrack;
        $systemtrack->user_id=Auth::User()->id;
        $systemtrack->spot_id=$booth->spot_id;
        $systemtrack->do=Auth::User()->name.' '.'visit'.' '.$booth->name.' Booth '.'at'.' '.date("Y-m-d H:i:s");
        $systemtrack->comein_at=date("Y-m-d H:i:s");
        $systemtrack->type='booth';
        $systemtrack->type_id=$id;
        $systemtrack->save();

        Session::put('booth_id', $id);
        Session::put('systemtrack_booth_id',$systemtrack->id);

		return view('booths.show',compact('booth'));
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
		if($this->adminAuth()){

			$booth=Booth::find($id);
			$types=Type::all();
			$models=Modeldesign::all();
			return view('booths.edit',compact('booth','types','models'));

		}else {
			
			if (Auth::User()->type=='company') {

			   $user=User::find(Auth::User()->id);
			   $company=Company::where('user_id',$user->id)->get();
			   $company=$company[0];	
			   $companyId = $company->id;
			   $booth=Booth::find($id);
			   $exhibitor=Exhibitor::where('company_id',$companyId)->where('id',$booth->exhibitor_id)->get();	
               if (!empty($exhibitor[0])) {
               		$types=Type::all();
					$models=Modeldesign::all();
					return view('booths.edit',compact('booth','types','models'));
               }else{

               		return view('errors.404');
               }



			}else{

				return view('errors.404');
			}
		}
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
        'type_id' => 'required',
        'modeldesign_id' => 'required', 
        'exhibitor' => 'required',
        'exhibitionevent' => 'required',    
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
            $id=Request::get('id');
			$booth=Booth::find($id);
			$booth->name = Request::get('name');
		    $booth->desc = Request::get('desc');
		    $booth->type_id = Request::get('type_id');
		    $booth->modeldesign_id = Request::get('modeldesign_id');
		    $booth->exhibitor_id = Request::get('exhibitor');
		    $booth->exhibitionevent_id = Request::get('exhibitionevent');
			$booth->save();
			return redirect('booths');
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
		$boothId = Request::get('id');
	    Booth::where('id',$boothId)->delete();
	    return redirect("booths");
	}


	public function bookBooth($id){

		if(!$this->adminAuth()&&!$this->checkCompanyType()){
				return view('errors.404');
		}

        $exhibitioneventId=$id;
        $checExEv=ExhibitionEvent::find($exhibitioneventId);
        if (date("Y-m-d H:i:s") > $checExEv->start_time ) {
        		return view('errors.404');
        }
		$exhibitors=Exhibitor::all();
		$exhibitionevents=ExhibitionEvent::all();
		$types=Type::all();
		$models=Modeldesign::all();
		$spots=Spot::all();
		return view('CompanyCP.booths.create',compact('types','models','exhibitors','exhibitionevents','exhibitioneventId','spots'));
	

	}

	public function boothsreport(){

		$exhibitionevents=ExhibitionEvent::all();
		$booths=Booth::all();
		$i=0;
		foreach ($booths as $booth) {
			$data=$booth->name;
		    //$allvisitors[$i]=Systemtrack::where('do','LIKE', "%$data%")->count();
		    $allvisitors[$i]=Systemtrack::where('type','booth')->where('type_id',$booth->id)->count();
		    $uniquevisit[$i]=Systemtrack::where('type','booth')->where('type_id',$booth->id)->distinct('user_id')->count('user_id');


			$i++;
		}
		return view('AdminCP.reports.booths.boothreport',compact('exhibitionevents','booths','allvisitors','uniquevisit'));


	}


	public function showboothAjax(){


	    //log out from last booth
		if (Session::has('booth_id')) {
		  
		   $boothId=Session::get('booth_id');
		   $systemtrackId=Session::get('systemtrack_booth_id');

		   $systemtrack = Systemtrack::find($systemtrackId);
		   $systemtrack->leave_at=date("Y-m-d H:i:s");
		   $systemtrack->save();
		   Session::forget('booth_id');
		  // Session::forget('systemtrack_id');


		}

		$boothId = Request::get('boothId');

		$booth=Booth::find($boothId);

		$systemtrack=new Systemtrack;
        $systemtrack->user_id=Auth::User()->id;
        $systemtrack->spot_id=$booth->spot_id;
        $systemtrack->do=Auth::User()->name.' '.'visit'.' '.$booth->name.' Booth '.'at'.' '.date("Y-m-d H:i:s");
        $systemtrack->comein_at=date("Y-m-d H:i:s");
        $systemtrack->type='booth';
        $systemtrack->type_id=$boothId;
        $systemtrack->save();

        Session::put('booth_id', $boothId);
        Session::put('systemtrack_booth_id',$systemtrack->id);

        // echo json_encode($booth);

         //echo "yarab far7a";

        $result = $booth;
		$result2 = $booth->exhibitor->name;

		echo json_encode(array("value" => $result, "value2" => $result2));


	}

	

}
