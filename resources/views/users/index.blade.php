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
					<th>Name</th>
					<th>Type</th>
					<th>Edit</th>
					<th>Delete</th>
			
				</tr>
			</thead>
			<tbody>
				

					@foreach ($users as $user)
					   @if($user->type != 'company')
				        <tr  class="success" id="{{ $user->id }}">
				            <td class="text-center">{{ $user->id}}</td>
				            <td class="text-center">  <a title="Show Profile" href="/users/{{$user->id}}" class="do"> {{ $user->name }} </a></td>
				            <td class="text-center">{{ $user->type}}</td>
				            <td class="text-center">		                      
				            	<a title="Edit User" href="/users/{{$user->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px"></a></td>
							<td class="text-center">
							
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('users.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $user->id }}">
						          	<button type="submit" title="Delete User"  ><img src="/images/delete.png" width="30px" height="30px"></button>
        {{ Form::close() }}

				            </td>
				        </tr>
				        @endif
		     		@endforeach
	
			</tbody>
		</table>	
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>
@stop