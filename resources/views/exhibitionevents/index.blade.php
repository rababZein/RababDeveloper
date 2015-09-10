@extends('layouts.dashboard')
@section('page_heading','exhibitionevent !')

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
		@section ('cotable_panel_title','List all exhibitionevents ')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th>exhibitionevent  Name</th>
					<th>Description</th>
					<th> Exhibition Name</th>
					<th> Start Time </th>
					<th> End Time </th>
					<th> Delete </th>
					<th> Edit </th>

				</tr>
			</thead>
			<tbody>
				

					@foreach ($exhibitionevents as $exhibitionevent)
				        <tr  class="success" id="{{ $exhibitionevent->id }}">
				            <td class="text-center"><a title="Show exhibitionevent Info" href="/exhibitionevents/{{$exhibitionevent->id}}" class="do">{{ $exhibitionevent->name}}</a></td>
				            <td class="text-center">{{ $exhibitionevent->desc }}</td>
                           <td class="text-center"><a title="Show exhibitiont Info" href="/exhibitions/{{$exhibitionevent->exhibition->id}}" class="do">{{ $exhibitionevent->exhibition->name }}</a></td>
							<td class="text-center"><a title="Show Type Info" href="/types/{{$exhibitionevent->tstart_time}}" class="do">{{ $exhibitionevent->start_time}}</a></td>
				            <td class="text-center"><a title="Show Model Info" href="/modeldesigns/{{$exhibitionevent->end_time}}" class="do">{{ $exhibitionevent->end_time}}</a></td>
				            <td class="text-center">
				            	<a title="Edit exhibitionevent Info" href="/exhibitionevents/{{$exhibitionevent->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px"></a></td>
							<td class="text-center">
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('exhibitionevents.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $exhibitionevent->id }}">
						          	<button type="submit" title="Delete exhibitionevent"  ><img src="/images/delete.png" width="30px" height="30px"></button>
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