

@extends('layouts.dashboard')
@section('page_heading','Exhibition Events')
@section('section')

            @if(Auth::User()->type!='regular')
            <!-- /.row -->
            <div class="col-sm-12">
            <div class="row"> <h1> UpComing Event </h1>
                @foreach($upcomingexhibitionevents as $exhibitionevent)
                <div class="col-lg-3 col-md-6">
               
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                  
                                   <a title="Show Upcoming Booths in {{$exhibitionevent->name}}" href="/exhibitionevents/listbooths/{{$exhibitionevent->id}}">
                                   <i class="fa fa-tasks fa-5x"></i></a>
                                   
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">  {{$exhibitionevent->name}}</div>
                                    <div>{{$exhibitionevent->start_time}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="/exhibitionevents/{{$exhibitionevent->id}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <a href="/booths/bookBooth/{{$exhibitionevent->id}}">
                            <div class="panel-footer">
                                <span class="pull-left">Book</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
               
                
                
            </div>
            @endif

             <!-- /.row -->
            <div class="row"> <h1> Currently Event </h1>

                @foreach($currentlyexhibitionevents as $exhibitionevent)
                <div class="col-lg-3 col-md-6">
               
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><a title="Show Currently Booths in {{$exhibitionevent->name}}" href="/exhibitionevents/listbooths/{{$exhibitionevent->id}}">
                                    <i class="fa fa-tasks fa-5x"></i></a>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$exhibitionevent->name}}</div>
                                    <div>{{$exhibitionevent->start_time}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="/exhibitionevents/{{$exhibitionevent->id}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
         
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                
                @section ('pane2_panel_title', 'Last News')
                @section ('pane2_panel_body')
                    
                    <!-- /.panel -->
                    
                        
              
                    <ul class="timeline">
                    <?php $flag=0;?>    
                    @foreach($upcomingexhibitionevents as $exhibitionevent)
                    @if($flag==0)
                        <li class="timeline-inverted">
                            <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">{{$exhibitionevent->name}}</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>{{$exhibitionevent->desc}}</p>
                                </div>
                            </div>
                        </li>
                    <?php $flag=1;?>  
                    @else 
                      
                        <li>
                            <div class="timeline-badge info"><i class="fa fa-save"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">{{$exhibitionevent->name}}</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>{{$exhibitionevent->desc}}</p>
                                    <hr>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-gear"></i>  <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a>
                                            </li>
                                            <li><a href="#">Another action</a>
                                            </li>
                                            <li><a href="#">Something else here</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php $flag=0;?>    
                    @endif
                    @endforeach 
                    </ul>
                        
                        <!-- /.panel-body -->
                   
                    <!-- /.panel -->
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'pane2'))
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    @section ('cchart11_panel_title','Line Chart')
                    @section ('cchart11_panel_body')
                    @include('widgets.charts.clinechart')
                    @endsection
                    @include('widgets.panel', array('header'=>true, 'as'=>'cchart11'))

                    @section ('pane1_panel_title', 'History')
                    @section ('pane1_panel_body')
                     
                        
                            <div class="list-group">
                               @if(!empty($tracklogins[1]))
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> Last Visit 
                                    <span class="pull-right text-muted small"><em>{{$tracklogins[1]->login_at}}</em>
                                    </span>
                                </a>

                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> Leave At 
                                    <span class="pull-right text-muted small"><em>{{$tracklogins[1]->logout_at}}</em>
                                    </span>
                                </a>


                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> Duration 
                                    <span class="pull-right text-muted small"><em><?php 
                                            $date1 = new DateTime($tracklogins[1]->logout_at);
                                            $date2 = new DateTime($tracklogins[1]->login_at);

                                            // The diff-methods returns a new DateInterval-object...
                                            $diff = $date2->diff($date1);

                                            // Call the format method on the DateInterval-object
                                            echo $diff->format('%h hours %i mintues %s secounds');

                                    ?></em>
                                    </span>
                                </a>
                               @else
                               Welcome With your first vist ^_^ 
                               @endif
                            </div>

      
                            <!-- /.list-group -->
                            <a href="/users/loginhistory/{{Auth::User()->id}}" class="btn btn-default btn-block">View All History</a>
                        
                        <!-- /.panel-body -->

                            <div class="list-group">
                               @foreach($systemtracks as $systemtrack)
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> {{$systemtrack->do}} 
                                    <span class="pull-right text-muted small"><em>From: <?php 
                                            $date1 = new DateTime(date("Y-m-d H:i:s"));
                                            $date2 = new DateTime($systemtrack->comein_at);

                                            // The diff-methods returns a new DateInterval-object...
                                            $diff = $date2->diff($date1);

                                            // Call the format method on the DateInterval-object
                                            echo $diff->format('%d day %h hours %i mintues %s secounds');

                                    ?><br/></em>
                                    </span>
                                </a>
                               @endforeach
                               
                            </div>

                           <a href="/systemtracks/userhistory/{{Auth::User()->id}}" class="btn btn-default btn-block">View All History</a>

                  
                    @endsection
                    @include('widgets.panel', array('header'=>true, 'as'=>'pane1'))
                      
                    
                    <!-- /.panel -->
                 
                @if(Auth::User()->type=='company')
                    @section ('pane3_panel_title', 'Event You Booked Booths in it')
                    @section ('pane3_panel_body')

                         <div class="btn-group pull-right margin-inverse-top">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a id="finished">
                                            <i class="fa fa-refresh fa-fw"></i> Finished 
                                        </a>
                                    </li>
                                    <li>
                                        <a id="currently">
                                            <i class="fa fa-check-circle fa-fw"></i> Currently
                                        </a>
                                    </li>
                                    <li>
                                        <a id="upcoming">
                                            <i class="fa fa-times fa-fw"></i> Upcoming
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>      
                        </div>


                        <!-- /.panel-heading -->

                        <!--Upcoming-->
                        <div id="Uevent">
                    
                        @if(!empty($upcomingcompanyevents))  
                        <p><B> Upcoming Events </B></p>
                        @foreach($upcomingcompanyevents as $upcomingcompanyevent)
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><a href="companies/listboothsofcompanyinthisevent/{{Auth::User()->id}}"> {{$upcomingcompanyevent->name}}</a></strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i><?php 
                                                    $date1 = new DateTime(date("Y-m-d H:i:s"));
                                                    $date2 = new DateTime($upcomingcompanyevent->start_time);

                                                    // The diff-methods returns a new DateInterval-object...
                                                    $diff = $date2->diff($date1);

                                                    // Call the format method on the DateInterval-object
                                                    echo $diff->format('%d day %h hours %i mintues %s secounds');

                                                ?>
                                            </small>
                                        </div>
                                        <p>
                                            {{$upcomingcompanyevent->desc}}
                                        </p>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        @endforeach
                        @endif
                        </div>
                        <!--Currently-->
                        <div id="Cevent">
                        
                        @if(!empty($currentlycompanyevents)) 
                        <p><B> Currently Events </B></p> 
                        
                        @foreach($currentlycompanyevents as $currentlycompanyevent)

                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><a href="companies/listboothsofcompanyinthisevent/{{Auth::User()->id}}"> {{$currentlycompanyevent->name}}</a></strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i><?php 
                                                    $date1 = new DateTime(date("Y-m-d H:i:s"));
                                                    $date2 = new DateTime($currentlycompanyevent->start_time);

                                                    // The diff-methods returns a new DateInterval-object...
                                                    $diff = $date2->diff($date1);

                                                    // Call the format method on the DateInterval-object
                                                    echo $diff->format('%d day %h hours %i mintues %s secounds');

                                                ?>
                                            </small>
                                        </div>
                                        <p>
                                            {{$currentlycompanyevent->desc}}
                                        </p>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        @endforeach
                        @endif
                        </div>
                        <!--Finished-->
                        <div id='Fevent'>
                        @if(!empty($finishedcompanyevents))  

                        <p><B> Finished Events </B></p>
                        @foreach($finishedcompanyevents as $finishedcompanyevent)
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><a href="companies/listboothsofcompanyinthisevent/{{Auth::User()->id}}"> {{$finishedcompanyevent->name}}</a></strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i><?php 
                                                    $date1 = new DateTime(date("Y-m-d H:i:s"));
                                                    $date2 = new DateTime($finishedcompanyevent->start_time);

                                                    // The diff-methods returns a new DateInterval-object...
                                                    $diff = $date2->diff($date1);

                                                    // Call the format method on the DateInterval-object
                                                    echo $diff->format('%d day %h hours %i mintues %s secounds');

                                                ?>
                                            </small>
                                        </div>
                                        <p>
                                            {{$finishedcompanyevent->desc}}
                                        </p>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        @endforeach
                        @endif
                        </div>
                        <!-- /.panel-body -->
                        
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                    @endsection
                   
                    @include('widgets.panel', array('header'=>true, 'as'=>'pane3'))
                </div>
            @endif    

      

               <!-- /.col-lg-4 -->

<script type="text/javascript">

$('#Uevent').hide();

$('#Fevent').hide();
    
$( document ).ready(function() {
    $('#finished').click(function(){

           $('#Fevent').show();
           $('#Uevent').hide();
           $('#Cevent').hide();
    });
    $('#currently').click(function(){

           $('#Fevent').hide();
           $('#Uevent').hide();
           $('#Cevent').show();
    });
    $('#upcoming').click(function(){

           $('#Fevent').hide();
           $('#Uevent').show();
           $('#Cevent').hide();
    });
});
</script>
            
@stop

