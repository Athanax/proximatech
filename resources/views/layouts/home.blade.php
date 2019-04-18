
<!DOCTYPE html>
<html>
<head>
<title>ProximaTech</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
</head>
<body>
<header class="main__header bg-primary">
  <div class="container ">
    <nav class="navbar navbar-default" role="navigation"> 
      <!-- Brand and toggle get grouped for better mobile display --> 
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="menuBar">
        <ul class="menu">
          <li class="active"><a href="/">Home</a></li>
          
          <li><a href="/portfolio">Portfolio</a></li>
          <li><a href="#">Careers</a></li>
        </ul>
        <ul class="menu m_right">
            <li><a href="/about">About Us</a></li>
            <li><a href="/contact">contact us</a></li>
            @guest
            <li class="dropdown"><a href="#">Account</a>
                <ul>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Create account</a></li>
                </ul>
            </li>
            @else
            <li><a href="/home">Dashboard</a></li>
            
            @endguest
          
        </ul>
      </div>
      <div class="navbar-header">
        <h1 class="navbar-brand"><a href="/">ProximaTech</a></h1>
        <a href="#" onClick="javascript.void()" class="submenu">Menus</a> </div>
      <!-- /.navbar-collapse --> 
    </nav>
  </div>
</header>
<section class="slider">
    @include('inc.message')
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item"> <img data-src="{{ URL::asset('storage/images/slider/slider.jpg') }}" alt="First slide" src="{{ URL::asset('storage/images/slider/slider.jpg') }}">
          <div class="container">
            <div class="carousel-caption">
              <h1 class="">For E-commerce websites</h1>
              <p>Our talented team of Software Engineers, Business Analyst and Project Manager will sit down and take your business to the next level</p>
              <p><a class="btn btn-default btn-lg" href="#" role="button">get started</a><a class="btn btn-default btn-lg" href="/about" role="button">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="item active"> <img data-src="{{ URL::asset('storage/images/slider/slider.jpg') }}" alt="Second slide" src="{{ URL::asset('storage/images/slider/slider.jpg') }}">
          <div class="container">
            <div class="carousel-caption">
              <h1 class="">information management systems</h1>
              <p>Data management information systems like students management systems, Finance management systems and so on.</p>
              <p><a class="btn btn-default btn-lg" href="#" role="button">get started</a><a class="btn btn-default btn-lg" href="/about" role="button">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="item"> <img data-src="{{ URL::asset('storage/images/slider/slider2.jpg') }}" alt="Third slide" src="{{ URL::asset('storage/images/slider/slider2.jpg') }}">
          <div class="container">
            <div class="carousel-caption">
              <h1 class="">Custom mobile applications</h1>
              <p>Mobile applications based on customer needs accross all platforms. Android, IOS and Windows.</p>
              <p><a class="btn btn-default btn-lg" href="#" role="button">get started</a><a class="btn btn-default btn-lg" href="/about" role="button">Read more</a></p>
            </div>
          </div>
        </div>
       
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon carousel-control-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon carousel-control-right"></span></a> </div>
  </section>
@yield('content')



<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h3>About</h3>
          <p>We strive to deliver a level of service that exceeds the expectations of our customers. <br />
            <br />
            If you have any questions about our products or services, please do not hesitate to contact us. We have friendly, knowledgeable representatives available seven days a week to assist you.</p>
        </div>
        <div class="col-md-3">
          <h3>Tweets</h3>
          <p><span>Tweet</span> <a href="#"> @a.t.h.a.n.a.s</a><br />
            <p>Hi ProximaTech,</p>Your web was very stunning. I really appreciate.<br>Thank you.</p>
          <p><span>Tweet</span> <a href="#"> @Script_kiddie</a><br />
            At first, I couldn't believe you can do such a nice job. Even my customers are very happy about the changes in the system. <br>Just to say thank you. </p>
        </div>
        <div class="col-md-3">
          <h3>Mailing list</h3>
          <p>Subscribe to our mailing list for offers, news updates and more!</p>
          <br />
          <form action="#" method="post" class="form-inline" role="form">
            <div class="form-group">
              <label class="sr-only" for="exampleInputEmail2">Your email</label>
              <input type="email" class="form-control form-control-lg" id="exampleInputEmail2" placeholder="Your email...">
            </div>
            <button type="submit" class="btn btn-info btn-md">Subscribe</button>
          </form>
        </div>
        <div class="col-md-3">
          <h3>Social</h3>
          <p>123 - 00100,<br />
            Kasarani,<br />
            Nairobi - Kenya.<br />
            <br />
            Phone Safaricom: +254707970057<br />
            Phone Telkom: +254779172665<br />
            <br />
          </p>
          <div class="social__icons"> <a href="#" class="socialicon socialicon-twitter"></a> <a href="#" class="socialicon socialicon-facebook"></a> <a href="#" class="socialicon socialicon-google"></a> <a href="#" class="socialicon socialicon-mail"></a> </div>
        </div>
      </div>
    </div>
  </footer>
  <p class="text-center copyright">&copy; Copyright ProximaTech. All Rights Reserved.</p>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="{{ asset('js/bootstrap.js') }}"></script> 
  <script type="text/javascript">
  
  $('.carousel').carousel({
    interval: 3500, // in milliseconds
    pause: 'none' // set to 'true' to pause slider on mouse hover
  })
  
  </script> 
  <script type="text/javascript">
  $( "a.submenu" ).click(function() {
  $( ".menuBar" ).slideToggle( "normal", function() {
  // Animation complete.
  });
  });
  $( "ul li.dropdown a" ).click(function() {
  $( "ul li.dropdown ul" ).slideToggle( "normal", function() {
  // Animation complete.
  });
  $('ul li.dropdown').toggleClass('current');
  });
  </script>
  </body>
  </html>
