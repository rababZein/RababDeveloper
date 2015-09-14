@extends ('layouts.dashboard')
@section('page_heading','Update Exhibition Event')

@section('section')

    {{ Form::open(array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('exhibitionevents.update'))) }}         
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
              <input type="text" name="name" value="{{ $exhibitionevent->name }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>


            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Description </label>
              <textarea  name="desc" >{{ $exhibitionevent->desc }}</textarea>
            </div>
            <br/>
            <br/>

     
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> start_time </label>
              <input type="date" name="start_time" value="{{ $exhibitionevent->start_time }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> end_time </label>
              <input type="date" name="end_time" value="{{ $exhibitionevent->end_time }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            
    
          <div class="form-group has-success">
               <label> Exhibitions </label>
              <select class="form-control col-md-6" name="exhibition_id">
              @foreach ($exhibitions as $exhibitions)
                           @if($exhibitionevent->exhibition->id === $exhibition->id)
                            <option value="{{ $exhibition->id }}" selected="true"> {{ $exhibition->name }}</option>
                          @else
                            <option value="{{ $exhibition->id }}"> {{ $exhibition->name }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>

            <div class="form-group has-success">
               <label> halls </label>
              <select class="form-control col-md-6" name="hall_id">
              @foreach ($halls as $hall)
                           @if($exhibitionevent->hall->id === $hall->id)
                            <option value="{{ $hall->id }}" selected="true"> {{ $hall->name }}</option>
                          @else
                            <option value="{{ $hall->id }}"> {{ $hall->name }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>



            
           
            <input type="hidden" name="id" value="{{ $exhibitionevent->id }}">
            <button> Edit </button>
    {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop