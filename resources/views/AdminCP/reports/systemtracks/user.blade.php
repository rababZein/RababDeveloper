@extends('layouts.dashboard')
@section('page_heading','System History')

@section('section')


<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />


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

		<div class="form-group">


         		 
                 <label class="radio-inline">
                       Email :  <input type="text" name="email" > 
                 </label>

<input type="text" onclick="s();" placeholder="subject...." id="searchticket" class="form-control" /> 

                 <input type="button" value="Report" onclick="search()" >
         <br/> 

         </div>  


		<div id="container">
			 <!-- <table class="table table-bordered">
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
						    
			     		@endforeach
		
				</tbody>
			</table> -->
		</div>	
	
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>





 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/black-tie/jquery-ui.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

<script type="text/javascript">

window.onload = function() {
    
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });


       
 };
	
function search(){

		
    var email=$('input[name=email]').val();
    
alert(email);
	$.ajax({
    url: '/systemtracks/ajaxSearchForUserHistory',
    type: 'POST',
    data: {  	   		 
            email: email          
	   	    },
    success: function(result) {
    			var container = document.getElementById('container');
    			  container.innerHTML = "";
    			  container.innerHTML = result;
                //convert refreshing pagination to ajax
               // paginateWithAjax();


			  },
	error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
           }

	});
	}


function s(){

$( "#searchticket" ).autocomplete( {

	source: [ "c++", "java", "php", "coldfusion", "javascript", "asp", "ruby" ]

} );

}


</script>
@stop









