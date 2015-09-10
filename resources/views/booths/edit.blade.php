@extends ('layouts.dashboard')
@section('page_heading','Update Interest')

@section('section')

    {{ Form::open(array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('booths.update'))) }}         
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
              <label> name </label>
              <input type="text" name="name" value="{{ $booth->name }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>


            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Description </label>
              <textarea  name="desc" >{{ $booth->desc }}</textarea>
            </div>
            <br/>
            <br/>

     
            <br/>


              <div class="form-group has-success">
              <label> Type </label>
              <select class="form-control" name="type_id">
                  @foreach ($types as $type)
                    @if($booth->type->id === $type->id)
                      <option value="{{ $type->id }}" selected="true"> {{ $type->name }}</option>
                    @else
                      <option value="{{ $type->id }}"> {{ $type->name }}</option>
                    @endif   
                  @endforeach
              </select>
              </div>


            
              <div class="form-group has-success">
              <label> Model </label>
              <select class="form-control" name="modeldesign_id">
                  @foreach ($models as $model)
                    @if($booth->modeldesign->id === $model->id)
                      <option value="{{ $model->id }}" selected="true"> {{ $model->name }}</option>
                    @else
                      <option value="{{ $model->id }}"> {{ $model->name }}</option>
                    @endif   
                  @endforeach
              </select>
              </div>

            
           
            <input type="hidden" name="id" value="{{ $booth->id }}">
            <button> Edit </button>
    {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop