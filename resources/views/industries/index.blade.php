@extends('layouts.dashboard')
@section('page_heading','List All Industry')

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
					<th>Industry Name</th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($industries as $industry)
				        <tr  class="success" id="{{ $industry->id }}">
				            <td class="text-center">{{ $industry->id}}</td>
				            <td class="text-center">{{ $industry->name }}</td>
				            
				            <td class="text-center">
				            	<a title="Edit Interest" href="/industries/{{$industry->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px">	</a>
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('industries.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $industry->id }}">
						          	<button type="submit" title="Delete Industry"  ><img src="/images/delete.png" width="30px" height="30px"></button>
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