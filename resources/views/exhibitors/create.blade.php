@extends ('layouts.dashboard')
@section('page_heading','Add New Exhibitor')

@section('section')

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/exhibitors/') }}">
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
               <label> Exhibitor Name</label>
                <input type="text" name="name" class="form-control" id="inputSuccess">
            </div>

              <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Description</label>
                <input type="text" name="desc" class="form-control" id="inputSuccess">
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
                <input type="text" name="city" class="form-control" id="inputSuccess">
            </div>

             <div class="form-group has-error">
                <!-- <label class="control-label" for="inputError">Input with error</label> -->
                <label> address </label>
                <textarea name="address" class="form-control" rows="3"></textarea>
            </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> phone</label>
                <input type="number" name="phone" class="form-control" id="inputSuccess">
             </div>

             
             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Another phone</label>
                <input type="number" name="anotherphone" class="form-control" id="inputSuccess">
             </div>



             

           <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> fax </label>
                <input type="text" name="fax" class="form-control" id="inputSuccess">
             </div>


           


            
            
            <button> Add </button>
        </form>
        
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop