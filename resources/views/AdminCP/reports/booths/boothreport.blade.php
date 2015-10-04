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
		     		@endforeach
	
			</tbody>
		</table>	
		@endforeach

		<div class="form-group has-success">
               <label> Exhibition Event </label>
              <select id="drop" class="form-control col-md-6" name="country">
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
      alert( this.value);
    //  alert(recurrencyvisits.length)
           var newRow = "<tr>";
           var newcolum='<td>';
           var endnewRow = "</tr>";
           var endnewcolum='</td>';
           for (var i=0; i < booths.length; i++) {
           	console.log(booths[i]);
           }
           jQuery("#booths tbody").append(newRowContent);
        
         });
	});
</script>
@stop