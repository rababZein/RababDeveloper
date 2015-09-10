@extends ('layouts.dashboard')
@section('page_heading','Update Interest')

@section('section')

    {{ Form::open(array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('types.update'))) }}         
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
              <label> Name </label>
              <input type="text" name="name" value="{{ $type->name }}" class="form-control" id="inputSuccess">
            </div>

            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Description </label>
                <textarea name="size" class="form-control" rows="3">{{ $type->desc }}</textarea>
            </div>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Price </label>
              <input type="text" name="price" value="{{ $type->price }}" class="form-control" id="inputSuccess">
            </div>

            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Size </label>
                <input type="text"  name="desc" class="form-control" value="{{ $type->size }}">
            </div>

            <input type="hidden" name="id" value="{{ $type->id }}">
            <button> Edit </button>
        {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop