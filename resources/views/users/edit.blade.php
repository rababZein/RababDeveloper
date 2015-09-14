@extends ('layouts.dashboard')
@section('page_heading','Update Interest')

@section('section')

    {{ Form::open(array('class' => 'form-inline', 'method' => 'PATCH', 'route' => array('users.update'))) }}         
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
            <label> Name </label>
              <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>
            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Type </label>
              <input type="text" name="type" value="{{ $user->type }}" class="form-control" id="inputSuccess" disabled>
            </div>
            <br/>
            <br/>


            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Email </label>
              <input type="text" name="email" value="{{ $user->email }}" class="form-control" id="inputSuccess" disabled>
            </div>
            <br/>
            <br/>

         
           
            <input type="hidden" name="id" value="{{ $user->id }}">
            <button> Edit </button>
            @if($user->type=='regular')
            <a title="Edit General Info" href="/generalinfos/{{$user->id}}/edit" class="do">Edit General Info</a>
            <a title="Edit Professional Info" href="/professionalinfos/{{$user->id}}/edit" class="do">Edit Professional Info</a>
            @endif
        {{ Form::close() }}
       

@stop