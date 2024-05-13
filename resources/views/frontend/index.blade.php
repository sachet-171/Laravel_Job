@extends('frontend.main_master')
@section('main')
<section class="banner" id="top" style="background-image: url(frontend/img/homepage-banner-image-1920x700.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="banner-caption">
                    <div class="line-dec"></div>
                    <h2>Welcome to our Laravel Job Protal, where knowledge and creativity collide and opportunities
                        abound.
                    </h2>
                    <div class="blue-button">
                    <a href="{{route('fjob.all')}}">See Jobs</a>
                                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section start -->
@include('frontend.home.about')
<!-- about section end -->

<!-- job section start -->
@include('frontend.home.jobs')
<!-- job section end -->




<section id="video-container">
    <div class="video-overlay"></div>
    <div class="video-content">
        <div class="inner">
            <div class="section-heading">
                <span>Contact Us</span>
                <h2>Feel free to connect with us</h2>
            </div>
            <!-- Modal button -->

            <div class="blue-button">
                <a href="{{route('contact')}}">Talk to us</a>
            </div>
        </div>
    </div>
</section>

@endsection