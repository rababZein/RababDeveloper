@extends ('layouts.dashboard')
@section('page_heading','Step 2 General Info')

@section('section')

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/generalinfos/') }}">
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
               <label> skypename</label>
                <input type="text" name="skypename" class="form-control" id="inputSuccess" value="{{old('skypename')}}">
             </div>

              <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> DOB</label>
                <input type="text" name="dob" class="form-control" id="inputSuccess" value="{{old('dob')}}">
             </div>

                <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> How Hear about us !?</label>
                <input type="text" name="howhearaboutus" class="form-control" id="inputSuccess" value="{{old('howhearaboutus')}}">
             </div>



            <div class="form-group has-success">
               <label> Interests</label>
              <select class="form-control col-md-6" name="interest">
              @foreach ($interests as $interest)
                          @if(old('interest') === $interest->id)
                            <option value="{{ $interest->id }}" selected="true"> {{ $interest->interest_in }}</option>
                          @else
                            <option value="{{ $interest->id }}"> {{ $interest->interest_in }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>




            
            
            <button> Add </button>
        </form>
        
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop