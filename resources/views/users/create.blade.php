@extends ('layouts.dashboard')
@section('page_heading','Add New User')

@section('section')

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/users/') }}">
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


             <div class="form-group">
                    <label class="col-md-4 control-label">Register as </label>
                    <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline1" value="regular" checked> Visitor
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline2" value="admin">Admin
                    </label>
                   
               
            </div>  
            
            
         <button> Add </button>
        </form>
        
       
@stop