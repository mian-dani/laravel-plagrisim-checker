@extends('layouts.site')
@section('content')
    
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img={{asset("site/assets/images/bg/bg3.jpg")}}>
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">About</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-gray-silver">Page Title</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: About  -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20 ">
              <h2 class="line-bottom font-20 text-theme-colored text-uppercase mb-10 mt-0">Welcome to Our<span class="text-theme-color-2"> University</span></h2>
              <p class="lead font-18">We care for children, protect their welfare, and prepare them for the future</p>
              <p>Lorem ipsum dolor sit ametes redum, consectetur adipisicing elites. Istees recusandae laboriosam, voluptatibus culpa quas sint, deleniti delectus tempora. adipisicing elites. Istees recusandae laboriosam</p>
              <a class="btn btn-colored btn-theme-colored btn-sm" href="#">View Details</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20">
              <div class="image-box-thum">
                <img class="img-fullwidth" alt="" src={{asset("site/assets/images/about/ss1.jpg")}}>
              </div>
              <div class="image-box-details pt-20 pb-sm-20">
                <h4 class="title text-uppercase line-bottom mt-0">Experience Yourself</h4>
                <p class="desc mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ipsa ullam dicta suscipit.</p>
                <a href="#" class="btn btn-xs btn-theme-colored">Read more</a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20">
              <div class="image-box-thum">
                <img class="img-fullwidth" alt="" src={{asset("site/assets/images/about/ss2.jpg")}}>
              </div>
              <div class="image-box-details pt-20 pb-sm-20">
                <h4 class="title text-uppercase line-bottom mt-0">Online Learning</h4>
                <p class="desc mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ipsa ullam dicta suscipit.</p>
                <a href="#" class="btn btn-xs btn-theme-colored">Read more</a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="image-box-thum">
                <img class="img-fullwidth" alt="" src={{asset("site/assets/images/about/ss3.jpg")}}>
              </div>
              <div class="image-box-details pt-20 pb-sm-20">
                <h4 class="title text-uppercase line-bottom mt-0">Mastery Learning</h4>
                <p class="desc mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ipsa ullam dicta suscipit.</p>
                <a href="#" class="btn btn-xs btn-theme-colored">Read more</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Features -->
    <section id="features" class="bg-lighter">
      <div class="container">
        <div class="section-title">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase text-theme-colored font line-bottom line-height-1 mt-0 mb-0">Our <span class="text-theme-color-2 font-weight-400">Features</span></h2>
            </div>
          </div>
        </div>
        <div class="row mtli-row-clearfix">
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="icon-box iconbox-theme-colored bg-white p-15 mb-30 border-1px">
              <a class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                <i class="pe-7s-scissors"></i>
              </a>
              <div class="icon-box-details">
                <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5">Less CSS</h4>
                <p class="text-gray font-13 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias non null</p>
              </div>
            </div>    
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="icon-box iconbox-theme-colored bg-white p-15 mb-30 border-1px">
              <a class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                <i class="pe-7s-pen"></i>
              </a>
              <div class="icon-box-details">
                <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5">Easy Customiz</h4>
                <p class="text-gray font-13 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias non null</p>
              </div>
            </div>    
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="icon-box iconbox-theme-colored bg-white p-15 mb-30 border-1px">
              <a class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                <i class="pe-7s-tools"></i>
              </a>
              <div class="icon-box-details">
                <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5">Special ShortCode</h4>
                <p class="text-gray font-13 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias non null</p>
              </div>
            </div>    
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="icon-box iconbox-theme-colored bg-white p-15 mb-sm-30 border-1px">
              <a class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                <i class="pe-7s-vector"></i>
              </a>
              <div class="icon-box-details">
                <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5">W3 validation</h4>
                <p class="text-gray font-13 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias non null</p>
              </div>
            </div>    
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="icon-box iconbox-theme-colored bg-white p-15 border-1px">
              <a class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                <i class="pe-7s-phone"></i>
              </a>
              <div class="icon-box-details">
                <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5">Responsive</h4>
                <p class="text-gray font-13 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias non null</p>
              </div>
            </div>    
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="icon-box iconbox-theme-colored bg-white p-15 border-1px">
              <a class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                <i class="pe-7s-light"></i>
              </a>
              <div class="icon-box-details">
                <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5">Retina Ready</h4>
                <p class="text-gray font-13 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias non null</p>
              </div>
            </div>    
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Funfact -->
    <section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img={{asset("site/assets/images/bg/bg2.jpg")}} data-parallax-ratio="0.7">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-smile mt-5 text-theme-color-2"></i>
              <h2 data-animation-duration="2000" data-value="5248" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">Happy Students</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-note2 mt-5 text-theme-color-2"></i>
              <h2 data-animation-duration="2000" data-value="675" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">Our Courses</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-users mt-5 text-theme-color-2"></i>
              <h2 data-animation-duration="2000" data-value="248" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">Our Teachers</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
            <div class="funfact text-center">
              <i class="pe-7s-cup mt-5 text-theme-color-2"></i>
              <h2 data-animation-duration="2000" data-value="24" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">Awards Won</h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Why Choose Us -->
    <section id="event" class="">
      <div class="container pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h3 class="text-uppercase line-bottom mt-0 line-height-1"><i class="fa fa-calendar mr-10"></i>Upcoming <span class="text-theme-color-2">Events</span></h3>
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb mr-20"><img alt="" src={{asset("site/assets/images/event/1.jpg")}}></a>
                <div class="post-right">
                  <h4 class="mt-0 mb-5"><a href="#">Upcoming Event Title</a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                  </ul>
                  <p class="mb-0 font-13">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eveniet, nemo dicta. Ullam nam.</p>
                  <a class="text-theme-colored font-13" href="#">Read More →</a>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb mr-20"><img alt="" src={{asset("site/assets/images/event/2.jpg")}}></a>
                <div class="post-right">
                  <h4 class="mt-0 mb-5"><a href="#">Upcoming Event Title</a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                  </ul>
                  <p class="mb-0 font-13">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eveniet, nemo dicta. Ullam nam.</p>
                  <a class="text-theme-colored font-13" href="#">Read More →</a>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb mr-20"><img alt="" src={{asset("site/assets/images/event/3.jpg")}}></a>
                <div class="post-right">
                  <h4 class="mt-0 mb-5"><a href="#">Upcoming Event Title</a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                  </ul>
                  <p class="mb-0 font-13">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eveniet, nemo dicta. Ullam nam.</p>
                  <a class="text-theme-colored font-13" href="#">Read More →</a>
                </div>
              </article>
            </div>
            <div class="col-md-6">
              <h3 class="line-bottom mt-0 line-height-1">Why <span class="text-theme-color-2">Choose Us?</span></h3>
              <p class="mb-10">The Cweren Law Firm is a recognized leader in landlord tenant representation throughout Texas.The largest professional property.</p>
              <div id="accordion1" class="panel-group accordion">
                <div class="panel">
                  <div class="panel-title"> <a class="active" data-parent="#accordion1" data-toggle="collapse" href="#accordion11" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                  <div id="accordion11" class="panel-collapse collapse in" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion12" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                  <div id="accordion12" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion13" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                  <div id="accordion13" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion14" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                  <div id="accordion14" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion15" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                  <div id="accordion15" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Clients -->
    <section class="clients bg-theme-color-2">
      <div class="container pt-10 pb-0">
        <div class="row">
          <div class="col-md-12">
            <!-- Section: Clients -->
            <div class="owl-carousel-6col clients-logo transparent text-center owl-nav-top">
              <div class="item"> <a href="#"><img src={{asset("site/assets/images/clients/w1.png")}} alt=""></a></div>
              <div class="item"> <a href="#"><img src={{asset("site/assets/images/clients/w2.png")}} alt=""></a></div>
              <div class="item"> <a href="#"><img src={{asset("site/assets/images/clients/w3.png")}} alt=""></a></div>
              <div class="item"> <a href="#"><img src={{asset("site/assets/images/clients/w4.png")}} alt=""></a></div>
              <div class="item"> <a href="#"><img src={{asset("site/assets/images/clients/w5.png")}} alt=""></a></div>
              <div class="item"> <a href="#"><img src={{asset("site/assets/images/clients/w6.png")}} alt=""></a></div>
              <div class="item"> <a href="#"><img src={{asset("site/assets/images/clients/w3.png")}} alt=""></a></div>
              <div class="item"> <a href="#"><img src={{asset("site/assets/images/clients/w4.png")}} alt=""></a></div>
              <div class="item"> <a href="#"><img src={{asset("site/assets/images/clients/w5.png")}} alt=""></a></div>
              <div class="item"> <a href="#"><img src={{asset("site/assets/images/clients/w6.png")}} alt=""></a></div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- end main-content -->
@endsection