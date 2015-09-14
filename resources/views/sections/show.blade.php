@extends ('layouts.dashboard')

@section ('page_heading',$section->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit section Info " href="/sections/{{$section->id}}/edit" class="do"> Edit section Info </a>

	@section ('alert1_panel_title','Basic Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $section->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $section->desc, 'icon'=> 'user'))

	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
