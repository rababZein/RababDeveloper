@extends('layouts.dashboard')
@section('page_heading','Booth !')

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
		@section ('cotable_panel_title','List all Booths ')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th>Booth  Name</th>
					<th>Description</th>
					

				</tr>
			</thead>
			<tbody>
				

					@foreach ($booths as $booth)
				        <tr  class="success" id="{{ $booth->id }}">
				            <td class="text-center"><a title="Show booth Info" href="/booths/{{$booth->id}}" class="do">{{ $booth->name}}</a></td>
				            <td class="text-center">{{ $booth->desc }}</td>
							
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