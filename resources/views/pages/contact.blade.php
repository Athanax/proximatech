@extends('layouts.nav')

@section('content')
<section class="main__middle__container">
    <div class="container">
            <div class="row title__block">
                    <div class="container text-center">
                            @include('inc.message')
                      <h2 class="page__title">Get in touch with us</h2>
                      <span class="sep"></span>
                      <p class="smaller">We are available for customer service calls and messages at any time of the day</p>
                    </div>
                  </div>
                  <section class="contact-us">
                    <div class="container">
                      <iframe width="100%" height="" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=&amp;aq=&amp;sll=37.422023,-122.084337&amp;sspn=0.00357,0.008229&amp;ie=UTF8&amp;ll=37.421981,-122.084531&amp;spn=0.001785,0.004115&amp;t=m&amp;z=18&amp;output=embed"></iframe>
                      <div class="row">
                        <div class="col-md-8">
                          <h3>Send us a message</h3>
                          <hr>
                          <p>Our friendly customer service representatives are committed to answering all your questions and meeting any need you may have. We would love to hear from you! Please fill out the form below so we may assist you.</p>
                          <br />
                          <p id="feedback"></p>
                          <form role="form" id="contact-form" name="contact-form" method="post" action="{{ route('adminmessages.store') }}" class="contact-form">
                            {{ csrf_field() }}
                            <div class="form-group col-md-6">
                              <label class="sr-only" for="exampleInputEmail1">Your Name: *</label>
                              <input required type="text" class="form-control" id="name" name="name" placeholder="Your Name: *">
                            </div>
                            <div class="form-group col-md-6">
                              <label class="sr-only" for="exampleInputEmail1">Email: *</label>
                              <input required type="email" class="form-control" id="email" name="email" placeholder="Email: *">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="sr-only" for="exampleInputEmail1">Subject:</label>
                              <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject:">
                            </div>
                            <div class="form-group">
                              <textarea required class="form-control" id="message" name="message" rows="5" placeholder="Message: *"></textarea>
                            </div>
                            <input id="submit-button" type="submit" class="btn btn-lg btn-primary pull-right" value="Submit">
                          </form>
                        </div>
                        <div class="col-md-4">
                          <h3>Get in touch with us</h3>
                          <hr>
                          <p>You can also send a message through the email provided below or make a call through any of the two phone numbers.</p>
                          <p>We are available every day from 8:00 to 17:00 at Gachambi house, Sunton estate , opposite Sunton Police Station.</p>
                          <p class="black-text"><span class="orange">Address:</span> 123 - 00100, Kasarani, Nairobi, Kenya</p>
                          <p class="black-text"><span class="orange">Telephone Safaricom:</span> +254702970057</p>
                          <p class="black-text"><span class="orange">Telephone Telkom:</span> +254779172665</p>
                          <p class="black-text"><span class="orange">Email:</span> athanaswambua@gmail.com</p>
                           </div>
                      </div>
                    </div>
    </div>
</section>
@endsection