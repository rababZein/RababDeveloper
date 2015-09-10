@extends ('layouts.dashboard')

@section ('page_heading',$exhibition->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit exhibition Info " href="/exhibitions/{{$exhibition->id}}/edit" class="do"> Edit exhibition Info </a>

	@section ('alert1_panel_title','Basic Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibition->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibition->desc, 'icon'=> 'user'))

	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
