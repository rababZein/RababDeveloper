@extends('layouts.dashboard')
@section('page_heading','Room !')

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
		@section ('cotable_panel_title','List all Rooms ')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th>Room  Name</th>
					<th>Description</th>
					<th> Event </th>
					<th> Spot </th>
					<th> Edit </th>
					<th> Delete </th>

				</tr>
			</thead>
			<tbody>
				

					@foreach ($rooms as $room)
				        <tr  class="success" id="{{ $room->id }}">
				            <td class="text-center"><a title="Show room Info" href="/rooms/{{$room->id}}" class="do">{{ $room->name}}</a></td>
				            <td class="text-center">{{ $room->desc }}</td>
							<td class="text-center"><a title="Show Type Info" href="/events/{{$room->event->id}}" class="do">{{ $room->event->name}}</a></td>
				            <td class="text-center"><a title="Show Model Info" href="/spots/{{$room->spot->id}}" class="do">{{ $room->spot->location}}</a></td>
				            <td class="text-center">
				            	<a title="Edit Room Info" href="/rooms/{{$room->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px"></a></td>
							<td class="text-center">
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('rooms.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $room->id }}">
						          	<button type="submit" title="Delete Room"  ><img src="/images/delete.png" width="30px" height="30px"></button>
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