@extends ('layouts.dashboard')
@section('page_heading','Add New Spot')

@section('section')

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/activities/') }}">
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
               <label> Activity</label>
                <input type="text" name="activity" class="form-control" id="inputSuccess" value="{{old('activity')}}">
            </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Description</label>
                <input type="text" name="desc" class="form-control" id="inputSuccess" value="{{old('desc')}}">
            </div>
            
            
            <button> Add </button>
        </form>
        
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop