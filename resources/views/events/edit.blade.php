@extends ('layouts.dashboard')
@section('page_heading','Update Exhibition Event')

@section('section')

    {{ Form::open(array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('events.update'))) }}         
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
              <input type="text" name="name" value="{{ $event->name }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>


            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Description </label>
              <textarea  name="desc" >{{ $event->desc }}</textarea>
            </div>
            <br/>
            <br/>

     
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Type </label>
              <input type="string" name="type" value="{{ $event->type }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group">
                    <label class="col-md-4 control-label">Privacy </label>
                    <label class="radio-inline">
                        <input type="radio" name="privacy" id="optionsRadiosInline1" value="regular" checked>Public
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="privacy" id="optionsRadiosInline2" value="company">Private
                    </label>
               
                </div>
            
   


             <div class="form-group has-success">
               <label> Series Exhibition </label>
              <select class="form-control col-md-6" name="seriesexhibition_id">
              @foreach ($seriesexhibitions as $seriesexhibition)
                          @if($event->seriesexhibition->id === $seriesexhibition->id)
                            <option value="{{ $seriesexhibition->id }}" selected="true"> {{ $exhibition->name }}</option>
                          @else
                            <option value="{{ $seriesexhibition->id }}"> {{ $seriesexhibition->name }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>
            

            
           
            <input type="hidden" name="id" value="{{ $event->id }}">
            <button> Edit </button>
    {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop