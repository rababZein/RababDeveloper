@extends('layouts.dashboard')
@section('page_heading','Tables')

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
					<th>ID</th>
					<th>Location</th>
					<th>Descriptiion</th>
					<th> Edit </th>
					<th> Delete </th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($spots as $spot)
				        <tr  class="success" id="{{ $spot->id }}">
				            <td class="text-center">{{ $spot->id}}</td>
				            <td class="text-center">{{ $spot->location }}</td>
				            <td class="text-center">{{ $spot->desc }}</td>
				            <td class="text-center">
				            	<a title="Edit Asset" href="/spots/{{$spot->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px"></a></td>
							 <td class="text-center">
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('spots.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $spot->id }}">
						          	<button type="submit" title="Delete Spot"  ><img src="/images/delete.png" width="30px" height="30px"></button>
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