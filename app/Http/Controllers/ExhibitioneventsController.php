<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use Auth;
use App\Exhibition;
use App\ExhibitionEvent;
use App\Hall;
use App\ExhibitionEventHall;
use App\Booth;
use App\Systemtrack;

use Session;

use App\File;
use App\ExhibitionEventFile;

class ExhibitioneventsController extends Controller {

	public function __construct()
	{
		//check user login or not
		$this->middleware('auth');
	
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$exhibitionevents=ExhibitionEvent::all();
		return view('exhibitionevents.index',compact('exhibitionevents'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$exhibitions=Exhibition::all();
		$halls = Hall::all();
		return view('exhibitionevents.create',compact('exhibitions','halls'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
					//echo "string"; exit();

		$v = Validator::make(Request::all(), [
        'name' => 'required|max:50|unique:modeldesigns',
        'hall_id' => 'required',
        'exhibition_id' => 'required',
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$exhibitionevent = new ExhibitionEvent;
		    $exhibitionevent->name = Request::get('name');
		    $exhibitionevent->desc = Request::get('desc');
		    $exhibitionevent->start_time = Request::get('start_time');
		    $exhibitionevent->end_time = Request::get('end_time');
		   // $exhibitionevent->hall_id = Request::get('hall_id');
		    $exhibitionevent->exhibition_id = Request::get('exhibition_id');
			$exhibitionevent->save();

			$exhibitioneventhall=new ExhibitionEventHall;
			$exhibitioneventhall->exhibition_event_id=$exhibitionevent->id;
			$exhibitioneventhall->hall_id=Request::get('hall_id');
			$exhibitioneventhall->save();

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

            $exhibitioneventfile= new ExhibitionEventFile;
            $exhibitioneventfile->exhibition_event_id=$exhibitionevent->id;
            $exhibitioneventfile->file_id=$file->id;
            $exhibitioneventfile->save();


			return redirect('exhibitionevents');
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

		$exhibitionevent=ExhibitionEvent::find($id);

		// $systemtrack=new Systemtrack;
  //       $systemtrack->user_id=Auth::User()->id;
  //     //  $systemtrack->spot_id=$booth->spot_id;
  //       $systemtrack->do=Auth::User()->name.' '.'visit'.' '.$exhibitionevent->name.' Event '.'at'.' '.date("Y-m-d H:i:s");
  //       $systemtrack->comein_at=date("Y-m-d H:i:s");

  //       $systemtrack->type='exhibitionevent';
  //       $systemtrack->type_id=$id;

  //       $systemtrack->save();


		return view('exhibitionevents.show',compact('exhibitionevent'));
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
		$exhibitions=Exhibition::all();
		$halls=Hall::all();
		$exhibitionevent=ExhibitionEvent::find($id);
		return view('exhibitionevents.edit',compact('exhibitionevent','exhibitions','halls'));
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
        'hall_id' => 'required',
        'exhibition_id' => 'required',    
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
            $id=Request::get('id');
			$exhibitionevent = ExhibitionEvent::find($id);
		    $exhibitionevent->name = Request::get('name');
		    $exhibitionevent->desc = Request::get('desc');
		    $exhibitionevent->start_time = Request::get('start_time');
		    $exhibitionevent->end_time = Request::get('end_time');
		   // $exhibitionevent->hall_id = Request::get('hall_id');
		    $exhibitionevent->exhibition_id = Request::get('exhibition_id');
			$exhibitionevent->save();

			$exhibitioneventhall=ExhibitionEventHall::find($id); 
			$exhibitioneventhall->hall_id=Request::get('hall_id');
			$exhibitioneventhall->save();


			return redirect('exhibitionevents');
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
		$exhibitioneventId = Request::get('id');
	    ExhibitionEvent::where('id',$exhibitioneventId)->delete();
	    return redirect("exhibitionevents");
	}

	public function listbooths($id){




		$booths=Booth::where('exhibition_event_id',$id)->get();

		$systemtrack=new Systemtrack;
        $systemtrack->user_id=Auth::User()->id;
      //  $systemtrack->spot_id=$booth->spot_id;
        $systemtrack->do=Auth::User()->name.' '.'visit'.' '.$booths[0]->exhibition_event->name.' Event '.'at'.' '.date("Y-m-d H:i:s");
        $systemtrack->comein_at=date("Y-m-d H:i:s");

        $systemtrack->type='exhibitionevent';
        $systemtrack->type_id=$id;

        $systemtrack->save();

        //save  exhibition event id  in session

        Session::put('event_id', $id);
        Session::put('systemtrack_event_id',$systemtrack->id);


		return view('VisitorCP.exhibitionevents.listbooths',compact('booths'));

	}

	
    public function eventsreport(){

    	$exhibitionevents=ExhibitionEvent::all();
    	$booths=array();
    	$i=0;
        foreach ($exhibitionevents as $exhibitionevent) {

			$booths[$i]=Booth::where('exhibition_event_id',$exhibitionevent->id)
							->count();
				
			$data=$exhibitionevent->name;
		   // $allvisitors[$i]=Systemtrack::where('do','LIKE', "%$data%")->count();
      		$allvisitors[$i]=Systemtrack::where('type','exhibitionevent')->where('type_id',$exhibitionevent->id)->count();
            $uniquevisit[$i]=Systemtrack::where('type','exhibitionevent')->where('type_id',$exhibitionevent->id)->distinct('user_id')->count('user_id');
			$i++;
		}

		//var_dump($uniquevisit); exit();
    	return view('AdminCP.reports.exhibitionevents.eventreport',compact('exhibitionevents','booths','allvisitors','uniquevisit'));

    }



}
