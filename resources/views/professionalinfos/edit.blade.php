@extends ('layouts.dashboard')
@section('page_heading','Update Interest')

@section('section')

    {{ Form::open(array('class' => 'form-inline', 'method' => 'PATCH', 'route' => array('professionalinfos.update'))) }}         
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
              <label> current job </label>
              <input type="text" name="currentjob" value="{{ $user[0]->currentjob }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> title </label>
              <input type="text" name="title" value="{{ $user[0]->title }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> startwork at </label>
              <input type="text" name="startwork_at" value="{{ $user[0]->startwork_at }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> company website </label>
              <input type="text" name="companywebsite" value="{{ $user[0]->companywebsite }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> d_maker </label>
              <input type="text" name="address" value="{{ $user[0]->d_maker }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> colleage </label>
              <input type="text" name="colleage" value="{{ $user[0]->colleage }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> degree </label>
              <input type="text" name="degree" value="{{ $user[0]->degree }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> graduated at </label>
              <input type="text" name="graduated_at" value="{{ $user[0]->graduated_at }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>
              
             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> fax</label>
              <input type="text" name="fax" value="{{ $user[0]->fax }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>



            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> facebook </label>
              <input type="text" name="facebook" value="{{ $user[0]->facebook }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> twitter </label>
              <input type="text" name="twitter" value="{{ $user[0]->twitter }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> linkedIn </label>
              <input type="text" name="linkedIn" value="{{ $user[0]->linkedIn }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> ownwebsite </label>
              <input type="text" name="ownwebsite" value="{{ $user[0]->ownwebsite }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label>  language </label>
              <input type="text" name="language" value="{{ $user[0]->language }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>
              
             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> level </label>
              <input type="text" name="level" value="{{ $user[0]->level }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>


            

         
           
            <input type="hidden" name="id" value="{{ $user[0]->user->id }}">
            <button> Edit </button>

            <a title="Edit Basic Info" href="/users/{{$user[0]->user->id}}/edit" class="do">Edit Basic Info</a>
            <a title="Edit Professional Info" href="/professionalinfos/{{$user[0]->user->id}}/edit" class="do">Edit Professional Info</a>
        {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop