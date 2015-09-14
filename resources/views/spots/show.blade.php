@extends ('layouts.dashboard')

@section ('page_heading',$spot->location.' '.'Profile' )

@section('section')
</div>
<a title="Edit Room Info " href="/spots/{{$spot->id}}/edit" class="do"> Edit Spot Info </a>

	@section ('alert1_panel_title','Spot Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $spot->location, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $spot->desc, 'icon'=> 'user'))


	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
