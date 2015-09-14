@extends ('layouts.dashboard')
@section('page_heading','Update Interest')

@section('section')

    {{ Form::open(array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('seriesevents.update'))) }}         
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
              <input type="text" name="name" value="{{ $seriesevent->name }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>


            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Description </label>
              <textarea  name="desc" >{{ $seriesevent->desc }}</textarea>
            </div>
            <br/>
            <br/>

     
            <br/>


              <div class="form-group has-success">
              <label> Exhibition </label>
              <select class="form-control" name="exhibition_id">
                  @foreach ($exhibitions as $exhibition)
                    @if($seriesevent->exhibition->id === $exhibition->id)
                      <option value="{{ $exhibition->id }}" selected="true"> {{ $exhibition->name }}</option>
                    @else
                      <option value="{{ $exhibition->id }}"> {{ $exhibition->name }}</option>
                    @endif   
                  @endforeach
              </select>
              </div>


            
              <div class="form-group has-success">
              <label> Exhibitor </label>
              <select class="form-control" name="exhibitor_id">
                  @foreach ($exhibitors as $exhibitor)
                    @if($seriesevent->exhibitor->id === $exhibitor->id)
                      <option value="{{ $exhibitor->id }}" selected="true"> {{ $exhibitor->name }}</option>
                    @else
                      <option value="{{ $exhibitor->id }}"> {{ $exhibitor->name }}</option>
                    @endif   
                  @endforeach
              </select>
              </div>

            
           
            <input type="hidden" name="id" value="{{ $seriesevent->id }}">
            <button> Edit </button>
    {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop