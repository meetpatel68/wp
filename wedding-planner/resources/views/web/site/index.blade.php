@extends('layouts.app')

@section('content')
<section id="center" class="clearfix">
     <div class="center_main clearfix">
       <div class="container">
      <div class="row">
       <div class="center clearfix">
       <div class="col-sm-7 center_left clearfix">
        <div class="center_left_inner clearfix">
         <h1>Wedding Services</h1>
<!--          <h3>Wedding Services</h3>
 --><!--          <h5>Adipiscing  /  Torquent  /  Litora  /  Sociosqu</h5> -->
         <h4><a href="{{route('vendors')}}">Book Your Services</a></h4>
        </div>
       </div>    
       </div>
      </div>
     </div>
     </div>
    </section>

<section id="center_2" class="clearfix">
 <div class="container">
  <div class="row">
   <div class="center_2 clearfix">
    <div class="center_2_top clearfix">
     <h2>Fusce Nec Tellus Augue Semper</h2>
     <hr class="hr_1">
      <p>Diam dapibus inceptos dignissim</p>
    </div>
    <div class="center_2_middle clearfix">
     <div class="col-sm-4 center_2_middle_left clearfix">
      <div class="center_2_middle_left_inner clearfix">
       <p><i class="fa fa-tree"></i></p>
       <h2><a href="{{route('vendors')}}">Select Services</a></h2>
       <!-- <h4><i class="fa fa-chevron-right"></i>  Conubia & Praesent libero</h4>
       <h4><i class="fa fa-chevron-right"></i>  Conubia to integer</h4>
       <h4><i class="fa fa-chevron-right"></i>   Nec dapibus arcu</h4> -->
      </div>
     </div>
     <div class="col-sm-4 center_2_middle_left clearfix">
      <div class="center_2_middle_left_inner clearfix">
       <p><i class="fa fa-dedent"></i></p>
       <h2><a href="{{route('vendors')}}">Book a vendor</a></h2>
      <!--  <h4><i class="fa fa-chevron-right"></i> Torquent dapibus sociosqu</h4>
       <h4><i class="fa fa-chevron-right"></i>  Vestibulum lacinia</h4>
       <h4><i class="fa fa-chevron-right"></i>  Dignissim lacinia</h4> -->
      </div>
     </div>
     <div class="col-sm-4 center_2_middle_left clearfix">
      <div class="center_2_middle_left_inner clearfix">
       <p><i class="fa fa-bell"></i></p>
       <h2><a href="{{route('vendors')}}">Contact to vendor</a></h2>
       <!-- <h4><i class="fa fa-chevron-right"></i>Necodionec</h4>
       <h4><i class="fa fa-chevron-right"></i> Nulla quis sem at elementum imperdiet</h4>
       <h4><i class="fa fa-chevron-right"></i> Curabitursodales ligula in libero</h4> -->
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
     <h2>About Us</h2>
     <hr class="hr_1">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odionec odio. Praesent libero,<br> Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum,<br> taciti sociosqu ad litora .</p>
      <h5><a href="{{route('cms.about')}}">LEARN MORE</a></h5>
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
     <h2>Contact Us</h2>
     <hr class="hr_1">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odionec odio. Praesent libero,<br> Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum,<br> taciti sociosqu ad litora .</p>
      <h5><a href="{{route('cms.contactus')}}">LEARN MORE</a></h5>
    </div>
   </div>
  </div>
 </div>
</section>
@endsection
