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
         <h1>Login</h1>
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
    <h1>Log in to Wedding Planner</h1>
  <hr class="hr_1">
    <p>To connect with this vendor</p>
{!! Form::open(['url' => route('user.dologin'), 'id' => 'formValidate', 'files' => true]) !!}
  <input type="email" name="email" maxlength="100" required="" class="form-control form-control_new_1" placeholder="E-mail Address">

  <h5><input class="btn btn-primary" type="submit" value="Login"></h5>
  {!! Form::close() !!}
   </div>
  </div>
 </div>
</section>
@endsection
