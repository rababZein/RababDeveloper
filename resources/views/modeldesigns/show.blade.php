@extends ('layouts.dashboard')

@section ('page_heading',$model->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit model Info " href="/models/{{$model->id}}/edit" class="do"> Edit model Info </a>

	@section ('alert1_panel_title','Basic Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $model->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $model->desc, 'icon'=> 'user'))

	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
