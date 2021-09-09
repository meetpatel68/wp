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
     @if (\Session::has('success'))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> {{ \Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif
                 @if (\Session::has('error'))
                    <div class="row">
                        <div class="col-sm-12 alert-dismissable">
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Error!</strong> {{ \Session::get('error') }}
                            </div>
                        </div>
                    </div>
                @endif
{!! Form::open(['url' => route('user.dologin'), 'id' => 'formValidate', 'files' => true,' data-parsley-validate'=>""]) !!}
  <input type="email" name="email" maxlength="100" required="" class="form-control form-control_new_1" data-parsley-errors-container="#email_container" data-parsley-required-message="Please enter email."  placeholder="E-mail Address">
   <div id="email_container" class="form-control_new_1 noheight"></div>
  <h5><input class="btn btn-primary" type="submit" value="Login"></h5>
  {!! Form::close() !!}
   </div>
  </div>
 </div>
</section>
@endsection
