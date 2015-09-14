<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use Request;
use Validator;
use App\File;

class FilesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$files = File::all();
		return view('files.index',compact('files'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('files.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		// $v = Validator::make($request, [
        
  //       'type' => 'required',
       
  //       ]);
       
	    // if ($v->fails())
	    // {
	    //     return redirect()->back()->withErrors($v->errors())
	    //     						 ->withInput();
	    // }else{
	    	//check for uploaded file and store it n public path
		$file = new File;
		        $file->name=$request->get('name');
		        $file->desc=$request->get('desc');
		        $file->type=$request->get('type');
			if ($request->hasFile('file')) { 
				$destination='files/';
				$filename=str_random(6)."_".$request->file('file')->getClientOriginalName();
				$request->file('file')->move($destination,$filename);
				$file->file=$filename;
			}else{
				$file->file=$request->get('file');
			}
                 $file->save();

	   // }
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
