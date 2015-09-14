@extends ('layouts.dashboard')

@section ('page_heading',$event->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit event Info " href="/events/{{$event->id}}/edit" class="do"> Edit event Info </a>

	@section ('alert1_panel_title','Event Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $event->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $event->desc, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $event->type, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $event->privacy, 'icon'=> 'user'))
    @include('widgets.alert', array('class'=>'success', 'message'=> $event->series_event->name, 'icon'=> 'user'))


	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
