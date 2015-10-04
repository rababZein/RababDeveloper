<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  

<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />



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
<!-- 				            <td class="text-center"><a title="Show booth Info" href="/booths/{{$booth->id}}" class="do">{{ $booth->name}}</a></td>
 -->				            
<!-- 				                <td class="text-center"><button  title="Show booth Info" class="do" onclick="showbooth('{{$booth->id}}');">{{ $booth->name}}</button></td>
 --><td class="text-center"><a  onclick="showbooth({{$booth->id}});" > {{ $booth->name}} </a></td>
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
<div class="col-lg-4" >
    
    @section ('pane1_panel_title', 'Show Booth')
    @section ('pane1_panel_body')
    	<div id="showbooth">
    		
    	</div>

    	<div id='expected_gain'></div>

    	<div id="house_price"></div>

  
    @endsection
    @include('widgets.panel', array('header'=>true, 'as'=>'pane1'))
</div>                     
      
<script type="text/javascript">

	window.onload = function() {
    
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });

    };


    function showbooth(boothId){

		showboothDiv = document.getElementById('showbooth');
		showboothDiv.innerHTML='';
		$.ajax({
	        url: '/booths/showboothAjax' ,
	        type: 'POST',
	        data: {  boothId:boothId
	             
	            },
	        success: function(response) {
	                  
	                    var obj = jQuery.parseJSON(response);
	                   //console.log(obj);
	                   

	                   	showboothDiv.innerHTML='Booth Name : '+obj.value.name+'<br/>'+'Booth Description : '+obj.value.desc+'<br/>'+'Exhibitor : '+obj.value2;
	                  },
	        error: function(jqXHR, textStatus, errorThrown) {
	            console.log(errorThrown);
	               }

        });
	}



</script>
@stop