@extends('layouts.app')

@section('content')
<link href="{{ asset('css/about.css') }}" rel="stylesheet">
<section id="about" class="clearfix">
 <div class="about_main clearfix">
   <div class="container">
  <div class="row">
   <div class="about clearfix">
   <div class="col-sm-7 about_left clearfix">
    <div class="about_left_inner clearfix">
   <h1>About us</h1>
 
  </div>
   </div>  
   </div>
  </div>
 </div>
 </div>
</section>

<section id="center_3" class="clearfix">
 <div class="container">
  <div class="row">
   <div class="center_3 clearfix">
    <div class="center_3_top clearfix">
    <?=!empty($content[0]->description)?$content[0]->description:''?>
  </div>
   </div>
  </div>
 </div>
</section>

@endsection
