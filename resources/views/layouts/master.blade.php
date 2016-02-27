<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Skorely - @yield('title')</title>


    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" >
    <script src="{{ asset('/js/jquery-2.2.0.min.js') }}" type="text/javascript" ></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
                @if (Auth::check())
                    <ul class="nav navbar-nav navbar-right">
                        <li> 
                            <a href="/auth/logout">Logout</a>
                        </li>
                    </ul>
                @endif
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <main>
            @if (Auth::check())
            <div class="sidebar-nav col-lg-3">
                <div class="list-group">
                  <li class="list-group-item active">
                    Navigation
                  </li>
                  <a href="/programs" class="list-group-item">My Programs / Events</a>
                  <a href="#" class="list-group-item">My Record</a>
                  <a href="#" class="list-group-item">My Account</a>
                </div>
            </div>
            <div class="content col-lg-9">
                @yield('content')
            </div>
            @else
            <div class="content col-lg-12">
                @yield('content')
            </div>
            @endif
        </main>
    </div>

    

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('js/bootbox.min.js') }}" type="text/javascript" ></script>
</body>

</html>
