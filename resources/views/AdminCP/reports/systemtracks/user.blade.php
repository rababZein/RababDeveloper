@extends('layouts.dashboard')
@section('page_heading','System History')



@section('section')
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.js"></script>

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
		@foreach($users as $user)
			<h1> {{$user->name}} is {{$user->type}}</h1>
			<table id="table_id" class="table table-bordered display">
				<thead>
					<tr>
					    <th> User </th>
					    <th> Do </th>
					    <th> Leave at </th>						
						<th> Duration </th>
					</tr>
				</thead>
				<tbody>
					

						@foreach ($systemtracks as $systemtrack)
							@if($systemtrack->user->id == $user->id)
						        <tr class="success" id="{{ $systemtrack->id }}">
						            <td class="text-center">{{ $systemtrack->user->name}}</td>
						            <td class="text-center">{{ $systemtrack->do}}</td>
						            <td class="text-center">{{ $systemtrack->leave_at}}</td>		            
						            <td class="text-center"><?php 
		                                $date1 = new DateTime($systemtrack->leave_at);
		                                $date2 = new DateTime($systemtrack->comein_at);

		                                // The diff-methods returns a new DateInterval-object...
		                                $diff = $date2->diff($date1);

		                                // Call the format method on the DateInterval-object
		                                echo $diff->format('%h hours %i mintues %s secounds');

		                            ?></td>
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
<script type="text/javascript">
	
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>