@extends ('layouts.dashboard')
@section('page_heading','Update Interest')

@section('section')

    {{ Form::open(array('class' => 'form-inline', 'method' => 'PATCH', 'route' => array('exhibitors.update'))) }}         
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
                      @if($exhibitor->country->id === $country->id)
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
              <input type="text" name="city" value="{{ $exhibitor->city }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>


            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> name </label>
              <input type="text" name="name" value="{{ $exhibitor->name }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>


            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Description </label>
              <input type="text" name="desc" value="{{ $exhibitor->desc }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> address </label>
              <input type="text" name="address" value="{{ $exhibitor->address }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Phone </label>
              <input type="text" name="phone" value="{{ $exhibitor->phone }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Another phone </label>
              <input type="text" name="anotherphone" value="{{ $exhibitor->anotherphone }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> fax</label>
              <input type="text" name="fax" value="{{ $exhibitor->fax }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>


           
            <input type="hidden" name="id" value="{{ $exhibitor->id }}">
            <button> Edit </button>
    {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop