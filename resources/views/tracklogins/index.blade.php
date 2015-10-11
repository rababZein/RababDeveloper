@extends('layouts.dashboard')
@section('page_heading','History')

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
					<th>Login At</th>
					<th>Logout At</th>
					<th> Duration </th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($tracklogins as $tracklogin)
				        <tr  class="success" id="{{ $tracklogin->id }}">
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
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>
@stop
