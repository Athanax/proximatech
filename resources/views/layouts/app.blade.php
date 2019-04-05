<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/adminlte.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('js/select2.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="{{ URL::asset('js/ckeditor/ckeditor.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{--  --}}
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">

    <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet">
    <link href="{{ asset('css/skin-blue.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    



    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    
    
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div id="app">

            @guest
    
                   <!-- Second navbar for sign in -->
        <nav class="navbar navbar-default">
                <div class="container">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">ProximaTech</a>
                  </div>
              
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="navbar-collapse-2">
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="#">Home</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Works</a></li>
                      <li><a href="#">News</a></li>
                      <li><a href="#">Contact</a></li>
                      <li class="nav-item">
                          <a class="btn btn-default " style="border-radius: 15px; background-color: transparent; margin-right:10px;" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="btn btn-default btn-sm" style="border-radius: 15px; background-color: transparent;" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                    </ul>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
              </nav><!-- /.navbar -->
    
    
               
            @else
    
                    {{-- the navbar starts from this point --}}
    
            <!--
            BODY TAG OPTIONS:
            =================
            Apply one or more of the following classes to get the
            desired effect
            |---------------------------------------------------------|
            | SKINS         | skin-blue                               |
            |               | skin-black                              |
            |               | skin-purple                             |
            |               | skin-yellow                             |
            |               | skin-red                                |
            |               | skin-green                              |
            |---------------------------------------------------------|
            |LAYOUT OPTIONS | fixed                                   |
            |               | layout-boxed                            |
            |               | layout-top-nav                          |
            |               | sidebar-collapse                        |
            |               | sidebar-mini                            |
            |---------------------------------------------------------|
            -->
            
            <div class="hold-transition skin-blue sidebar-mini fixed">
                    <div class="wrapper">
                    
                      <!-- Main Header -->
                      <header class="main-header">
                    
                        <!-- Logo -->
                        <a href="index2.html" class="logo">
                          <!-- mini logo for sidebar mini 50x50 pixels -->
                          <span class="logo-mini"><b>P</b>T</span>
                          <!-- logo for regular state and mobile devices -->
                          <span class="logo-lg"><b>{{ config('app.name', 'Laravel') }}</b></span>
                        </a>
                    
                        <!-- Header Navbar -->
                        <nav class="navbar navbar-static-top" role="navigation">
                          <!-- Sidebar toggle button-->
                          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                            <span class="sr-only">Toggle navigation</span>
                          </a>
                          <!-- Navbar Right Menu -->
                          <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                              <!-- Messages: style can be found in dropdown.less-->
                              <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="fa fa-envelope-o"></i>
                                  <span class="label label-success">
                                    @if (count($conversations)>0)
                                    {{ count($conversations) }}
                                    @endif
                                    
                                  </span>
                                </a>
                                <ul class="dropdown-menu">
                                  <li class="header">You have {{ count($conversations) }} new chats</li>
                                  <li>
                                    <!-- inner menu: contains the messages -->
                                    <ul class="menu">
                                      <li><!-- start message -->
                                        @foreach ($conversations as $conversation)
                                        @if ($conversation->r_id == Auth::user()->id)
                                        <a href="/messages/{{ $conversation->s_id }}">
                                          <div class="pull-left">
                                            <!-- User Image -->
                                            <img src="{{ URL::asset('storage/img/upl/'.Auth::user()->profile_pic.'') }}" class="img-circle" alt="User Image">
                                          </div>
                                          <!-- Message title and timestamp -->
                                          
                                            <h4>
                                              {{ $conversation->s_name }}
                                              <small><i class="fa fa-clock-o"></i>{{ $conversation->created_at }}</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>{{ $conversation->last_message }}</p>
                                            
                                        </a>
                                        @else
                                        <a href="/messages/{{ $conversation->r_id }}">
                                          <div class="pull-left">
                                            <!-- User Image -->
                                            <img src="{{ URL::asset('storage/img/upl/'.Auth::user()->profile_pic.'') }}" class="img-circle" alt="User Image">
                                          </div>
                                          <!-- Message title and timestamp -->
                                          
                                            <h4>
                                              {{ $conversation->r_name }}
                                              <small><i class="fa fa-clock-o"></i>{{ $conversation->created_at }}</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>{{ $conversation->last_message }}</p>
                                            
                                        </a>
                                        @endif
                                        @endforeach
                                      </li>
                                      <!-- end message -->
                                    </ul>
                                    <!-- /.menu -->
                                  </li>
                                  <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                              </li>
                              <!-- /.messages-menu -->
                    
                              <!-- Notifications Menu -->
                              <li class="dropdown notifications-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="fa fa-bell-o"></i>
                                  <span class="label label-warning">
                                    @if (count($notifications)>0)
                                    {{ count($notifications) }}
                                    
                                    @endif
                                    
                                  </span>
                                </a>
                                <ul class="dropdown-menu">
                                  <li class="header">You have {{ count($notifications) }} notifications</li>
                                  <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu">
                                      <li><!-- start notification -->
                                         

                                          @if (count($notifications)>0)
                                          @foreach ($notifications as $notification)
                                          <a href="#">
                                              {{ $notification->body }}
                                          </a>
                                          @endforeach
                                          @else
                                              <div class="container">Currently no notification</div> 
                                          @endif
                                    
                                      </li>
                                      <!-- end notification -->
                                    </ul>
                                  </li>
                                  @if (Auth::user())
                                  <li class="footer">
                                      <a href="" onclick="
                                      var result=confirm('Would you really like to mark as read?');
                      
                                      if(result){
                                          event.preventDefault();
                                          document.getElementById('mark_as_read').submit();
                                      }
                                      
                                    
                                      ">
                                      Mark as read
                                      </a>
                                      </li> 
                                      <form id="mark_as_read" method="post" action="{{route('notifications.update',[Auth::user()->id]) }}" style="display:none;">
                                          <input type="hidden" name="_method" value="put">
                                          {{ csrf_field() }}
                                      </form>
                                  @endif
                                </ul>
                              </li>
                              <!-- Tasks Menu -->
                              <li class="dropdown tasks-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="fa fa-flag-o"></i>
                                  <span class="label label-danger">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                  <li class="header">You have 9 tasks</li>
                                  <li>
                                    <!-- Inner menu: contains the tasks -->
                                    <ul class="menu">
                                      <li><!-- Task item -->
                                        <a href="#">
                                          <!-- Task title and progress text -->
                                          <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                          </h3>
                                          <!-- The progress bar -->
                                          <div class="progress xs">
                                            <!-- Change the css width attribute to simulate progress -->
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                              <span class="sr-only">20% Complete</span>
                                            </div>
                                          </div>
                                        </a>
                                      </li>
                                      <!-- end task item -->
                                    </ul>
                                  </li>
                                  <li class="footer">
                                    <a href="#">View all tasks</a>
                                  </li>
                                </ul>
                              </li>
                              <!-- User Account Menu -->
                              <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <!-- The user image in the navbar-->
                                  <img src="{{ URL::asset('storage/img/upl/'.Auth::user()->profile_pic.'') }}" class="user-image " alt="User Image">
                                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                  <span class="hidden-xs">{{ Auth::user()->name }} </span>
                                </a>
                                <ul class="dropdown-menu">
                                  <!-- The user image in the menu -->
                                  <li class="user-header">
                                    <img src="{{ URL::asset('storage/img/upl/'.Auth::user()->profile_pic.'') }}" class="img-circle" alt="User Image">
                    
                                    <p>
                                     {{ Auth::user()->name }} - Web Developer
                                      <small>Member since Nov. 2012</small>
                                    </p>
                                  </li>
                                  <!-- Menu Body -->
                                  <li class="user-body">
                                    <div class="row">
                                      <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                      </div>
                                      <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                      </div>
                                      <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                      </div>
                                    </div>
                                    <!-- /.row -->
                                  </li>
                                  <!-- Menu Footer-->
                                  <li class="user-footer">
                                    <div class="pull-left">
                                      <a href="/profile/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right ">
                                      
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                        </a>
    
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                    
                                    </div>
                                  </li>
                                </ul>
                              </li>
                              <!-- Control Sidebar Toggle Button -->
                              <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                              </li>
                            </ul>
                          </div>
                        </nav>
                      </header>
                      <!-- Left side column. contains the logo and sidebar -->
                      <aside class="main-sidebar">
                    
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                    
                          <!-- Sidebar user panel (optional) -->
                          <div class="user-panel">
                            <div class="pull-left image">
                              <img src="{{ URL::asset('storage/img/upl/'.Auth::user()->profile_pic.'') }}" class="img-circle" alt="User Image">
                            </div>
                            <div class="pull-left info">
                              <p>{{ Auth::user()->name }}</p>
                              <!-- Status -->
                              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                          </div>
                    
                          <!-- search form (Optional) -->
                          <form action="#" method="get" class="sidebar-form">
                            <div class="input-group">
                              <input type="text" name="q" class="form-control" placeholder="Search...">
                              <span class="input-group-btn">
                                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                  </button>
                                </span>
                            </div>
                          </form>
                          <!-- /.search form -->
                    
                          <!-- Sidebar Menu -->
                          <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">MAIN MENU</li>
                            <!-- Optionally, you can add icons to the links -->
                            <li><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>                            
                            <li><a href="/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                            <li><a href="/tasks"><i class="fa fa-tasks"></i> <span>Tasks</span></a></li>
                            <li><a href="/profile/{{ Auth::user()->id }}"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                            <li><a href="/messages"><i class="fa fa-envelope"></i> <span>Messages</span></a></li>
                            @if (Auth::user()->role==1)
                              <li><a href="/roles"><i class="fa fa-briefcase"></i> <span>Roles</span></a></li>
                              <li><a href="/profile"><i class="fa fa-users"></i> <span>Users</span></a></li> 
                            @endif
                            <li><a href="/posts"><i class="fa fa-link"></i> <span>Posts</span></a></li>

                          </ul>
                          <!-- /.sidebar-menu -->
                        </section>
                        <!-- /.sidebar -->
                      </aside>
                    
                      <!-- Content Wrapper. Contains page content -->
                      <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                          <h1>
                            Dashboard
                            <small>{{ Auth::user()->name }}</small>
                          </h1>
                          <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                            <li class="active">Here</li>
                          </ol>
                        </section>
                    
                        <!-- Main content -->
                        <section class="content container-fluid">
                    
                          <!--------------------------
                            | Your Page Content Here |
                            -------------------------->
                            @include('inc.message')
                            @yield('main')
                    
                            
                    
                        </section>
                        <!-- /.content -->
                      </div>
                      <!-- /.content-wrapper -->
                    
                      <!-- Main Footer -->
                      <footer class="main-footer">
                        <!-- To the right -->
                        <div class="pull-right hidden-xs">
                          Anything you want
                        </div>
                        <!-- Default to the left -->
                        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
                      </footer>
                    
                      <!-- Control Sidebar -->
                      <aside class="control-sidebar control-sidebar-dark">
                        <!-- Create the tabs -->
                        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <!-- Home tab content -->
                          <div class="tab-pane active" id="control-sidebar-home-tab">
                            <h3 class="control-sidebar-heading">Recent Activity</h3>
                            <ul class="control-sidebar-menu">
                              <li>
                                <a href="javascript:;">
                                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                    
                                  <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    
                                    <p>Will be 23 on April 24th</p>
                                  </div>
                                </a>
                              </li>
                            </ul>
                            <!-- /.control-sidebar-menu -->
                    
                            <h3 class="control-sidebar-heading">Tasks Progress</h3>
                            <ul class="control-sidebar-menu">
                              <li>
                                <a href="javascript:;">
                                  <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="pull-right-container">
                                        <span class="label label-danger pull-right">70%</span>
                                      </span>
                                  </h4>
                    
                                  <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                  </div>
                                </a>
                              </li>
                            </ul>
                            <!-- /.control-sidebar-menu -->
                    
                          </div>
                          <!-- /.tab-pane -->
                          <!-- Stats tab content -->
                          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                          <!-- /.tab-pane -->
                          <!-- Settings tab content -->
                          <div class="tab-pane" id="control-sidebar-settings-tab">
                            <form method="post">
                              <h3 class="control-sidebar-heading">General Settings</h3>
                    
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Report panel usage
                                  <input type="checkbox" class="pull-right" checked>
                                </label>
                    
                                <p>
                                  Some information about this general settings option
                                </p>
                              </div>
                              <!-- /.form-group -->
                            </form>
                          </div>
                          <!-- /.tab-pane -->
                        </div>
                      </aside>
                      <!-- /.control-sidebar -->
                      <!-- Add the sidebar's background. This div must be placed
                      immediately after the control sidebar -->
                      <div class="control-sidebar-bg"></div>
                    </div>
                    <!-- ./wrapper -->
                    
                    <!-- REQUIRED JS SCRIPTS -->
                    
                  
                    
                    <!-- Optionally, you can add Slimscroll and FastClick plugins.
                         Both of these plugins are recommended to enhance the
                         user experience. -->
                    </div>
    
            {{-- the navbar ends at this point --}}
    
    
    
    
            @endguest


        <main class="py-4">
            
        
            @yield('content')
        </main>
    </div>
    
</body>
</html>
<script>
   $(document).ready(function() {
    $('.select2').select2();
});
</script>
