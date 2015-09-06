<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use Auth;
use App\Modeldesign;

class ModeldesignsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$models=Modeldesign::all();
		//var_dump($models); exit();
		return view('modeldesigns.index',compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('modeldesigns.create');
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
      
       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$model = new Modeldesign;
					//	echo "string"; exit();

		    $model->name = Request::get('name');
		    $model->desc = Request::get('desc');
			$model->save();
			return redirect('modeldesigns');
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
		$model=Modeldesign::find($id);
		return view('modeldesigns.edit',compact('model'));
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
            $id=Request::get('id');
			$model=Modeldesign::find($id);
			$model->name = Request::get('name');
		    $model->desc = Request::get('desc');
			$model->save();
			return redirect('modeldesigns');
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
		$modelId = Request::get('id');
	    Modeldesign::where('id',$modelId)->delete();
	    return redirect("modeldesigns");
	}


}
