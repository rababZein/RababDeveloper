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
					<th> Type </th>
					<th> Model </th>
					<th> Delete </th>
					<th> Edit </th>

				</tr>
			</thead>
			<tbody>
				

					@foreach ($booths as $booth)
				        <tr  class="success" id="{{ $booth->id }}">
				            <td class="text-center"><a title="Show booth Info" href="/booths/{{$booth->id}}" class="do">{{ $booth->name}}</a></td>
				            <td class="text-center">{{ $booth->desc }}</td>
							<td class="text-center"><a title="Show Type Info" href="/types/{{$booth->type->id}}" class="do">{{ $booth->type->name}}</a></td>
				            <td class="text-center"><a title="Show Model Info" href="/modeldesigns/{{$booth->modeldesign->id}}" class="do">{{ $booth->modeldesign->name}}</a></td>
				            <td class="text-center">
				            	<a title="Edit Booth Info" href="/booths/{{$booth->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px"></a></td>
							<td class="text-center">
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('booths.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $booth->id }}">
						          	<button type="submit" title="Delete Booth"  ><img src="/images/delete.png" width="30px" height="30px"></button>
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