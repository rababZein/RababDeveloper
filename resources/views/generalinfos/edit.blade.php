@extends ('layouts.dashboard')
@section('page_heading','Update Interest')

@section('section')

    {{ Form::open(array('class' => 'form-inline', 'method' => 'PATCH', 'route' => array('generalinfos.update'))) }}         
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
                    @if(!empty($user[0]->country->name))
                      @if($user[0]->country->id === $country->id)
                        <option value="{{ $country->id }}" selected="true"> {{ $country->name }}</option>
                      @else
                        <option value="{{ $country->id }}"> {{ $country->name }}</option>
                      @endif 
                    @else
                         
                    @endif  
                  @endforeach
              </select>
              </div>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> City </label>
              <input type="text" name="city" value="{{ $user[0]->city }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Date of Birth </label>
              <input type="text" name="dob" value="{{ $user[0]->dob }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Image </label>
              <input type="text" name="image" value="{{ $user[0]->image }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> address </label>
              <input type="text" name="address" value="{{ $user[0]->address }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Phone </label>
              <input type="text" name="phone" value="{{ $user[0]->phone }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Another phone </label>
              <input type="text" name="anotherphone" value="{{ $user[0]->anotherphone }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Email </label>
              <input type="text" name="skypename" value="{{ $user[0]->skypename }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>
              
             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> How Hear about us !?</label>
              <input type="text" name="howhearaboutus" value="{{ $user[0]->howhearaboutus }}" class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>


              <div class="form-group has-success">
              <label> Interest </label>
              <select class="form-control" name="interest">
                  @foreach ($interests as $interest)
                    @if($userinterest[0]->interest->id === $interest->id)
                      <option value="{{ $interest->id }}" selected="true"> {{ $interest->interest_in }}</option>
                    @else
                      <option value="{{ $interest->id }}"> {{ $interest->interest_in }}</option>
                    @endif   
                  @endforeach
              </select>
              </div>
            
         
           
            <input type="hidden" name="id" value="{{ $user[0]->user->id }}">
            <button> Edit </button>

            <a title="Edit Basic Info" href="/users/{{$user[0]->user->id}}/edit" class="do">Edit Basic Info</a>
            <a title="Edit Professional Info" href="/professionalinfos/{{$user[0]->user->id}}/edit" class="do">Edit Professional Info</a>
        {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop