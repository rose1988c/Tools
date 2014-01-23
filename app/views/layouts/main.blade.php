<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @section('css')
    {{-- include all required stylesheets --}}
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
    @show
    <style type="text/css"> .navbar{ margin-bottom: 20px; }</style>
    
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
    
    <footer id="footer">
      
      <div id="footer-floor">
        <div class="container">
          <div class="sqs-layout sqs-grid-12 columns-12" data-type="block-field" data-updated-on="1388757403555" id="footer-floor-blocks"><div class="row sqs-row"><div class="col sqs-col-12 span-12"><div class="sqs-block markdown-block sqs-block-markdown" data-block-type="44" id="block-94ebe6ef6ecaa7b7f269"><div class="sqs-block-content"><p>
        © 2014 <a href="http://www.rarestep.com">Rarestep Inc.</a> All rights reserved.
        <a href="/terms">Terms</a> and <a href="/privacy">Privacy Policy</a>.
        </p></div></div></div></div></div>
        </div>
      </div>
    </footer>

    {{-- include all required javascripts --}}
    {{ HTML::script('assets/js/jquery.min.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/app.js') }}

</body>
</html>