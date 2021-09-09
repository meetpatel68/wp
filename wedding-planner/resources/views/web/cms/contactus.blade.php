@extends('layouts.app')

@section('content')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
<link href="{{ asset('css/about.css') }}" rel="stylesheet">

<section id="about" class="clearfix">
 <div class="about_main clearfix">
   <div class="container">
    <div class="row">
     <div class="about clearfix">
       <div class="col-sm-7 about_left clearfix">
        <div class="about_left_inner clearfix">
         <h1>Contact us</h1>
         <h5><a href="/">Home</a>  / Contact Us</h5>
       </div>
     </div>  
   </div>
 </div>
</div>
</div>
</section>
<section id="contact" class="clearfix">
   <div class="container">
   <div class="row">
   <div class="contact clearfix">
    <div class="col-sm-4 contact_left clearfix">
   <div class="contact_left_inner clearfix">
    <div class="col-sm-3 contact_left_inner_left clearfix">
     <div class="contact_left_inner_left_inner clearfix">
      <p><i class="fa fa-map"></i></p>
     </div>
    </div>
    <div class="col-sm-9 contact_left_inner_right clearfix">
     <div class="contact_left_inner_right_inner clearfix">
      <h4>Address</h4>
    <hr class="hr_1">
    <p>6442 Fulton Street San Diego,</p>
    <p>GT 82662-8889 UAI</p>
     </div>
    </div>
   </div>
  </div>
  <div class="col-sm-4 contact_left clearfix">
   <div class="contact_left_inner clearfix">
    <div class="col-sm-3 contact_left_inner_left clearfix">
     <div class="contact_left_inner_left_inner clearfix">
      <p><i class="fa fa-phone"></i></p>
     </div>
    </div>
    <div class="col-sm-9 contact_left_inner_right clearfix">
     <div class="contact_left_inner_right_inner clearfix">
      <h4>Phone</h4>
    <hr class="hr_1">
    <p><a href="#">+2(826)818-5256</a></p>
    <p><a href="#">+1(800)123-4567</a></p>
     </div>
    </div>
   </div>
  </div>
  <div class="col-sm-4 contact_left clearfix">
   <div class="contact_left_inner clearfix">
    <div class="col-sm-3 contact_left_inner_left clearfix">
     <div class="contact_left_inner_left_inner clearfix">
      <p><i class="fa fa-envelope"></i></p>
     </div>
    </div>
    <div class="col-sm-9 contact_left_inner_right clearfix">
     <div class="contact_left_inner_right_inner clearfix">
      <h4>E-mail</h4>
    <hr class="hr_1">
    <p><a href="#">info@gmail.com</a></p>
     </div>
    </div>
   </div>
  </div>
   </div>
  </div>
 </div>
</section>

<section id="contact_2" class="clearfix">
   <div class="container">
   <div class="row">
   <div class="contact_2 clearfix">
    <h1>Feedback</h1>
  <hr class="hr_1">
    <p>We would love to hear from you! Contact us directly filling this form.</p>
  {!! Form::open(['url' => route('cms.contact_us'), 'id' => 'formValidate', 'files' => true,' data-parsley-validate'=>""]) !!}
  <input type="text" class="form-control form-control_new_1" placeholder="Name" name="name" id="name" required="" data-parsley-errors-container="#name_container">
   <div id="name_container" class="form-control_new_1 noheight"></div>
  <input type="email" class="form-control form-control_new_1" placeholder="E-mail Address" name="email" id="email" required="" data-parsley-errors-container="#email_container">
   <div id="email_container" class="form-control_new_1 noheight"></div>
  <textarea placeholder="Message" class="form-control form-control_mass" name="message" id="message" required="" data-parsley-errors-container="#message_container"></textarea>
   <div id="message_container" class="form-control_new_1 noheight"></div>
  <h5><input class="btn btn-primary" type="submit" value="SEND MESSAGE"></h5>
  {!! Form::close() !!}
   </div>
  </div>
 </div>
</section>
@endsection
