@extends('layouts.dashboard')
@section('page_heading','List all Hall')

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
				</tr>
			</thead>
			<tbody>
				

					@foreach ($halls as $hall)
				        <tr  class="success" id="{{ $hall->id }}">
				            <td class="text-center">{{ $hall->name }}</td>
				            <td class="text-center">{{ $hall->desc }}</td>
				            <td class="text-center">
				            	<a title="Edit hall" href="/halls/{{$hall->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px">	</a>
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('halls.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $hall->id }}">
						          	<button type="submit" title="Delete hall"  ><img src="/images/delete.png" width="30px" height="30px"></button>
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