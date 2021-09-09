<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/PACE/themes/blue/pace-theme-minimal.css') }}" />
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/element.css') }}" rel="stylesheet">
    <link href="{{ asset('css/runtime.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}"> 
     <link rel="stylesheet" href="{{ asset('vendor/summernote/dist/summernote.css') }}" />
<!-- page plugins css -->
    <link rel="stylesheet" href="{{ asset('vendor/bower-jvectormap/jquery-jvectormap-1.2.2.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/nvd3/build/nv.d3.min.css') }}" />
    
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/datatables/media/css/jquery.dataTables.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('/js/runtime.js')}}"></script>
</head>
<body>
    <!-- Header -->
    <section id="header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand heading_tag" href="/">Wedding Palnner</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="tag_menu <?=(request()->routeIs('/')?'active_tab':'')?>" href="/">HOME</a>                    </li>
                         
                        <li>
                            <a class="tag_menu  <?=(request()->routeIs('cms.about')?'active_tab':'')?>" href="{{route('cms.about')}}">ABOUT</a>                    </li>
                       
                            
                        <li>
                            <a class="tag_menu <?=(request()->routeIs('cms.contactus')?'active_tab':'')?>" href="{{route('cms.contactus')}}">CONTACT</a>                    </li>
                        
                       <li class="dropdown">
                          <a class="tag_menu <?=(request()->routeIs('vendors')?'active_tab':'')?>" href="{{route('vendors')}}" data-toggle="dropdown" role="button" aria-expanded="false">VENDOR<span class="caret"></span></a>
                          <ul class="dropdown-menu drop_1" role="menu">
                            <?php  $categories = \App\Category::where('status','1')->get();
                            foreach ($categories as $category) {
                                ?>
                                 <li><a href="{{route('vendors')}}/<?=str_replace(' ','-', strtolower($category->name))?>/<?=$category->id?>">{{ $category->name }}</a></li>
                                <?php
                                
                             } ?>
                          
                          </ul>
                        </li>
                         <?php  $vendor=Session::get('vendor'); 
                                      if(!empty($vendor)){ ?>
                                        <li>
                                        <a class="tag_menu <?=(request()->routeIs('vendor.enquiry')?'active_tab':'')?>" href="{{route('vendor.enquiry')}}">CUSTOMER ENQUIRY LIST</a>                    </li>
                                      <?php  } ?>
                          <?php  $user=Session::get('user'); 
                                      if(!empty($user)){ ?>
                                        <li>
                                        <a class="tag_menu <?=(request()->routeIs('vendor.vendor_enquiry')?'active_tab':'')?>" href="{{route('vendor.vendor_enquiry')}}">VENDOR ENQUIRY LIST</a>                    </li>
                                      <?php  } ?>
                        <li class="dropdown">
                          <a class="tag_menu <?=(request()->routeIs('vendors')?'active_tab':'')?>" href="{{route('vendors')}}" data-toggle="dropdown" role="button" aria-expanded="false">I AM USER<span class="caret"></span></a>
                            <ul class="dropdown-menu drop_1" role="menu">
                             <?php  $user=Session::get('user');

                              if(!empty($user)){ ?>
                                 <li>
                                  <a class="tag_menu <?=(request()->routeIs('user.logout')?'active_tab':'')?>" href="{{route('user.logout')}}">LOGOUT</a> 
                               </li>
                                  <?php  } else { ?> 
                                      <li>
                                        <a class="tag_menu <?=(request()->routeIs('user.login')?'active_tab':'')?>" href="{{route('user.login')}}">LOGIN</a> 
                                     </li>
                                    
                                  <?php }  ?>
                            </ul>
                        </li>
                       <li class="dropdown">
                          <a class="tag_menu <?=(request()->routeIs('vendors')?'active_tab':'')?>" href="{{route('vendors')}}" data-toggle="dropdown" role="button" aria-expanded="false">I AM VENDOR<span class="caret"></span></a>
                            <ul class="dropdown-menu drop_1" role="menu">
                             <?php  $vendor=Session::get('vendor');

                              if(!empty($vendor)){ ?>
                                 <li>
                                  <a class="tag_menu <?=(request()->routeIs('vendor.logout')?'active_tab':'')?>" href="{{route('vendor.logout')}}">LOGOUT</a> 
                               </li>
                                  <?php  } else { ?> 
                                      <li>
                                        <a class="tag_menu <?=(request()->routeIs('vendor.login')?'active_tab':'')?>" href="{{route('vendor.login')}}">LOGIN</a> 
                                     </li>
                                       <li>
                                                      <a class="tag_menu <?=(request()->routeIs('vendor.register')?'active_tab':'')?>" href="{{route('vendor.register')}}">REGISTER</a> 
                                                   </li>
                                  <?php }  ?>
                            </ul>
                        </li>
                       

                    </ul>
                     
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </section>

   <section id="header_mini">
        <div class="container">
          <div class="row">
                  <div class="header_mini clearfix">
                      <h1><a class="heading_tag" href="index.html">Marriage</a></h1>
                  </div>
                        <a id="menu-toggle" href="#" class="btn btn-warning btn-lg toggle"><i class="fa fa-toggle-on"></i></a>
              
                         <div id="sidebar-wrapper" class="">
                              <ul class="sidebar-nav">
                                <a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle"><i class="fa fa-remove"></i></a>
                                <li class="sidebar-brand">
                                  <a class="heading_tag" href="index.html">Marriage</a></li>
                                    <li>
                                        <a class="tag_menu active_tab" href="/">HOME</a>                    </li>
                                     
                                    <li>
                                        <a class="tag_menu" href="{{route('cms.about')}}">ABOUT</a>                    </li>
                                    
                                    <!-- <li>
                                        <a class="tag_menu" href="blog.html">BLOG</a>                    </li> -->
                                    
                                    <li>
                                        <a class="tag_menu" href="{{route('cms.testimonials')}}">TESTIMONIAL</a>                    </li>
                                    
                                  
                                    <li>
                                        <a class="tag_menu" href="{{route('cms.contactus')}}">CONTACT</a>                    </li>
                                    
                                   <li class="dropdown">
                                      <a class="tag_menu" href="#" data-toggle="dropdown" role="button" aria-expanded="false">VENDOR<span class="caret"></span></a>
                                      <ul class="dropdown-menu drop_1" role="menu">
                                        <?php  $categories = \App\Category::where('status','1')->get();
                                        foreach ($categories as $category) {
                                            ?>
                                              <li><a href="{{route('vendors')}}/<?=str_replace(' ','-', strtolower($category->name))?>/<?=$category->id?>">{{ $category->name }}</a></li>
                                            <?php
                                            
                                         } ?>
                                        
                                      </ul>
                                    </li>
                                       </li>
                         <?php  $vendor=Session::get('vendor'); 
                                      if(!empty($vendor)){ echo 'sada';?>
                                        <li>
                                        <a class="tag_menu" href="{{route('vendor.enquiry')}}">ENQUIRY LIST</a>                    </li>
                                      <?php  } ?>
                                     <li class="dropdown">
                                        <a class="tag_menu <?=(request()->routeIs('vendors')?'active_tab':'')?>" href="{{route('vendors')}}" data-toggle="dropdown" role="button" aria-expanded="false">I AM USER<span class="caret"></span></a>
                                          <ul class="dropdown-menu drop_1" role="menu">
                                           <?php  $user=Session::get('user');

                                            if(!empty($user)){ ?>
                                               <li>
                                                <a class="tag_menu <?=(request()->routeIs('user.logout')?'active_tab':'')?>" href="{{route('user.logout')}}">LOGOUT</a> 
                                             </li>
                                                <?php  } else { ?> 
                                                    <li>
                                                      <a class="tag_menu <?=(request()->routeIs('user.login')?'active_tab':'')?>" href="{{route('user.login')}}">LOGIN</a> 
                                                   </li>
                                                  
                                                <?php }  ?>
                                          </ul>
                                      </li>
                                     <li class="dropdown">
                                        <a class="tag_menu <?=(request()->routeIs('vendors')?'active_tab':'')?>" href="{{route('vendors')}}" data-toggle="dropdown" role="button" aria-expanded="false">I AM VENDOR<span class="caret"></span></a>
                                          <ul class="dropdown-menu drop_1" role="menu">
                                           <?php  $vendor=Session::get('vendor');

                                            if(!empty($vendor)){ ?>
                                               <li>
                                                <a class="tag_menu <?=(request()->routeIs('vendor.logout')?'active_tab':'')?>" href="{{route('vendor.logout')}}">LOGOUT</a> 
                                             </li>
                                                <?php  } else { ?> 
                                                    <li>
                                                      <a class="tag_menu <?=(request()->routeIs('vendor.login')?'active_tab':'')?>" href="{{route('vendor.login')}}">LOGIN</a> 
                                                   </li>
                                                   <li>
                                                      <a class="tag_menu <?=(request()->routeIs('vendor.register')?'active_tab':'')?>" href="{{route('vendor.register')}}">REGISTER</a> 
                                                   </li>
                                                 
                                                <?php }  ?>
                                          </ul>
                                      </li>
                              </ul>
                         </div>
                         
           </div>
        </div>
   </section>

   @yield('content')
    <!-- footer -->
    <section id="footer" class="clearfix">
        <div class="container">
        <div class="row">
        <div class="footer clearfix">
        <div class="footer_top clearfix">
         <h2><a href="index.html">{{env('APP_NAME')}}</a></h2>
        </div>
        <div class="footer_middle clearfix">
         <div class="col-sm-4 footer_middle_left clearfix">
          <div class="footer_middle_left_inner clearfix">
           <h2>Address</h2>
           <p>6255 Lacinia Nunc,</p>
           <p>Nostra F86 78JH,</p>
           <hr class="hr_1">
          </div>
         </div>
         <div class="col-sm-4 footer_middle_left clearfix">
          <div class="footer_middle_left_inner clearfix">
           <h2>Telephone</h2>
           <p><a href="#">6255 Lacinia Nunc,</a></p>
           <p><a href="#">Nostra F86 78JH,</a></p>
           <hr class="hr_1">
          </div>
         </div>
         <div class="col-sm-4 footer_middle_left clearfix">
          <div class="footer_middle_left_inner clearfix">
           <h2>E-mail</h2>
           <p><a href="#">info@gmail.com</a></p>
           <p><a href="#">nulla@torquent.org</a></p>
           <hr class="hr_1">
          </div>
         </div>
        </div>
        <div class="footer_bottom clearfix"> 
        <ul class="social-network social-circle">
                            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            </ul>
            <p> ©weddingplanner. All Rights Reserved </p>
        </div>
        </div>
        </div>
        </div>
        </section>
        <script src="{{ asset('admin-assets/js/vendor.js') }}"></script>
        <script type="text/javascript" src="{{URL::asset('/js/parsley.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('/js/bootstrap-datepicker.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('/js/select2.min.js')}}"></script>
        <script src="{{ asset('vendor/summernote/dist/summernote.min.js') }}"></script>
        <!-- page js -->

    <script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    
        <script src="{{ asset('js/classie.js') }}"></script>
        <script src="{{ asset('js/cbpAnimatedHeader.js') }}"></script>
        <script type="text/javascript">
          $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
        });
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
        });
        </script>
    <!-- Scripts -->
    @stack('script')
</body>
</html>
