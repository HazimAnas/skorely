<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost:8000/resources/views/index/" target="_blank">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Skorely - We Make Scorekeeping Easy!</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom CSS -->
    <link href="{{ asset('one-page/css/one-page-wonder.css') }}" rel="stylesheet" type="text/css" >

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
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
                <a class="navbar-brand" href="/">Skorely</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li> 
                        <a href="/register">Register</a>
                    </li>
                    <li> 
                        <a href="/login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
                <h1>Skorely</h1>
                <h2>We make scorekeeping easier for you.</h2>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <hr class="featurette-divider">

        <!-- First Featurette -->
        <div class="featurette" id="about">
            <img class="featurette-image img-circle img-responsive pull-right" src="{{ asset('img/3023231-seamless-pattern-simple-numbers-on-blackboard-background.jpg') }}">
            <h2 class="featurette-heading">Scorekeeping Made Easy
                <span class="text-muted"></span>
            </h2>
            <p class="lead">We help you keep scores for anything from high school programs to corporate events. Whenever there are teams and scores involved, we will help to make it easier for you.</p>
        </div>

        <hr class="featurette-divider">

        <!-- Second Featurette -->
        <div class="featurette" id="services">
            <img class="featurette-image img-circle img-responsive pull-left" src="{{ asset('img/how-it-works-icon1.png') }}">
            <h2 class="featurette-heading">How It Works
                <span class="text-muted"></span>
            </h2>
            <p class="lead">
                The things you need to do is<br>
                1) Create Your Program<br>
                2) Add the Teams And Activities<br>
                3) Add the Points for The Teams in Each Activity<br>
                4) That's It!!</p>
            <p class="lead">The App Will Take Care Of The Rest And Generate The Rank.</p>
        </div>

        <hr class="featurette-divider">

        <!-- Third Featurette -->
        <div class="featurette" id="contact">
            <img class="featurette-image img-circle img-responsive pull-right" src="{{ asset('img/Website-Under-Construction.jpg') }}">
            <h2 class="featurette-heading">But, We Are Not Quite Ready Yet
                <span class="text-muted"></span>
            </h2>
            <p class="lead">Skorely is still under development. We are going to make sure that the app will be everything that you need and more. We can however say that it will be ready by this May. We hope that you can wait for us until then.</p>
        </div>

        <hr class="featurette-divider">

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Skorely 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ asset('one-page/js/jquery.js') }}" type="text/javascript" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('one-page/js/bootstrap.min.js') }}" type="text/javascript" ></script>


</body>

</html>
