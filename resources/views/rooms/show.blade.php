@extends ('layouts.dashboard')

@section ('page_heading',$room->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit Room Info " href="/rooms/{{$room->id}}/edit" class="do"> Edit Room Info </a>

	@section ('alert1_panel_title','room Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $room->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $room->desc, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $room->spot->location, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $room->event->name, 'icon'=> 'user'))


	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
