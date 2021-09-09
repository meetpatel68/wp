@extends('layouts.app')

@section('content')
<section id="about" class="clearfix">
 <div class="about_main clearfix">
   <div class="container">
  <div class="row">
   <div class="about clearfix">
   <div class="col-sm-7 about_left clearfix">
    <div class="about_left_inner clearfix">
   <h1>{{!empty($categories->name)?$categories->name:''}}</h1>
  </div>
   </div>  
   </div>
  </div>
 </div>
 </div>
</section>

<section id="about_2" class="clearfix">
   <div class="container">
    <div class="row">
    <div class="col-sm-3">
       <select class="form-control" name="city_id" id="city_id" required="">
        <option value="">Select City</option>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}"  <?=(!empty($model->city_id) && $model->city_id == $city->id)?'selected="selected"':''; ?>>{{ $city->city_name }}</option>
          
        @endforeach
    </select>
    </div>
    <div class="col-sm-3">
       <input type="text" name="serach" placeholder="Search" id="serach" class="form-control">
    </div>
  </div>
   <div class="col-sm-12 blog_left_inner">
   <h1>&nbsp;</h1>
   
   
  </div>
    <div class="col-sm-12 blog_left_inner">
   <h1><span class="boat">Weeding {{!empty($categories->name)?$categories->name:''}}</h1>
   <h3><a href="#"> {{!empty($categories->description)?$categories->description:''}}</a></h3>
   
  </div>
  
  <div class="row">
  
   <div class="about_2_middle clearfix ajax_div">
     @include('web.vendor.vendor_category_ajax_data')
  
   </div>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
  </div>
 </div>
 <script>
$(document).ready(function(){



 function fetch_data(page, sort_type, sort_by, query,city_id)
 {
  var id = '<?= Request::segment(3) ?>';
  $.ajax({
   url:"/vendors/vendor_category_fetch?id="+id+"&city_id="+city_id+"&page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
   success:function(data)
   {
    $('.ajax_div').html('');
    $('.ajax_div').html(data);
   }
  })
 }

 $(document).on('keyup', '#serach', function(){
  var query = $('#serach').val();
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();
  var page = $('#hidden_page').val();
   var city_id = $('#city_id').val();
  fetch_data(page, sort_type, column_name, query,city_id);
 });
$(document).on('change', '#city_id', function(){
  var query = $('#serach').val();
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();
  var page = '1';
  var city_id = $('#city_id').val();
  fetch_data(page, sort_type, column_name, query,city_id);
 });
 $(document).on('click', '.sorting', function(){
  var column_name = $(this).data('column_name');
  var order_type = $(this).data('sorting_type');
  var reverse_order = '';
  if(order_type == 'asc')
  {
   $(this).data('sorting_type', 'desc');
   reverse_order = 'desc';
   clear_icon();
   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
  }
  if(order_type == 'desc')
  {
   $(this).data('sorting_type', 'asc');
   reverse_order = 'asc';
   clear_icon
   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
  }
  $('#hidden_column_name').val(column_name);
  $('#hidden_sort_type').val(reverse_order);
  var page = $('#hidden_page').val();
  var query = $('#serach').val();
  var city_id = $('#city_id').val();
  fetch_data(page, reverse_order, column_name, query,city_id);
 });

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  
  var page = $(this).attr('href').split('page=')[1];
  $('#hidden_page').val(page);
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();

  var query = $('#serach').val();

  $('li').removeClass('active');
        $(this).parent().addClass('active');
  var city_id = $('#city_id').val();
  fetch_data(page, sort_type, column_name, query,city_id);
 });

});
</script>
</section>

@endsection
