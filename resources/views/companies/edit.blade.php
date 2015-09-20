@extends ('layouts.dashboard')
@section('page_heading','Update Interest')

@section('section')

    {{ Form::open(array('class' => 'form-inline', 'method' => 'PATCH', 'route' => array('companies.update'))) }}         
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
              <select class="form-control" name="country">
                  @foreach ($countries as $country)
                    @if(!empty($company->country))
                      @if($company->country->id === $country->id)
                        <option value="{{ $country->id }}" selected="true"> {{ $country->name }}</option>
                      @else
                        <option value="{{ $country->id }}"> {{ $country->name }}</option>
                      @endif 
                    @else
                        <option value="{{ $country->id }}"> {{ $country->name }}</option> 
                    @endif  
                  @endforeach
              </select>
              </div>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> City </label>
              <input type="text" name="city" value="{{ $company->city }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>


            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Logo </label>
              <input type="text" name="logo" value="{{ $company->logo }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> address </label>
              <input type="text" name="address" value="{{ $company->address }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Phone </label>
              <input type="text" name="phone" value="{{ $company->phone }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Another phone </label>
              <input type="text" name="anotherphone" value="{{ $company->anotherphone }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> fax</label>
              <input type="text" name="fax" value="{{ $company->fax }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>



            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> facebook </label>
              <input type="text" name="facebook" value="{{ $company->facebook }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> twitter </label>
              <input type="text" name="twitter" value="{{ $company->twitter }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> linkedIn </label>
              <input type="text" name="linkedIn" value="{{ $company->linkedIn }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> website </label>
              <input type="text" name="website" value="{{ $company->website }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>
           
            <input type="hidden" name="id" value="{{ $company->id }}">
            <button> Edit </button>
    {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop