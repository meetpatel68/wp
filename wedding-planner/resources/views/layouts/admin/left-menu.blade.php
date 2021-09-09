<!-- Side Nav START -->
<div class="side-nav">
    <div class="side-nav-inner">
        <div class="side-nav-logo">
            <a href="index.html">
                <div class="logo logo-dark" style="background-image: url('assets/images/logo/logo.png')"></div>
                <div class="logo logo-white" style="background-image: url('assets/images/logo/logo-white.png')"></div>
            </a>
            <div class="mobile-toggle side-nav-toggle">
                <a href="index.html">
                    <i class="ti-arrow-circle-left"></i>
                </a>
            </div>
        </div>
        <ul class="side-nav-menu scrollable">
            <li class="nav-item {{ (Request::is('admin')) ? 'active' : '' }}">
                <a class="mrg-top-30" href="{{ route('admin') }}">
                    <span class="icon-holder">
                        <i class="ti-home"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            @php
            $requestMasterData = (
                    Request::is('admin/category*') ||
                    Request::is('admin/term-of-use*') ||
                    Request::is('admin/privacy-policy*') ||
                    Request::is('admin/about-us*')
                ) ? true : false; 
            @endphp
            <li class="nav-item dropdown {!! $requestMasterData ? 'open' : '' !!}">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="ti-package"></i>
                    </span>
                    <span class="title">Master Data</span>
                    <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                  
                    <li class="{!! (Request::is('admin/category*')) ? 'active' : '' !!}">
                        <a href="{!! route('category.index') !!}">Category</a>
                    </li>
                    <li class="{!! (Request::is('admin/term-of-use*')) ? 'active' : '' !!}">
                        <a href="{!! route('term-of-use.index') !!}">Term of Use</a>
                    </li>
                    <li class="{!! (Request::is('admin/privacy-policy*')) ? 'active' : '' !!}">
                        <a href="{!! route('privacy-policy.index') !!}">Privacy Policy</a>
                    </li>
                    <li class="{!! (Request::is('admin/about-us*')) ? 'active' : '' !!}">
                        <a href="{!! route('about-us.index') !!}">About Us</a>
                    </li>
                </ul>
            </li>
           
            <li class="nav-item  {{ (Request::is('admin/vendor*')) ? 'active' : '' }}">
                <a href="{{ route('vendor.index') }}">
                    <span class="icon-holder">
                        <i class="ti-list-ol"></i>
                    </span>
                    <span class="title">Vendors</span>
                </a>
            </li>
              
            <li class="nav-item  {{ (Request::is('admin/enquiry-list*')) ? 'active' : '' }}">
                <a href="{{ route('admin.vendor.enquiry') }}">
                    <span class="icon-holder">
                        <i class="ti-list-ol"></i>
                    </span>
                    <span class="title">Enquiry</span>
                </a>
            </li>
             <li class="nav-item  {{ (Request::is('admin/contactus-list*')) ? 'active' : '' }}">
                <a href="{{ route('admin.contactus') }}">
                    <span class="icon-holder">
                        <i class="ti-list-ol"></i>
                    </span>
                    <span class="title">Contact Us</span>
                </a>
            </li>
           <!--  <li class="nav-item  {{ (Request::is('admin/message*')) ? 'active' : '' }}">
                <a href="{{ route('message.index') }}">
                    <span class="icon-holder">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <span class="title">Messages [Notification]</span>
                </a>
            </li> -->
             <li class="nav-item  {{ (Request::is('admin/site-user-list*')) ? 'active' : '' }}">
                <a href="{{ route('admin.siteuser') }}">
                    <span class="icon-holder">
                        <i class="ti-user"></i>
                    </span>
                    <span class="title">Site Users</span>
                </a>
            </li>
            <li class="nav-item  {{ (Request::is('admin/user*')) ? 'active' : '' }}">
                <a href="{{ route('user.index') }}">
                    <span class="icon-holder">
                        <i class="ti-user"></i>
                    </span>
                    <span class="title">User Administrator</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Side Nav END