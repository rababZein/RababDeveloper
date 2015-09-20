@extends ('layouts.dashboard')

@section ('page_heading',$exhibitor->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit Exhibitor Info " href="/exhibitors/{{$exhibitor->id}}/edit" class="do"> Edit Exhibitor Info </a>

	@section ('alert1_panel_title','Basic Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitor->name, 'icon'=> 'user'))
	@if(!empty($exhibitor->country))
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitor->country->name, 'icon'=> 'user'))
	@endif
	@include('widgets.alert', array('class'=>'info', 'message'=> $exhibitor->city ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitor->desc, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'info', 'message'=> $exhibitor->address ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $exhibitor->phone,'icon'=> 'glyphicon glyphicon-cog'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitor->anotherphone, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $exhibitor->fax,'icon'=> 'glyphicon glyphicon-cog'))

	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
