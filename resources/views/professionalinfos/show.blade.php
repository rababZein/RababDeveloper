@extends ('layouts.dashboard')

@section ('page_heading',$user[0]->user->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit Professional Info " href="/professionalinfos/{{$user[0]->user->id}}/edit" class="do">  Edit Professional Info </a>

	@section ('alert1_panel_title','Basic Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $user[0]->currentjob, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'info', 'message'=> $user[0]->title ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $user[0]->startwork_at,'icon'=> 'glyphicon glyphicon-cog'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $user[0]->companywebsite, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'info', 'message'=> $user[0]->d_maker ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $user[0]->colleage,'icon'=> 'glyphicon glyphicon-cog'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $user[0]->degree, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'info', 'message'=> $user[0]->graduated_at ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $user[0]->fax,'icon'=> 'glyphicon glyphicon-cog'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $user[0]->facebook, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'info', 'message'=> $user[0]->twitter ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $user[0]->linkedIn,'icon'=> 'glyphicon glyphicon-cog'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $user[0]->ownwebsite, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'info', 'message'=> $user[0]->language ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $user[0]->level,'icon'=> 'glyphicon glyphicon-cog'))
	@endsection

<a title="General Info " href="/generalinfos/{{$user[0]->user->id}}" class="do"> General Info </a>
<a title="Basic Info " href="/users/{{$user[0]->user->id}}" class="do"> Basic Info </a>

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
