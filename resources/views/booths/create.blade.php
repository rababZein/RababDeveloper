@extends ('layouts.dashboard')
@section('page_heading','Add New Booth')

@section('section')

<!--         <form class="form-horizontal" role="form" method="POST" action="{{ url('/booths/') }}">
 -->         
         {{ Form::open(['route' => 'booths.store','method'=>'post','files' => true]) }}

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
               <label> Booth Name</label>
                <input type="text" name="name" class="form-control" id="inputSuccess" value="{{old('name')}}">
            </div>

              <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Description</label>
                <textarea name="desc" class="form-control" id="inputSuccess">{{old('desc')}}</textarea>
            </div>

            <div class="form-group has-success">
              <label> Location </label>
              <select class="form-control col-md-6" name="spot_id">
              @foreach ($spots as $spot)
                          @if(old('spot_id') === $spot->id)
                            <option value="{{ $spot->id }}" selected="true"> {{ $spot->location }}</option>
                          @else
                            <option value="{{ $spot->id }}"> {{ $spot->location }}</option>   
                          @endif 
                  
              @endforeach
            
             </select>
           </div>

             <div class="form-group has-success">
               <label> Exhibitor </label>
              <select class="form-control col-md-6" name="exhibitor">
              @foreach ($exhibitors as $exhibitor)
                          @if(old('exhibitor') === $exhibitor->id)
                            <option value="{{ $exhibitor->id }}" selected="true"> {{ $exhibitor->name }}</option>
                          @else
                            <option value="{{ $exhibitor->id }}"> {{ $exhibitor->name }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>


            <div class="form-group has-success">
               <label> Exhibition Event </label>
              <select class="form-control col-md-6" name="exhibitionevent">
              @foreach ($exhibitionevents as $exhibitionevent)
                          @if(old('exhibitionevent') === $exhibitionevent->id)
                            <option value="{{ $exhibitionevent->id }}" selected="true"> {{ $exhibitionevent->name }}</option>
                          @else
                            <option value="{{ $exhibitionevent->id }}"> {{ $exhibitionevent->name }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>


          <div class="form-group has-success">
               <label> Type </label>
              <select class="form-control col-md-6" name="type_id">
              @foreach ($types as $type)
                          @if(old('type_id') === $type->id)
                            <option value="{{ $type->id }}" selected="true"> {{ $type->name }}</option>
                          @else
                            <option value="{{ $type->id }}"> {{ $type->name }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>

           
         
             <div class="form-group has-success">
               <label> Model </label>
              <select class="form-control col-md-6" name="modeldesign_id">
              @foreach ($models as $model)
                          @if(old('modeldesign_id') === $model->id)
                            <option value="{{ $model->id }}" selected="true"> {{ $model->name }}</option>
                          @else
                            <option value="{{ $model->id }}"> {{ $model->name }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>


            
           <!-- File Upload -->

            <h1>File Upload</h1>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> File Name</label>
                <input type="text" name="filename" class="form-control" id="inputSuccess">
            </div>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Description</label>
                <textarea name="filedesc" class="form-control" id="inputSuccess"></textarea>
            </div>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Type </label>
                <input type="text" name="filetype" class="form-control" id="inputSuccess">
            </div>


            <div class="row col-md-offset-1">
            <div class ="form-group">
              <label class="navtxt">Attach File</label>
              <input type="file" name="file">
            </div>
          </div>
            
      
            
            
         <button> Add </button>
         {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop