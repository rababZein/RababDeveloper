<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('/') }}">Wave XPO</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                   
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'success', 'value'=>'40'))
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                   
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'info', 'value'=>'20'))
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'warning', 'value'=>'60'))
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    
                                        <div>
                                        @include('widgets.progress', array('animated'=> true,'class'=>'danger', 'value'=>'80'))
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                            <a href="{{ url ('charts') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                            <a href="{{ url ('tables') }}"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li {{ (Request::is('*forms') ? 'class="active"' : '') }}>
                            <a href="{{ url ('forms') }}"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>SECTIONs<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*sections') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/sections/') }}">List All Sections </a>
                                </li>
                                <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/sections/create' ) }}">Add New Section</a>
                                </li>                             
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li >
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> SPOTS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*spots') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/spots/') }}">List All Spots</a>
                                </li>
                                <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/spots/create' ) }}">Add New Spot</a>
                                </li>                             
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                        <li >
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> USERS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*users') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/users/') }}">List All Users</a>
                                </li>
                                <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/users/create' ) }}">Add New User</a>
                                </li>
                                <li {{ (Request::is('*regular') ? 'class="active"' : '') }}>
                                    <a href="{{ url('/users/listregular') }}">List All Visitors</a>
                                </li>
                                <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/users/listadmin') }}">List All Admins</a>
                                </li>
                                <li {{ (Request::is('*super') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/users/listallsuperadmin') }}"> List All Super Admins </a>
                                </li>
                                 <li >
                                    <a href="#"> ACTIVIES<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('*activities') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/activities/') }}">List All Activities</a>
                                        </li>
                                        <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/activities/create' ) }}">Add New Activity</a>
                                        </li>                             
                                    </ul>
                            <!-- /.nav-second-level -->
                                 </li>
                                 <li >
                                    <a href="#"> INTERESTS<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('*interests') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/interests/') }}">List All Interests</a>
                                        </li>
                                        <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/interests/create' ) }}">Add New Interest</a>
                                        </li>                             
                                    </ul>
                            <!-- /.nav-second-level -->
                                 </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                           <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> EXHIBITION <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*exhibitions') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/exhibitions/') }}">List All Exhibitions </a>
                                </li>
                                <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/exhibitions/create') }}">Add New Exhibition</a>
                                </li>
                                
                                <li>
                                    <a href="#">    COMPONENTS  <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                         <li>
                                            <a href="#">HALLs  <span class="fa arrow"></span></a>
                                                <ul class="nav nav-third-level">
                                                    <li {{ (Request::is('*halls') ? 'class="active"' : '') }}>
                                                        <a href="{{ url ('/halls/') }}">List All Halls </a>
                                                    </li>
                                                    <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                                        <a href="{{ url ('/halls/create') }}">Add New Hall</a>
                                                    </li>
                                                </ul>
                                          <li>
                                          <li>
                                            <a href="#">MODEL DESIGNs  <span class="fa arrow"></span></a>
                                                <ul class="nav nav-third-level">
                                                    <li {{ (Request::is('*modeldesigns') ? 'class="active"' : '') }}>
                                                        <a href="{{ url ('/modeldesigns/') }}">List All Designs </a>
                                                    </li>
                                                    <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                                        <a href="{{ url ('/modeldesigns/create') }}">Add New Designs</a>
                                                    </li>
                                                </ul>
                                          <li>
                                          <li>
                                            <a href="#">MATERIALS  <span class="fa arrow"></span></a>
                                                <ul class="nav nav-third-level">
                                                    <li {{ (Request::is('*types') ? 'class="active"' : '') }}>
                                                        <a href="{{ url ('/types/') }}">List All Materials </a>
                                                    </li>
                                                    <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                                        <a href="{{ url ('/types/create') }}">Add New Material</a>
                                                    </li>
                                                </ul>
                                          <li>
                                                
                                        </ul>    
                                    <!-- /.nav-third-level -->
                                </li>
                                <li >
                                    <a href="#"> EXHIBITORS <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('*exhibitors') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/exhibitors/') }}">List All Exhibitors</a>
                                        </li>
                                        <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/exhibitors/createexhibitorbyadmin' ) }}">Add New Exhibitor</a>
                                        </li>
                                
                               
                                     </ul>
                            <!-- /.nav-second-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> COMPANIES <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*companies') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/companies/') }}">List All Companies </a>
                                </li>
                                <li {{ (Request::is('*createcompanybyadmin') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/companies/createcompanybyadmin') }}">Add New Company</a>
                                </li>

                                <li>
                                    <a href="#">INDUSTRY <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('*industries') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/industries/') }}">List All Industries </a>
                                        </li>
                                        <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/industries/create') }}">Add New Industry</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li >
                                    <a href="#"> EXHIBITORS <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('*exhibitors') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/exhibitors/') }}">List All Exhibitors</a>
                                        </li>
                                        <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/exhibitors/createexhibitorbyadmin' ) }}">Add New Exhibitor</a>
                                        </li>
                                
                               
                                     </ul>
                            <!-- /.nav-second-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li >
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>EXHIBITION EVENTS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*exhibitionevents') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/exhibitionevents/') }}">List All Exhibition Events</a>
                                </li>
                                <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/exhibitionevents/create' ) }}">Add New Exhibition Events</a>
                                </li>                             
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>BOOTH<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*booths') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/booths/') }}">List All Booths</a>
                                </li>
                                <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/booths/create' ) }}">Add New Booth</a>
                                </li>                             
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Event Series<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*seriesevents') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/seriesevents/') }}">List All Event Series</a>
                                </li>
                                <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/seriesevents/create' ) }}">Add New Event Series</a>
                                </li>                             
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>EVENTs<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*events') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/events/') }}">List All Event </a>
                                </li>
                                <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/events/create' ) }}">Add New Event</a>
                                </li>                             
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>ROOMs<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*rooms') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/rooms/') }}">List All Rooms</a>
                                </li>
                                <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/rooms/create' ) }}">Add New Room</a>
                                </li>                             
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('blank') }}">Blank Page</a>
                                </li>
                                <li>
                                    <a href="{{ url ('login') }}">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*documentation') ? 'class="active"' : '') }}>
                            <a href="{{ url ('documentation') }}"><i class="fa fa-file-word-o fa-fw"></i> Documentation</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">  
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
