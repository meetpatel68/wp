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
         <h1>Thank You</h1>
         
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
    <h1>Thank You</h1>
  <hr class="hr_1">
  <?php $user=Session::get('user'); ?>
  <p>Thank you <?=!empty($user['name'])?'"'.$user['name'].'"':''?> for Inquiry.Our vendor will contact you soon</p>
   </div>
  </div>
 </div>
</section>
@endsection
