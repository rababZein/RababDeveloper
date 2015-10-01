@extends ('layouts.dashboard')
@section('page_heading','Step 3 Professional Info ')

@section('section')

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/professionalinfos/') }}">
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
               <label> Current Job</label>
                <input type="text" name="currentjob" class="form-control" id="inputSuccess" value="{{old('currentlyjob')}}">
            </div>

             <div class="form-group has-error">
                <!-- <label class="control-label" for="inputError">Input with error</label> -->
                <label> title </label>
                <textarea name="title" class="form-control" rows="3">{{old('dob')}}</textarea>
            </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> startwork_at </label>
                <input type="number" name="startwork_at" class="form-control" id="inputSuccess" value="{{old('startwork_at')}}">
             </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> companywebsite</label>
                <input type="text" name="companywebsite" class="form-control" id="inputSuccess" value="{{old('companywebsite')}}">
             </div>

              <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> d_maker </label>
                <input type="text" name="d_maker" class="form-control" id="inputSuccess" value="{{old('d_maker')}}">
             </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> colleage </label>
                <input type="text" name="colleage" class="form-control" id="inputSuccess" value="{{old('colleage')}}">
             </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> degree </label>
                <input type="text" name="degree" class="form-control" id="inputSuccess" value="{{old('degree')}}">
             </div>


             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> graduated at </label>
                <input type="text" name="graduated_at" class="form-control" id="inputSuccess" value="{{old('graduated_at')}}">
             </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> fax </label>
                <input type="text" name="fax" class="form-control" id="inputSuccess" value="{{old('d_maker')}}">
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
               <label> ownwebsite </label>
                <input type="text" name="ownwebsite" class="form-control" id="inputSuccess" value="{{old('ownwebsite')}}">
             </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> language </label>
                <input type="text" name="language" class="form-control" id="inputSuccess" value="{{old('language')}}">
             </div>
 
             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> level </label>
                <input type="text" name="level" class="form-control" id="inputSuccess" value="{{old('level')}}">
             </div>


            
            
            <button> Add </button>
        </form>
        
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop