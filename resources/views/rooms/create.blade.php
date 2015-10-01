@extends ('layouts.dashboard')
@section('page_heading','Room Info')

@section('section')

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/rooms/') }}">
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
               <label> Room Name</label>
                <input type="text" name="name" class="form-control" id="inputSuccess" value="{{old('name')}}">
            </div>

              <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Description</label>
                <textarea name="desc" class="form-control" id="inputSuccess">{{old('desc')}}</textarea>
            </div>

              <div class="form-group has-success">
              <label> Event </label>
              <select class="form-control" name="event_id">
                  @foreach ($events as $event)
                    @if(old('event_id') === $event->id)
                      <option value="{{ $event->id }}" selected="true"> {{ $event->name }}</option>
                    @else
                      <option value="{{ $event->id }}"> {{ $event->name }}</option>
                    @endif   
                  @endforeach
              </select>
              </div>


            
              <div class="form-group has-success">
              <label> Spot </label>
              <select class="form-control" name="spot_id">
                  @foreach ($spots as $spot)
                    @if(old('spot_id') === $spot->id)
                      <option value="{{ $spot->id }}" selected="true"> {{ $spot->location }}</option>
                    @else
                      <option value="{{ $spot->id }}"> {{ $spot->location }}</option>
                    @endif   
                  @endforeach
              </select>
              </div>

            


            
            
            <button> Add </button>
        </form>
        
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop