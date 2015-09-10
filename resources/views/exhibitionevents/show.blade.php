@extends ('layouts.dashboard')

@section ('page_heading',$exhibitionevent->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit exhibitionevent Info " href="/exhibitionevents/{{$exhibitionevent->id}}/edit" class="do"> Edit exhibitionevent Info </a>

	@section ('alert1_panel_title','Basic Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitionevent->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitionevent->desc, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitionevent->start_time, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitionevent->end_time, 'icon'=> 'user'))
    @include('widgets.alert', array('class'=>'success', 'message'=> $exhibitionevent->exhibition->name, 'icon'=> 'user'))


	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
