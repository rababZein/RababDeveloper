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
					
					<th>Name</th>
					<th>Description</th>
					<th>Email</th>
					<th>List All Exhibitors of this company </th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($companies as $company)
				        <tr  class="success" id="{{ $company->id }}">
				            <td class="text-center"><a title="Show Company Info" href="/companies/{{$company->id}}" class="do">{{ $company->user->name}}</a></td>
				            <td class="text-center">{{ $company->desc }}</td>
				            <td class="text-center">{{ $company->user->email }}</td>
				            <td class="text-center"> 
				           			<a title="Show all exhhibitors for {{ $company->user->name }} " href="/companies/listallexhibitorsofCompany/{{$company->id}}" class="do"> Show all exhibitors for {{ $company->user->name }} </a>
				            <td class="text-center">
				            	<a title="Edit Company Info" href="/companies/{{$company->id}}/edit" class="do"><img src="/images/edit.png" width="30px" height="30px">	</a></td>
				            	<td class="text-center">
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('companies.destroy'))) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $company->id }}">
						          	<button type="submit" title="Delete company"  ><img src="/images/delete.png" width="30px" height="30px"></button>
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