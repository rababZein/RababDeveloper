@extends('layouts.dashboard')
@section('page_heading','List all activities')

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
		@section ('cotable_panel_title','Activities')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Activity</th>
					<th>Description</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($activities as $activity)
				        <tr  class="success" id="{{ $activity->id }}">
				            <td class="text-center">{{ $activity->id}}</td>
				            <td class="text-center">{{ $activity->activity }}</td>
				            <td class="text-center">{{ $activity->desc }}</td>
				            <td class="text-center">
				            	<a title="Edit Interest" href="/activities/{{$activity->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px"></a></td>
							<td class="text-center">
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('activities.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $activity->id }}">
						          	<button type="submit" title="Delete Activity"  ><img src="/images/delete.png" width="30px" height="30px"></button>
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