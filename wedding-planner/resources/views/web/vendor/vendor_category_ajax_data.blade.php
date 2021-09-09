 @if((!$vendor->isEmpty()))
          @foreach ($vendor as $row)
    <div class="col-sm-4 about_2_middle_left clearfix">
   <div class="about_2_middle_left_inner clearfix">
     <div class="ih-item square effect13 right_to_left"><a href="#">
                      <div class="img"> {!! $row->getFileImg() !!} </div>
                      <div class="info">
                      </div></a></div>
   </div>
   <div class="about_2_middle_left_inner_2 clearfix">
    <h1><a href="{{ asset('/vendor-detail/'.$row->id) }}">{{!empty($row->business_name)?ucfirst($row->business_name):''}}</a></h1>
    <h6>{{!empty($row->city_name)?$row->city_name:''}}</h6>
    <p>{{!empty($row->price)?'£'.$row->price:''}} - Starting Package</p>
    <h5><a href="{{ asset('/vendor-detail/'.$row->id) }}">READ MORE</a></h5>
   </div>
  </div>
        @endforeach
  @else
     <div> No Data Found.</div>
  @endif
  <div class="row">
    {!! $vendor->links() !!}
  </div>