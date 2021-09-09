@extends('layouts.app')

@section('content')

<link href="{{ asset('css/detail.css') }}" rel="stylesheet">
<link href="{{ asset('css/about.css') }}" rel="stylesheet">
<link href="{{ asset('css/blog.css') }}" rel="stylesheet">
<section id="about" class="clearfix">
 <div class="about_main clearfix">
   <div class="container">
    <div class="row">
     <div class="about clearfix">
       <div class="col-sm-7 about_left clearfix">
        <div class="about_left_inner clearfix">
         <h1>About us</h1>
         <h5><a href="/">Home</a>  / Wedding {{ $model->category_name }} / {{ $model->city_name }} / {{ ucfirst($model->name) }} </h5>
       </div>
     </div>  
   </div>
 </div>
</div>
</div>
</section>
<section id="blog" class="clearfix">
 <div class="container">
  <div class="row">
   <div class="col-sm-12 blog clearfix">
     <div class="col-sm-9 blog_left">
      <div class="col-sm-12 blog_left_inner">
       <h1><span class="boat">{{ ucfirst($model->name) }} </h1>
         <h3>Wedding {{ $model->category_name }} in {{ $model->city_name }}</h3>
         
       </div>
         <div class="col-sm-12 blog_left_inner">
         <div class="col-sm-12 blog_left_inner">
          <img id="main_pic" src="{{ asset('/files/vendors/'.$model->file) }}" width="100%">
          
       </div>
          
       </div>
       <div class="row">
        <div class="col-sm-3 margin10">
            <img style="cursor: pointer;" class="thumb-img" src="{{ asset('/files/vendors/'.$model->file) }}" width='200' height='200' />
            </div>
        @if(isset($vendorImages))
          @foreach($vendorImages as $row)

            
            <div class="col-sm-3 margin10">
            <img style="cursor: pointer;" class="thumb-img" src="{{ asset('/files/vendors/'.$row->image_name) }}" width='200' height='200' />
            </div>
            @endforeach
            
        @endif
      </div>
       <div class="col-sm-12 blog_left_inner margintop10">
          <h3>Pricing</h3>
          <div>
            <?=stripslashes($model->pricing_detail) ?>
          </div>
       </div>
        <div class="col-sm-12 blog_left_inner margintop10">
          <h3>About</h3>
          <div>
            <?=stripslashes($model->description) ?>
          </div>
       </div>
      
      </div>
<div class="col-sm-3 about_1_right clearfix">
  <div class="col-sm-12 about_1_right_top">
    <div class="input-group col-sm-12">
      <input type="text" class="  search-query form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button class="btn btn-danger" type="button">
          <span class=" glyphicon glyphicon-search"></span>
        </button>
      </span>
    </div>
  </div>
  <div class="col-sm-12 about_1_right_center clearfix">
   <div class="about_1_right_center_1">
    <h2>Starting Price</h2>
  </div>
  <div class="about_1_right_center_2">
    <div class="price">
      {{env('APP_CURRENCY')}}{{ $model->price }}
    </div>
    <div class="price-quote">
      {{$model->price_quotation_line }}
    </div>
 </div>

</div>
 <div class="col-sm-12 about_1_right_center clearfix">
   <div class="about_1_right_center_1">
    <h2>Contact Us</h2>
  </div>
  <?php if(!empty($model->website)){ ?>
  <div class="about_1_right_center_2">
    <div class="price">
      Website
    </div>
    <div class="price-quote">
      {{$model->website }}
    </div>
 </div>
 <?php } ?>
 <?php if(!empty($model->instagram)){ ?>
  <div class="about_1_right_center_2">
    <div class="price">
      Instagram
    </div>
    <div class="price-quote">
      {{$model->instagram }}
    </div>
 </div>
 <?php } ?>
 <div class="about_1_right_center_2">
    <div class="price">
     &nbsp;
    </div>
    <div>
    <a href="{{ asset('/vendor-inquiry/'.$model->id) }}" class="call-us"><i class="fa fa-phone" aria-hidden="true"></i>
    Contact Us</a>
  </div>
 </div> 
</div>

</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  
  
  $( ".thumb-img" ).click(function() {
  
    $('#main_pic').attr("src",$(this).attr('src'));
});
</script>
</section>
@endsection
