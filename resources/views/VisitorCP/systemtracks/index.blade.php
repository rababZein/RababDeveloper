@extends('layouts.dashboard')
@section('page_heading','Your History')

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
		@section ('cotable_panel_title','sections')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
				    <th> Come in at </th>
					<th>Do</th>
					
					<th> Duration </th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($systemtracks as $systemtrack)
				        <tr class="success" id="{{ $systemtrack->id }}">
				            <td class="text-center">{{ $systemtrack->comein_at}}</td>
				            <td class="text-center">{{ $systemtrack->do}}</td>
				            <td class="text-center"><?php 
                                $date1 = new DateTime(date("Y-m-d H:i:s"));
                                $date2 = new DateTime($systemtrack->comein_at);

                                // The diff-methods returns a new DateInterval-object...
                                $diff = $date2->diff($date1);

                                // Call the format method on the DateInterval-object
                                echo $diff->format('%d day %h hours %i mintues %s secounds');

                            ?></td>
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
