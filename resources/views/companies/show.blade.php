

@extends ('layouts.dashboard')

@section ('page_heading',$company->user->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit Company Info " href="/companies/{{$company->id}}/edit" class="do"> Edit Company Info </a>
<a title="Show all exhhibitors for {{ $company->user->name }} " href="/companies/listallexhibitorsofCompany/{{$company->id}}" class="do"> Show all exhibitors for {{ $company->user->name }} </a>

	@section ('alert1_panel_title','Basic Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $company->user->name, 'icon'=> 'user'))
@if(!empty($company->country))
	@include('widgets.alert', array('class'=>'success', 'message'=>  $company->country->name, 'icon'=> 'user'))
@endif	
	@include('widgets.alert', array('class'=>'info', 'message'=> $company->city ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $company->logo,'icon'=> 'glyphicon glyphicon-cog'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $company->desc, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'info', 'message'=> $company->address ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $company->phone,'icon'=> 'glyphicon glyphicon-cog'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $company->anotherphone, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $company->fax,'icon'=> 'glyphicon glyphicon-cog'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $company->facebook, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'info', 'message'=> $company->twitter ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $company->linkedIn,'icon'=> 'glyphicon glyphicon-cog'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $company->website, 'icon'=> 'user'))
	

	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
