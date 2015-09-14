@extends('layouts.dashboard')
@section('page_heading','List all Materials')

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
		@section ('cotable_panel_title','Material')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Size</th>
					<th>Price</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($types as $type)
				        <tr  class="success" id="{{ $type->id }}">
				            <td class="text-center">{{ $type->name }}</td>
				            <td class="text-center">{{ $type->desc }}</td>
				            <td class="text-center">{{ $type->size }}</td>
				            <td class="text-center">{{ $type->price }}</td>
				            <td class="text-center">
				            	<a title="Edit hall" href="/types/{{$type->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px">	</a></td>
							<td class="text-center">
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('types.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $type->id }}">
						          	<button type="submit" title="Delete Type"  ><img src="/images/delete.png" width="30px" height="30px"></button>
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