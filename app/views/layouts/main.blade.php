<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
      <script src="{{ HTML::script('assets/js/html5.js') }}"></script>
    <![endif]-->
    @section('css')
    {{-- include all required stylesheets --}}
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
    @show
    <style type="text/css"> .navbar{ margin-bottom: 20px; }
    .navbar .nav > li .dropdown-menu {
	    margin: -5px;
    }
    .navbar .nav > li:hover .dropdown-menu {
    	display: block;
    }
    
    </style>
    
    <link href="favicon.png" type="image/x-icon" rel="shortcut icon" />

  </head>
<body>

    <div class="navbar navbar-static-top">
        <div class="navbar-inner">
            <div class="container">
               
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                </a>

                <a class="brand" href="../">Tools</a>
                <div class="nav-collapse collapse" id="main-menu">
                    <ul class="nav" id="main-menu-left">
                        <li class="dropdown">
                           <a href="#menu3">工具</a>
                           <ul class="dropdown-menu">
                                <li><a href="#menu7">ICurl</a></li>
            				    <li><a href="#menu8">Db2Models</a></li>
            				    <li><a href="#menu8">比特熊</a></li>
                          </ul>
                        </li>
                        <li><a target="_blank" href="https://github.com/rose1988c/Tools">Github</a></li>
                    </ul>
                    <ul class="nav pull-right" id="main-menu-right">

                      @if(Auth::check())
                        @if(Auth::user()->is_admin())
                          <li><a href="/admin" title="Go to Admin area">Admin</a></li>
                        @endif
                      <li><a href="/user/profile" title="Your Profile">{{ Auth::user()->username }}</a></li>
                      <li><a rel="tooltip" href="/logout" title="Logout">Logout</a></li>
                      @endif
                      
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">

      <div class="row-fluid">
          <div class="span12">

            {{-- include the errors partial --}}
            @include('partials.errors')

            {{-- include content passed from controllers --}}
            @yield('content')
          </div>
      </div>

    </div>
    
    <footer id="footer" style="margin-top:30px;">
        <div class="navbar-static-top">
            <div class="navbar-inner">
                <div class="container" style="color:#fff;">
        			<p>Created by <a target="_blank" href="http://github.com/Rose1988c">Rose1988.c</a></p>
                </div>
            </div>
        </div>
    </footer>
    
    {{-- include all required javascripts --}}
    {{ HTML::script('assets/js/jquery.min.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/app.js') }}

</body>
</html>