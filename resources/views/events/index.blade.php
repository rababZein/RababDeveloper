@extends('layouts.dashboard')
@section('page_heading','event !')

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
		@section ('cotable_panel_title','List all events ')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th>event  Name</th>
					<th>Description</th>
					<th> Series Event Name</th>
					<th> Type </th>
					<th> Privacy </th>
					<th> Edit </th>
					<th> Delete </th>

				</tr>
			</thead>
			<tbody>
				

					@foreach ($events as $event)
				        <tr  class="success" id="{{ $event->id }}">
				            <td class="text-center"><a title="Show event Info" href="/events/{{$event->id}}" class="do">{{ $event->name}}</a></td>
				            <td class="text-center">{{ $event->desc }}</td>
                            <td class="text-center"><a title="Show Series event Info" href="/seriesevents/{{$event->series_event->id}}" class="do">{{ $event->series_event->name }}</a></td>
				            <td class="text-center">{{ $event->type }}</td>
				            <td class="text-center">{{ $event->privacy }}</td>
				            <td class="text-center">
				            	<a title="Edit event Info" href="/events/{{$event->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px"></a></td>
							<td class="text-center">
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('events.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $event->id }}">
						          	<button type="submit" title="Delete event"  ><img src="/images/delete.png" width="30px" height="30px"></button>
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