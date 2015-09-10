@extends ('layouts.dashboard')

@section ('page_heading',$seriesevent->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit seriesevent Info " href="/seriesevents/{{$seriesevent->id}}/edit" class="do"> Edit seriesevent Info </a>

	@section ('alert1_panel_title','seriesevent Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $seriesevent->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $seriesevent->desc, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $seriesevent->exhibition->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $seriesevent->exhibitor->name, 'icon'=> 'user'))


	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
