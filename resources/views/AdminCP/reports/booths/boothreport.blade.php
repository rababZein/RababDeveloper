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
	<!-- 	@foreach($exhibitionevents as $exhibitionevent)
		<h1>{{$exhibitionevent->name}}</h1>
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th>Booth  Name</th>
					<th> # of Recurrency Visitors</th>
					<th> # of Unique Visitors </th>

				</tr>
			</thead>
			<tbody>
				    <?php $i=0;?>
				   
					@foreach ($booths as $booth)
					 @if($exhibitionevent->id==$booth->exhibition_event->id)
				        <tr  class="success" id="{{ $booth->id }}">
				            <td class="text-center"><a title="Show booth Info" href="/booths/{{$booth->id}}" class="do">{{ $booth->name}}</a></td>
				            <td class="text-center">{{ $allvisitors[$i] }}</td>
				            <td class="text-center">{{ $uniquevisit[$i] }}</td>

				        </tr>
				      @endif 
				    <?php $i++;?>   
		     		@endforeach
	
			</tbody>
		</table>	
		@endforeach -->

		<div class="form-group has-success">
              <label> Exhibition Event </label>
              <select id="drop" class="form-control col-md-6" name="country">
              		<option value="0" >Please Select Exhibition Event</option>                  
              	@foreach($exhibitionevents as $exhibitionevent)
                    <option value="{{ $exhibitionevent->id }}" > {{$exhibitionevent->name}}</option>                  
                @endforeach
            
            </select>
        </div>


        <table id='booths' class="table table-bordered">
        	<thead>
				<tr>
					
					<th>Booth  Name</th>
					<th> # of Recurrency Visitors</th>
					<th> # of Unique Visitors </th>

				</tr>
			</thead>
			<tbody id="bodyOfTable">

			</tbody>
        </table>
<?php $allvisitors ;?>
<?php $uniquevisit ;?>
<?php $booths ;?>	
		
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>
<script type="text/javascript">
    var recurrencyvisits= <?php echo json_encode($allvisitors ); ?>;
    var uniquevisits= <?php echo json_encode($uniquevisit ); ?>;
    var booths= <?php echo json_encode($booths ); ?>;
	$(document).ready(function(){


		 $("#drop").change(function () {

	           jQuery("#booths tbody").empty();
	        
	           for (var i=0; i < booths.length; i++) {
	           	
		           	if (booths[i].exhibition_event_id==this.value) {
		           	
				            $("#booths").find('tbody')
						    .append($('<tr>')
						        .append($('<td>')
						            .append($('<a>')
						            	.attr('href', '/booths/'+booths[i].id)
						            	.attr('title','Show booth Info')
						                .text(booths[i].name)
						            )
						        ).append($('<td>')
						            
						                .text(recurrencyvisits[i])
						            
						        ).append($('<td>')
						            
						                .text(uniquevisits[i])
						            
						        )
						    );  
		           	}


	           }
            

         });
	});
</script>
@stop