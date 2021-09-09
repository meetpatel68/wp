@extends('layouts.app')

@section('content')
<section id="center" class="clearfix">
     <div class="center_main clearfix">
       <div class="container">
      <div class="row">
       <div class="center clearfix">
       <div class="col-sm-7 center_left clearfix">
        <div class="center_left_inner clearfix">
         
         <h3>Vendor</h3>
         <h5>Services</h5>
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
     <h2>Services</h2>
     <hr class="hr_1">
      <p>We provide all typr of wedding services.</p>
    </div>
    
    <div class="center_2_middle clearfix">
      <?php  $categories = \App\Category::where('status','1')->get();
                            foreach ($categories as $category) { ?>
     <div class="col-sm-4 center_2_middle_left clearfix">
      <div class="center_2_middle_left_inner clearfix">
       <p><i class="{{ !empty($category->icon)?$category->icon:'fa fa-tasks' }}"></i></p>
       <h2><a href="{{route('vendors')}}/<?=str_replace(' ','-', strtolower($category->name))?>/<?=$category->id?>">{{ $category->name }}</a></h2>
       <h4><i class="fa fa-chevron-right"></i>  {{ $category->description }}</h4>
      
      </div>
     </div>
   <?php  } ?>
    
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
     <h2>Conubia Dapibus & Adipiscing</h2>
     <hr class="hr_1">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odionec odio. Praesent libero,<br> Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum,<br> taciti sociosqu ad litora .</p>
      <h5><a href="#">LEARN MORE</a></h5>
    </div>
   </div>
  </div>
 </div>
</section>

<section id="center_4" class="clearfix">
 <div class="container">
  <div class="row">
   <div class="center_4 clearfix">
    <div class="center_4_top clearfix">
     <h2>Porta nec Diam Dapibus</h2>
     <hr class="hr_1">
    </div>
   </div>
  </div>
 </div>
</section>
@endsection
