@extends ('layouts.dashboard')
@section('page_heading','Add New Exhibition')

@section('section')

<!--         <form class="form-horizontal" role="form" method="POST" action="{{ url('/exhibitions/') }}">
 -->        

             {{ Form::open(['route' => 'exhibitions.store','method'=>'post','files' => true]) }}
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
                <input type="text" name="name" class="form-control" id="inputSuccess" value="{{old('name')}}">
            </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Description</label>
                <input type="text" name="desc" class="form-control" id="inputSuccess" value="{{old('desc')}}">
            </div>
            
            
           <br/>
            <br/>

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
