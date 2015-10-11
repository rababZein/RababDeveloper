@extends('layouts.dashboard')
@section('page_heading','System History')

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
		<!-- @foreach($exhibitionevents as $exhibitionevent)
			<h1> {{$exhibitionevent->name}} </h1>
			<table class="table table-bordered">
				<thead>
					<tr>
					    <th> User </th>
					    <th> Comein at </th>
					    <th> Leave at </th>						
						<th> Duration </th>
					</tr>
				</thead>
				<tbody>
					

						@foreach ($systemtracks as $systemtrack)
							@if($systemtrack->type_id == $exhibitionevent->id)
						        <tr class="success" id="{{ $systemtrack->id }}">
						            <td class="text-center">{{ $systemtrack->user->name}}</td>
						            <td class="text-center">{{ $systemtrack->comein_at}}</td>
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
 -->

<div class="form-group has-success">
              <label> Exhibition Event </label>
              <select id="drop" class="form-control col-md-6" name="country">
              		<option value="0" >Please Select Exhibition Event</option>                  
              	@foreach($exhibitionevents as $exhibitionevent)
                    <option value="{{ $exhibitionevent->id }}" > {{$exhibitionevent->name}}</option>                  
                @endforeach
            
            </select>
</div>
<table id="booths" class="table table-bordered">
				<thead>
					<tr>
					    <th> User </th>
					    <th> Comein at </th>
					    <th> Leave at </th>						
						<!-- <th> Duration </th> -->
					</tr>
				</thead>
				<tbody>

				</tbody>
</table>
<?php $systemtracks ;?>
<?php $systemtrack_users ;?>
<?php $users ;?>
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>

<script type="text/javascript">
	
	var systemtracks= <?php echo json_encode($systemtracks ); ?>;
	var systemtrack_users= <?php echo json_encode($systemtrack_users); ?>;
	//console.log(systemtrack_users[0]);
	$(document).ready(function(){


		 $("#drop").change(function () {

	           jQuery("#booths tbody").empty();
	      
	           for (var i=0; i < systemtrack_users.length; i++) {
	           	 // console.log(systemtracks[i]);
		           	if (systemtrack_users[i].type_id==this.value) {
		           	
				            $("#booths").find('tbody')
						    .append($('<tr>')
						        .append($('<td>')
						          .text(systemtrack_users[i].name)
						            
						        ).append($('<td>')
						            
						          .text(systemtrack_users[i].comein_at)
						            
						        ).append($('<td>')
						            
						          .text(systemtrack_users[i].leave_at)
						            
						        )
						    );  
		           	}


	           }
            

         });
	});



</script>
@stop
