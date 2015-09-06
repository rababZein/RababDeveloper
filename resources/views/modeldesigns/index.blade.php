@extends('layouts.dashboard')
@section('page_heading','List all Model Designs')

@section('section')
<div class="col-sm-12">
<div class="row">
	
</div>
<div class="row">

</div>
	
<div class="row">
	
</div>
<div class="row">
	<div class="col-sm-12">
		@section ('cotable_panel_title','Coloured Table')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($models as $model)
				        <tr  class="success" id="{{ $model->id }}">
				            <td class="text-center">{{ $model->name }}</td>
				            <td class="text-center">{{ $model->desc }}</td>
				            <td class="text-center">
				            	<a title="Edit model" href="/modeldesigns/{{$model->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px">	</a></td>
					        <td class="text-center">
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('modeldesigns.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $model->id }}">
						          	<button type="submit" title="Delete model"  ><img src="/images/delete.png" width="30px" height="30px"></button>
        {{ Form::close() }}
				            </td>
				        </tr>
		     		@endforeach
	
			</tbody>
		</table>	
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>
@stop