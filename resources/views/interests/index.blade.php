@extends('layouts.dashboard')
@section('page_heading','Tables')

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
		@section ('cotable_panel_title','Coloured Table')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Interest In</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($interests as $interest)
				        <tr  class="success" id="{{ $interest->id }}">
				            <td class="text-center">{{ $interest->id}}</td>
				            <td class="text-center">{{ $interest->interest_in }}</td>
				            
				            <td class="text-center">
				            	<a title="Edit Interest" href="/interests/{{$interest->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px"></a></td>
							 <td class="text-center">
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('interests.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $interest->id }}">
						          	<button type="submit" title="Delete Interest"  ><img src="/images/delete.png" width="30px" height="30px"></button>
        {{ Form::close() }}
				            </td>
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