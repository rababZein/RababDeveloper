@extends('layouts.dashboard')
@section('page_heading','Seriesevent !')

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
		@section ('cotable_panel_title','List all Seriesevents ')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th>Series Event  Name</th>
					<th>Description</th>
					<th> Exhibition </th>
					<th> Exhibitor </th>
					<th> Edit </th>
					<th> Delete </th>

				</tr>
			</thead>
			<tbody>
				

					@foreach ($seriesevents as $seriesevent)
				        <tr  class="success" id="{{ $seriesevent->id }}">
				            <td class="text-center"><a title="Show seriesevent Info" href="/seriesevents/{{$seriesevent->id}}" class="do">{{ $seriesevent->name}}</a></td>
				            <td class="text-center">{{ $seriesevent->desc }}</td>
							<td class="text-center"><a title="Show Exhibition Info" href="/exhibitions/{{$seriesevent->exhibition->id}}" class="do">{{ $seriesevent->exhibition->name}}</a></td>
				            <td class="text-center"><a title="Show Exhibitor Info" href="/exhibitors/{{$seriesevent->exhibitor->id}}" class="do">{{ $seriesevent->exhibitor->name}}</a></td>
				            <td class="text-center">
				            	<a title="Edit seriesevent Info" href="/seriesevents/{{$seriesevent->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px"></a></td>
							<td class="text-center">
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('seriesevents.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $seriesevent->id }}">
						          	<button type="submit" title="Delete seriesevent"  ><img src="/images/delete.png" width="30px" height="30px"></button>
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