

@extends('layouts.dashboard')


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
		
	<!-- 	@foreach($booths as $booth)
			<h1> {{$booth->name}}</h1>
			<table class="table table-bordered">
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
							@if($systemtrack->type_id == $booth->id)
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
		@endforeach	 -->


<!-- select exhibition event -->	
<div class="form-group has-success">
              <label> Exhibition Event </label>
              <select id="event" class="form-control col-md-6" name="event">
              		<option value="0" >Please Select Exhibition Event</option>                  
              	@foreach($exhibitionevents as $exhibitionevent)
                    <option value="{{ $exhibitionevent->id }}" > {{$exhibitionevent->name}}</option>                  
                @endforeach
            
              </select>
</div>	

<br/>
<div id="booth" class="form-group has-success"></div>

<table    id="booths" class="table table-bordered display">
				<thead>
					<tr>
					    <th> User </th>
					    <th> Do </th>
					    <th> Comein at </th>
					    <th> Leave at </th>						
						<!-- <th> Duration </th> -->
					</tr>
				</thead>
				<tbody>

				</tbody>
</table>

	</div>
</div>
</div>

<?php $booths; ?>
<?php $systemtrack_users ;?>


<script type="text/javascript">

var booths= <?php echo json_encode($booths ); ?>;
var systemtrack_users= <?php echo json_encode($systemtrack_users); ?>;
	
$(document).ready(function(){


		 $("#event").change(function () {

		 	//alert(this.value);
		 	$("#booth").empty();
		 	var div = document.getElementById('booth');
		 	var sel = document.createElement('select');
			var newlabel = document.createElement("Label");
			newlabel.innerHTML = "Booth";
			div.appendChild(newlabel);

		 	sel.className='form-control col-md-6';
		 	sel.name='selectbooth';
		 	sel.id='selectbooth';
			var opt = null;
			opt = document.createElement('option');
			opt.value = 0;
		    opt.innerHTML = 'Select Booth';
		    sel.appendChild(opt);
			for(i = 0; i<booths.length; i++) { 

			    opt = document.createElement('option');

			    if(booths[i].exhibition_event_id == this.value){
				    opt.value = booths[i].id;
				    opt.innerHTML = booths[i].name;
				    sel.appendChild(opt);
			    }
			}

			sel.onchange=function(){
					for (var i=0; i < systemtrack_users.length; i++) {
		           	if (systemtrack_users[i].type_id==this.value) {
		           	
				            $("#booths").find('tbody')
						    .append($('<tr>')
						        .append($('<td>')
						          .text(systemtrack_users[i].name)
						            
						        ).append($('<td>')
						            
						          .text(systemtrack_users[i].do)
						            
						        ).append($('<td>')
						            
						          .text(systemtrack_users[i].comein_at)
						            
						        ).append($('<td>')
						            
						          .text(systemtrack_users[i].leave_at)
						            
						        )
						    );  
		           	}


	           }

			};

			div.appendChild(sel);

		 });

		
});		 	

</script>
@stop
