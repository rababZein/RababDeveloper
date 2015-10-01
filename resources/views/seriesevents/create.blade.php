@extends ('layouts.dashboard')
@section('page_heading','Create Series Event')

@section('section')

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/seriesevents/') }}">
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
               <label> Series Event Name</label>
                <input type="text" name="name" class="form-control" id="inputSuccess" value="{{old('name')}}">
            </div>

              <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Description</label>
                <textarea name="desc" class="form-control" id="inputSuccess">{{old('desc')}}</textarea>
            </div>


              <div class="form-group has-success">
              <label> Exhibition </label>
              <select class="form-control" name="exhibition_id">
                  @foreach ($exhibitions as $exhibition)
                    @if(old('exhibition_id')=== $exhibition->id)
                      <option value="{{ $exhibition->id }}" selected="true"> {{ $exhibition->name }}</option>
                    @else
                      <option value="{{ $exhibition->id }}"> {{ $exhibition->name }}</option>
                    @endif   
                  @endforeach
              </select>
              </div>


            
              <div class="form-group has-success">
              <label> Exhibitor </label>
              <select class="form-control" name="exhibitor_id">
                  @foreach ($exhibitors as $exhibitor)
                    @if(old('exhibitor_id') === $exhibitor->id)
                      <option value="{{ $exhibitor->id }}" selected="true"> {{ $exhibitor->name }}</option>
                    @else
                      <option value="{{ $exhibitor->id }}"> {{ $exhibitor->name }}</option>
                    @endif   
                  @endforeach
              </select>
              </div>

            


            
            
            <button> Add </button>
        </form>
        
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop