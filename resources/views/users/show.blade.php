@extends ('layouts.dashboard')

@section ('page_heading',$user->name.'Profile' )

@section('section')
</div>
<a title="Edit Basic Info " href="/users/{{$user->id}}/edit" class="do"> Edit Basic Info </a>

	@section ('alert1_panel_title','Basic Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $user->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'info', 'message'=> $user->type ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $user->email,'icon'=> 'glyphicon glyphicon-cog'))
	@endsection

<a title="General Info " href="/generalinfos/{{$user->id}}" class="do"> General Info </a>
<a title="Professional Info " href="/professionalinfos/{{$user->id}}" class="do"> Professional Info </a>

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
