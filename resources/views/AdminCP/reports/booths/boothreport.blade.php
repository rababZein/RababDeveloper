@extends('layouts.dashboard')
@section('page_heading','Report ')

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
		@section ('cotable_panel_title','Booths Report  ')
		@section ('cotable_panel_body')
		@foreach($exhibitionevents as $exhibitionevent)
		<h1>{{$exhibitionevent->name}}</h1>
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th>Booth  Name</th>
					<th> # of Visitors</th>
					

				</tr>
			</thead>
			<tbody>
				    <?php $i=0;?>
				   
					@foreach ($booths as $booth)
					 @if($exhibitionevent->id==$booth->exhibition_event->id)
				        <tr  class="success" id="{{ $booth->id }}">
				            <td class="text-center"><a title="Show booth Info" href="/booths/{{$booth->id}}" class="do">{{ $booth->name}}</a></td>
				            <td class="text-center">{{ $allvisitors[$i] }}</td>
				            
				        </tr>
				      @endif  
		     		@endforeach
	
			</tbody>
		</table>	
		@endforeach
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>
@stop