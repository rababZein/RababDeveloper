@extends ('layouts.dashboard')

@section ('page_heading',$type->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit Type Info " href="/types/{{$type->id}}/edit" class="do"> Edit Type Info </a>

	@section ('alert1_panel_title','Basic Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $type->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $type->desc, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $type->size, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $type->price, 'icon'=> 'user'))


	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
