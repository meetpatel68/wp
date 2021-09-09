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
         <h1>Vendor Register</h1>
         <h5><a href="/">Home</a>  /Vendor Register </h5>
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
    <h1>Details needed to register vendor</h1>
  <hr class="hr_1">
    <?php $user=Session::get('user'); ?>
{!! Form::open(['url' => route('vendor.doregister'), 'id' => 'formValidate', 'files' => true,' data-parsley-validate'=>""]) !!}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div aria-required="true" class="form-group required form-group-default {{ $errors->has('vendor_name') ? 'has-error' : ''}}">
    <label for="vendor_name">Name*</label>
    {!! Form::text('vendor_name', null, ['class' => 'form-control','required' => '']) !!}
    {!! $errors->first('vendor_name', '<p class="help-block">:message</p>') !!}
</div>
<div aria-required="true" class="form-group required form-group-default {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email">Email*</label>
    {!! Form::text('email', null, ['class' => 'form-control','required' => '']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div aria-required="true" class="form-group required form-group-default {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="business_name">Business Name*</label>
    {!! Form::text('business_name', null, ['class' => 'form-control','required' => '']) !!}
    {!! $errors->first('business_name', '<p class="help-block">:message</p>') !!}
</div>
<div aria-required="true" class="form-group required form-group-default {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="parent_id">Category<span class="asctric">*</span></label>
     <select class="form-control" name="category" id="category" required="">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"  <?=(!empty($model->category) && $model->category == $category->id)?'selected="selected"':''; ?>>{{ $category->name }}</option>
          
        @endforeach
    </select>
    
   {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>
<div aria-required="true" class="form-group required form-group-default {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="parent_id">City<span class="asctric">*</span></label>
     <select class="form-control" name="city_id" id="city_id" required="">
        <option value="">Select City</option>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}"  <?=(!empty($model->city) && $model->city == $city->id)?'selected="selected"':''; ?>>{{ $city->city_name }}</option>
          
        @endforeach
    </select>
    
   {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>


<div aria-required="true" class="form-group required form-group-default {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description') !!}*
    {!! Form::textarea('description', null, ['class' => 'form-control','required' => '']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div aria-required="true" class="form-group required form-group-default {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="price">Price<span class="asctric">*</span></label>
     <input type="text" name="price" id="price" class="form-control" value="{{ !empty($model->price)?$model->price:''}}" onkeypress="return restrictInput(this, event, digitsOnly);" autocomplete="off" maxlength="8" required/>
    
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div aria-required="true" class="form-group required form-group-default {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="price_quotation_line">Price Quotation Line<span class="asctric">*</span></label>
     <input type="text" name="price_quotation_line" id="price_quotation_line" class="form-control" value="{{ !empty($model->price_quotation_line)?$model->price_quotation_line:''}}" autocomplete="off" maxlength="100" required/>
    
    {!! $errors->first('price_quotation_line', '<p class="help-block">:message</p>') !!}
</div>
<div aria-required="true" class="form-group required form-group-default {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="price_quotation_line">Price Details<span class="asctric">*</span></label>
     <textarea name="pricing_detail" id="pricing_detail" class="form-control textarea" autocomplete="off" required/>{{ !empty($model->pricing_detail)?$model->pricing_detail:''}}</textarea>
    
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div aria-required="true" class="form-group required form-group-default {{ $errors->has('file') ? 'has-error' : ''}}">
    {!! Form::label('file', 'Cover Image') !!}
    @if(isset($model))
    <br/>
    <div style="width:50%">
        {!! $model->getFileThumbImg() !!}
    </div>
    @endif
    {!! Form::file('file', ['class' => 'form-control']) !!}
    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
</div>

<div aria-required="true" class="form-group required form-group-default {{ $errors->has('thumbnail_file') ? 'has-error' : ''}}">
    <div class="row">
    {!! Form::label('image', 'Images') !!}
    @if(isset($vendorImages))
        @foreach($vendorImages as $row)

        <br/>
        <div class="col-sm-2 margin10">
        <img src="{{ asset('/files/vendors/'.$row->image_name) }}" width='200' height='200' />
        </div>
        @endforeach
    @endif
    </div>
     <input name="images[]" class="form-control" type="file" multiple />
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div aria-required="true" class="form-group required form-group-default {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>

<div aria-required="true" class="form-group input-group required form-group-default {{ $errors->has('phone') ? 'has-error' : ''}}">
    <span class="input-group-text"><i class="fa fa-phone-square"></i></span>
    {!! Form::text('phone', null, ['class' => 'form-control m-b', 'placeholder'=>'021 9998 777']) !!}
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>

<div aria-required="true" class="form-group input-group required form-group-default {{ $errors->has('website') ? 'has-error' : ''}}">
    <span class="input-group-text"><i class="fa fa-globe"></i>&nbsp;&nbsp;http://www.</span>
    {!! Form::text('website', null, ['class' => 'form-control m-b', 'placeholder'=>'website.com']) !!}
    {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
</div>

<div aria-required="true" class="form-group input-group required form-group-default {{ $errors->has('instagram') ? 'has-error' : ''}}">
    <span class="input-group-text"><i class="fa fa-instagram"></i>&nbsp;&nbsp;instagram.com/</span>
    {!! Form::text('instagram', null, ['class' => 'form-control m-b', 'placeholder'=>'agendanikah']) !!}
    {!! $errors->first('instagram', '<p class="help-block">:message</p>') !!}
</div>

{!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
<button class="btn btn-default" type="reset"><i class="pg-close"></i> Clear</button>

@push('script')
<script type="text/javascript">
    // Restrict user input in a text field
    // create as many regular expressions here as you need:
    var digitsOnly = /[1234567890]/g;
    var integerOnly = /[0-9\.]/g;
    var alphaOnly = /[A-Za-z]/g;
    var usernameOnly = /[0-9A-Za-z\._-]/g;

    function restrictInput(myfield, e, restrictionType, checkdot){
        if (!e) var e = window.event
        if (e.keyCode) code = e.keyCode;
        else if (e.which) code = e.which;
        var character = String.fromCharCode(code);

        // if user pressed esc... remove focus from field...
        if (code==27) { this.blur(); return false; }

        // ignore if the user presses other keys
        // strange because code: 39 is the down key AND ' key...
        // and DEL also equals .
        if (!e.ctrlKey && code!=9 && code!=8 && code!=36 && code!=37 && code!=38 && (code!=39 || (code==39 && character=="'")) && code!=40) {
            if (character.match(restrictionType)) {
                if(checkdot == "checkdot"){
                    return !isNaN(myfield.value.toString() + character);
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }
    }
</script>
<script>
$(".textarea").summernote({
    height: 200,
}); 
$('.select2').selectize({
    sortField: 'text'
});    
</script>
@endpush
  {!! Form::close() !!}
   </div>
  </div>
 </div>
</section>
@endsection
