@extends('layouts.site')
@section('content')
<div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img={{asset("site/assets/images/bg/bg3.jpg")}} style="background-image: url(&quot;images/bg/bg3.jpg&quot;); background-position: 50% -102px;">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Gallery</h2>
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

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Works Filter -->
            <div class="portfolio-filter font-alt align-center">
              <a href="#" class="active" data-filter="*">All</a>
              <a href="#select1" class="" data-filter=".select1">Photos</a>
              <a href="#select2" class="" data-filter=".select2">Campus</a>
              <a href="#select3" class="" data-filter=".select3">Students</a>
            </div>
            <!-- End Works Filter -->
            
            <!-- Portfolio Gallery Grid -->
            <div id="grid" class="gallery-isotope grid-3 gutter clearfix" style="position: relative; height: 639.936px;">

              <!-- Portfolio Item Start -->
              <div class="gallery-item select1" style="position: absolute; left: 0px; top: 0px;">
                <div class="thumb">
                    <img class="img-fullwidth" src={{asset("site/assets/images/gallery/1.jpg")}} alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href={{asset("site/assets/images/gallery/1.jpg")}}><i class="fa fa-plus"></i></a>
                        <a href="#"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                  </div>
                  <a class="hover-link" data-lightbox="image" href={{asset("site/assets/images/gallery/1.jpg")}}>View more</a>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item select1" style="position: absolute; left: 379px; top: 0px;">
                <div class="thumb">
                    <img class="img-fullwidth" src={{asset("site/assets/images/gallery/2.jpg")}} alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href={{asset("site/assets/images/gallery/2.jpg")}}><i class="fa fa-plus"></i></a>
                        <a href="#"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                  </div>
                  <a class="hover-link" data-lightbox="image" href={{asset("site/assets/images/gallery/2.jpg")}}>View more</a>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item select2" style="position: absolute; left: 759px; top: 0px;">
                <div class="thumb">
                    <img class="img-fullwidth" src={{asset("site/assets/images/gallery/3.jpg")}} alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href={{asset("site/assets/images/gallery/3.jpg")}}><i class="fa fa-plus"></i></a>
                        <a href="#"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                  </div>
                  <a class="hover-link" data-lightbox="image" href={{asset("site/assets/images/gallery/3.jpg")}}>View more</a>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item select3" style="position: absolute; left: 0px; top: 213px;">
                <div class="thumb">
                    <img class="img-fullwidth" src={{asset("site/assets/images/gallery/4.jpg")}} alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href={{asset("site/assets/images/gallery/4.jpg")}}><i class="fa fa-plus"></i></a>
                        <a href="#"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                  </div>
                  <a class="hover-link" data-lightbox="image" href={{asset("site/assets/images/gallery/4.jpg")}}>View more</a>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item select1" style="position: absolute; left: 379px; top: 213px;">
                <div class="thumb">
                    <img class="img-fullwidth" src={{asset("site/assets/images/gallery/5.jpg")}} alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href={{asset("site/assets/images/gallery/5.jpg")}}><i class="fa fa-plus"></i></a>
                        <a href="#"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                  </div>
                  <a class="hover-link" data-lightbox="image" href={{asset("site/assets/images/gallery/5.jpg")}}>View more</a>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item select3" style="position: absolute; left: 759px; top: 213px;">
                <div class="thumb">
                    <img class="img-fullwidth" src={{asset("site/assets/images/gallery/6.jpg")}} alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href={{asset("site/assets/images/gallery/6.jpg")}}><i class="fa fa-plus"></i></a>
                        <a href="#"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                  </div>
                  <a class="hover-link" data-lightbox="image" href={{asset("site/assets/images/gallery/6.jpg")}}>View more</a>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item select2" style="position: absolute; left: 0px; top: 426px;">
                <div class="thumb">
                    <img class="img-fullwidth" src={{asset("site/assets/images/gallery/7.jpg")}} alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href={{asset("site/assets/images/gallery/7.jpg")}}><i class="fa fa-plus"></i></a>
                        <a href="#"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                  </div>
                  <a class="hover-link" data-lightbox="image" href={{asset("site/assets/images/gallery/7.jpg")}}>View more</a>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item select3" style="position: absolute; left: 379px; top: 426px;">
                <div class="thumb">
                    <img class="img-fullwidth" src={{asset("site/assets/images/gallery/8.jpg")}} alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href={{asset("site/assets/images/gallery/8.jpg")}}><i class="fa fa-plus"></i></a>
                        <a href="#"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                  </div>
                  <a class="hover-link" data-lightbox="image" href={{asset("site/assets/images/gallery/8.jpg")}}>View more</a>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item select1" style="position: absolute; left: 759px; top: 426px;">
                <div class="thumb">
                    <img class="img-fullwidth" src={{asset("site/assets/images/gallery/9.jpg")}} alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href={{asset("site/assets/images/gallery/9.jpg")}}><i class="fa fa-plus"></i></a>
                        <a href="#"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                  </div>
                  <a class="hover-link" data-lightbox="image" href={{asset("site/assets/images/gallery/9.jpg")}}>View more</a>
                </div>
              </div>
              <!-- Portfolio Item End -->
              
            </div>
            <!-- End Portfolio Gallery Grid -->
          </div>
        </div>
      </div>
    </section>

  </div>
@endsection