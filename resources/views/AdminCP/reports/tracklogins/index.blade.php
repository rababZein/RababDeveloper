
@extends('layouts.dashboard')

@section('page_heading','Your History')

@section('section')


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  

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

         <label class="col-md-4 control-label">Filter : </label>

         		 <label class="radio-inline">
                        From : <input type="date" name="from" id="optionsRadiosInline1"  onclick="search()" > 
                 </label>
                 <label class="radio-inline">
                        To : <input type="date" name="to" id="optionsRadiosInline1"  onclick="search()"> 
                 </label>
         <br/>        

         <span id='errorMsg' style="color:red" > From must be Less than To</span>        

         	
         </div>

		 <div class="form-group">
                    <label class="col-md-4 control-label"> </label>
                     <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline1" value="all" onclick="search()" checked="true"> All
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline1" value="regular" onclick="search()"> Visitors
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline2" value="company" onclick="search()">Companies
                    </label>
                     <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline2" value="admin" onclick="search()">Admins
                    </label>
                   
                   
               
         </div> 

      

         <div id="container">
         	

        


		
		<table class="table table-bordered">
			<thead>
				<tr>
					<th> User </th>
					<th>Login At</th>
					<th>Logout At</th>
					<th> Duration </th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($tracklogins as $tracklogin)
				        <tr  class="success" id="{{ $tracklogin->id }}">
				        	<td class="text-center">{{ $tracklogin->user->name }}</td>
				            <td class="text-center">{{ $tracklogin->login_at }}</td>
				            <td class="text-center">{{ $tracklogin->logout_at }}</td>
				            <td class="text-center"><?php
				            	$date1 = new DateTime($tracklogin->logout_at);
                                $date2 = new DateTime($tracklogin->login_at);

                                // The diff-methods returns a new DateInterval-object...
                                $diff = $date2->diff($date1);

                                // Call the format method on the DateInterval-object
                                echo $diff->format('%h hours %m mintues');
                               // var_dump($diff);

				            ?></td>
				        </tr>
		     		@endforeach
	
			</tbody>
		</table>	
	 </div>
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>
<script type="text/javascript">

   $('#errorMsg').hide();

   var from=$('input[name=from]').val();
   var to=$('input[name=to]').val();

   if (from != null && to != null ) {
	   if (from > to ) { $('#errorMsg').show();} 
	   else{ $('#errorMsg').hide(); }
   }else{
   		$('#errorMsg').hide();
   }
	
window.onload = function() {
    
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });

 };

function search(){
    var type=$('input[name=type]:checked').val();
    var from=$('input[name=from]').val();
    var to=$('input[name=to]').val();

	$.ajax({
    url: '/users/ajaxsearchForloginhistory',
    type: 'POST',
    data: {  
	   		 
            type: type,
            from: from,
            to:to
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

</script>
@stop
