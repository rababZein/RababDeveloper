@extends ('layouts.dashboard')

@section ('page_heading',$booth->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit Booth Info " href="/booths/{{$booth->id}}/edit" class="do"> Edit Booth Info </a>

	@section ('alert1_panel_title','Basic Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $booth->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $booth->desc, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $booth->type->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $booth->modeldesign->name, 'icon'=> 'user'))


	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
