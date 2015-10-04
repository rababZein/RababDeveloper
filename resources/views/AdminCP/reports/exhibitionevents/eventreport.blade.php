@extends('layouts.dashboard')
@section('page_heading','Report !')

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
		@section ('cotable_panel_title','Report of Events ')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
					
					
					<th> Exhibition Name</th>
					<th> # of Booths </th>
					<th> # of Recurrincy Visitors </th>
					<th> # of Unique Visitors </th>
					<th> Start Time </th>
					<th> End Time </th>
					

				</tr>
			</thead>
			<tbody>
				
					<?php $i=0;?>
					@foreach ($exhibitionevents as $exhibitionevent)
				        <tr  class="success" id="{{ $exhibitionevent->id }}">
				            <td class="text-center"><a title="Show exhibitionevent Info" href="/exhibitionevents/{{$exhibitionevent->id}}" class="do">{{ $exhibitionevent->name}}</a></td>
							<td class="text-center">{{ $booths[$i] }}</td>
							<td class="text-center">{{ $allvisitors[$i] }}</td>
							<td class="text-center">{{ $uniquevisit[$i] }}</td>
							<td class="text-center">{{ $exhibitionevent->start_time}}</td>
				            <td class="text-center">{{ $exhibitionevent->end_time}}</td>
				           
				        </tr>
				    <?php $i++;?>
		     		@endforeach
	
			</tbody>
		</table>	
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>
@stop