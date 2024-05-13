@extends('frontend.main_master')
@section('main')
<section class="banner banner-secondary" id="top" style="background-image: url(frontend/img/banner-image-1-1920x300.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>About Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="our-services">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="left-content">
                    <br>
                    <h4>About us</h4>
                    <p>Welcome to Laravel Job Vacancy where Laravel expertise meets innovative solutions. Founded on the
                        principles of excellence and collaboration, we specialize in providing top-notch Laravel-based
                        job vacancies, internships, and beyond.<br><br>

                        Our dedicated team is committed to delivering tailored solutions that empower both businesses
                        and individuals to thrive in the dynamic world of tech. With a focus on fostering growth and
                        driving success, we continuously strive to exceed expectations and pave the way for innovation.
                        Join us in our journey as we shape the future of Laravel development and beyond.</p>
                   
                </div>
            </div>
            <div class="col-md-5">
                <img src="{{url('frontend/img/about.jpg')}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>
@endsection