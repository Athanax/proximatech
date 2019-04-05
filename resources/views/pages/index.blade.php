@extends('layouts.home')

@section('content')
    
  <!--end of slider section-->
  <section class="main__middle__container homepage">
    <div class="row headings text-center no-margin nothing">
      <div class="container">
        <h1 class="page_title">Why choose us</h1>
        <p>We have developed business tools to increase efficiency in your business by over 80%.</p><p>
            We keep innovating and developing our sales automation tool, elections management system and other custom applications, offering a wide range of functionalities that help our customers and clients automate their business processes in order to achieve total efficiency</p>
        <p><a class="btn btn-default btn-lg" href="#" role="button">Tell me more</a></p>
      </div>
    </div>
    <div class="row three__blocks text-center no_padding no-margin">
      <div class="container">
        <h2 class="page__title">services</h2>
        <p class="small-paragraph"></p>
        <div class="col-md-4">
          <h3><a href="#">Modern Design</a></h3>
          <p class="smaller">Praesent interdum blandit</p>
          <img src="{{ URL::asset('storage/images/content__images/img2.jpg') }}" alt="image" class="img-responsive img-rounded">
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
          <p><a class="btn btn-primary btn-md" href="#" role="button">Learn more</a> 
        </div>
        <div class="col-md-4 middl">
          <h3><a href="#">High Quality</a></h3>
          <p class="smaller">Praesent interdum blandit</p>
          <img src="{{ URL::asset('storage/images/content__images/img4.png') }}" alt="image" class="img-responsive img-rounded">
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
          <p><a class="btn btn-primary btn-md" href="#" role="button">Learn more</a> 
        </div>
        <div class="col-md-4">
          <h3><a href="#">Quick Support</a></h3>
          <p class="smaller">Praesent interdum blandit</p>
          <img src="{{ URL::asset('storage/images/content__images/img1.jpg') }}" alt="image" class="img-responsive img-rounded">
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
          <p><a class="btn btn-primary btn-md" href="#" role="button">Learn more</a> 
        </div>
      </div>
    </div>
    <div class="row text-center nothing line__bg testimonials">
      <div class="container">
        <h2 class="page_title">TESTIMONIALS</h2>
        <p class="small-paragrapher"><img src="{{ URL::asset('storage/images/icons/testimonial.png') }}" alt="testimonial"></p>
        <div id="myCarousel2" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="item active">
              <p>"We have achieved 100% Visibility, 100% Efficiency and this is a vital tool for our Demand planning"</p>
              <p class="small-paragraph"><small>- Athanas Wambua,  SanaSoftwares</small></p>
            </div>
            <div class="item">
              <p>"Your execution and support in implementing Msafara project website was the best"</p>
              <p class="small-paragraph"><small>- Mkotar Paul,  Manager - Safaricom PLC</small></p>
            </div>
            <div class="item">
              <p>"The Astroturf booking system saves our time as members no longer come to make bookings at the office."</p>
              <p class="small-paragraph"><small>- Daniel Michael,  Jubilee Insurance - CEO</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row grey-info-block text-center">
      <div class="container">
        <h2 class="page__title">WHAT WE DO</h2>
        <p class="small-paragraph"></p>
        <div class="col-md-6"> <img src="{{ URL::asset('storage/images/content__images/image22.jpg') }}" alt="pic" class="img-rounded img-responsive" id="picture">
          <h3>CUSTOM WEB APPS</h3>
          <p>We develop E-commerce, Custom Web applications and dashboards for business and Organisations</p>
          <p><a class="btn btn-info btn-md" href="#" role="button">Learn more</a></p>
        </div>
        <div class="col-md-6"> <img src="{{ URL::asset('storage/images/content__images/image1.jpg') }}" alt="pic" class="img-rounded img-responsive">
          <h3>CUSTOM MOBILE APPS</h3>
          <p>Over 7 years experience in developing Custom Mobile Applications on Android, Windows and IOS</p>
          <p><a class="btn btn-info btn-md" href="#" role="button">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="row text-center nothing line__bg testimonials other">
      <div class="container">
        <h2 class="page_title">Are you a developer?</h2>
        <p class="small-paragrapher"></p>
        <p class="smally">We are hiring Full stack Laravel developer Full time and an Android Application Developer Full Time.</p>
        
        <p><a class="btn btn-default btn-lg" href="#" role="button">Enquire now</a></p>
      </div>
    </div>
    </div>
  </section>
@endsection

