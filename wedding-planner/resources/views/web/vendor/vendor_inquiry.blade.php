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
         <h1>About us</h1>
         <h5><a href="/">Home</a>  / Wedding {{ $model->category_name }} / {{ $model->city_name }} / {{ ucfirst($model->name) }} </h5>
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
    <h1>Details needed to contact any vendor</h1>
  <hr class="hr_1">
    <?php $user=Session::get('user'); ?>
{!! Form::open(['url' => route('vendor.inquiry'), 'id' => 'formValidate', 'files' => true,' data-parsley-validate'=>""]) !!}
  <input type="text" name="name" maxlength="50" required="" class="form-control form-control_new_1" data-parsley-errors-container="#name_container" value="{{!empty($user['name'])?$user['name']:''}}" placeholder="Name">
  <div id="name_container" class="form-control_new_1 noheight"></div>
  <input type="email" name="email" maxlength="100" value="{{!empty($user['email'])?$user['email']:''}}" required="" class="form-control form-control_new_1" data-parsley-errors-container="#email_container" placeholder="E-mail Address">
  <div id="email_container" class="form-control_new_1 noheight"></div>
  <input type="text" name="phone_number" maxlength="10" value="{{!empty($user['phone_number'])?$user['phone_number']:''}}" required="" class="form-control form-control_new_1" data-parsley-errors-container="#phone_number_container" placeholder="Phone Number">
  <div id="phone_number_container" class="form-control_new_1 noheight"></div>
  <select required="" class="form-control form-control_new_1" name="city_id" id="city_id" required="" data-parsley-errors-container="#city_id_container">
        <option value="">Choose Event City</option>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}"  <?=(!empty($model->city) && $model->city == $city->id)?'selected="selected"':''; ?>>{{ $city->city_name }}</option>
          
        @endforeach
    </select>
  <div id="city_id_container" class="form-control_new_1 noheight"></div>
  <textarea name="special_instruction" placeholder="Special Instruction" class="form-control form-control_mass"></textarea>
  <input type="text" name="event_date" maxlength="10" required="" class="form-control form-control_new_1 future_datepicker" data-parsley-errors-container="#event_date_container" placeholder="Date">
  <div id="event_date_container" class="form-control_new_1 noheight"></div>
  <input type="hidden" value="{{$id}}" name="vendor_id">
  <h5><input class="btn btn-primary" type="submit" value="Submit Detail"></h5>
  {!! Form::close() !!}
   </div>
  </div>
 </div>
</section>
@endsection
