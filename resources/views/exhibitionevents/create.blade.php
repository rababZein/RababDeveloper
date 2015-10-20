@extends ('layouts.dashboard')
@section('page_heading','create  Exhibition Event')

@section('section')

<!--         <form class="form-horizontal" role="form" method="POST" action="{{ url('/exhibitionevents/') }}">
 -->  
             {{ Form::open(['route' => 'exhibitionevents.store','method'=>'post','files' => true]) }}

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
               <label> Exhibition Event Name</label>
                <input type="text" name="name" class="form-control" id="inputSuccess" value="{{old('name')}}">
            </div>

              <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Description</label>
                <textarea name="desc" class="form-control" id="inputSuccess">{{old('desc')}}</textarea>
            </div>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Start Time</label>
                <input type="date" name="start_time" class="form-control" id="inputSuccess" value="{{old('start_time')}}">
            </div>
            
             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> End Time</label>
                <input type="date" name="end_time" class="form-control" id="inputSuccess" value="{{old('end_time')}}">
            </div>


             <div class="form-group has-success">
               <label> Exhibitions </label>
              <select class="form-control col-md-6" name="exhibition_id">
              @foreach ($exhibitions as $exhibition)
                          @if(old('exhibition_id') === $exhibition->id)
                            <option value="{{ $exhibition->id }}" selected="true"> {{ $exhibition->name }}</option>
                          @else
                            <option value="{{ $exhibition->id }}"> {{ $exhibition->name }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>


             <div class="form-group has-success">
               <label> Halls </label>
              <select class="form-control col-md-6" name="hall_id">
              @foreach ($halls as $hall)
                          @if(old('hall_id') === $hall->id)
                            <option value="{{ $hall->id }}" selected="true"> {{ $hall->name }}</option>
                          @else
                            <option value="{{ $hall->id }}"> {{ $hall->name }}</option>   
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