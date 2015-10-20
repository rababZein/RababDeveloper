@extends ('layouts.dashboard')
@section('page_heading','Add New Company')

@section('section')

<!--         <form class="form-horizontal" role="form" method="POST" action="{{ url('/companies/storecompanybyadmin') }}">
 -->        {{ Form::open(['action' => 'CompaniesController@storecompanybyadmin','method'=>'post','files' => true]) }}

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

<div>
            <div class="form-group">
              <label class="col-md-4 control-label">Company Name</label>
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
</div>
            <br/>
            <br/>

           <div class="form-group ">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label">Description</label>
                <input type="text" name="desc" class="form-control" id="inputSuccess" value="{{old('desc')}}">
            </div>

            <div class="form-group has-success">
               <label> Country </label>
              <select class="form-control col-md-6" name="country">
              @foreach ($countries as $country)
                          @if(old('country') === $country->id)
                            <option value="{{ $country->id }}" selected="true"> {{ $country->name }}</option>
                          @else
                            <option value="{{ $country->id }}"> {{ $country->name }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>

         
            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> city</label>
                <input type="text" name="city" class="form-control" id="inputSuccess" value="{{old('city')}}">
            </div>

             <div class="form-group has-error">
                <!-- <label class="control-label" for="inputError">Input with error</label> -->
                <label> address </label>
                <textarea name="address" class="form-control" rows="3">{{old('address')}}</textarea>
            </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> phone</label>
                <input type="number" name="phone" class="form-control" id="inputSuccess" value="{{old('phone')}}">
             </div>

             
             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Another phone</label>
                <input type="number" name="anotherphone" class="form-control" id="inputSuccess" value="{{old('anotherphone')}}">
             </div>



             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> logo</label>
                <input type="text" name="logo" class="form-control" id="inputSuccess" value="{{old('logo')}}">
             </div>


           <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> fax </label>
                <input type="text" name="fax" class="form-control" id="inputSuccess" value="{{old('fax')}}">
             </div>


             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> facebook </label>
                <input type="text" name="facebook" class="form-control" id="inputSuccess" value="{{old('facebook')}}">
             </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> twitter </label>
                <input type="text" name="twitter" class="form-control" id="inputSuccess" value="{{old('twitter')}}">
             </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> linkedIn  </label>
                <input type="text" name="linkedIn " class="form-control" id="inputSuccess" value="{{old('linkedIn')}}">
             </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> website </label>
                <input type="text" name="website" class="form-control" id="inputSuccess" value="{{old('website')}}">
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