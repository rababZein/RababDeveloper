@extends ('layouts.dashboard')
@section('page_heading','Add New User')

@section('section')

        {{ Form::open(['route'=>'users.store','method'=>'post','files' => true]) }}
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

         
            <div class="form-group">
              <label class="col-md-4 control-label">Name</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Confirm Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation">
              </div>
            </div>

            <br/>
            <br/>


             <div class="form-group">
                    <label class="col-md-4 control-label">Register as </label>
                    @if(old('type')!='admin')
                    <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline1" value="regular" checked> Visitor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline2" value="admin" >Admin
                    </label>
                    @else
                     <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline1" value="regular" > Visitor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline2" value="admin" checked>Admin
                    </label>
                    @endif
                   
               
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
                <textarea name="desc" class="form-control" id="inputSuccess"></textarea>
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
        
       
@stop