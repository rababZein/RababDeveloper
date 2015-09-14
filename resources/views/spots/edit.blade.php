@extends ('layouts.dashboard')
@section('page_heading','Add New Spot')

@section('section')

    {{ Form::open(array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('spots.update'))) }}         
         @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Location </label>
                <input type="text" name="location" value="{{ $spot->location }}" class="form-control" id="inputSuccess">
            </div>
            
            <div class="form-group has-error">
                <!-- <label class="control-label" for="inputError">Input with error</label> -->
                <label> Description </label>
<!--                 <input type="text" name="desc" class="form-control" id="inputError">
 -->                <textarea name="desc" class="form-control" rows="3">{{ $spot->desc }}</textarea>
            </div>
            <input type="hidden" name="id" value="{{ $spot->id }}" >
            <button> Add </button>
{{ Form::close()}}        
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop