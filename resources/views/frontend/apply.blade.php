@extends('frontend.main_master')
@section('main')
<section class="banner banner-secondary" id="top"
    style="background-image: url(frontend/img/banner-image-3-1920x300.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="banner-caption">
                    <div class="line-dec"></div>
                    <h2>Apply this job</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="popular-places">
    <div class="container">
        <div class="contact-content">
            <div class="row">
                <div class="col-md-8">
                  
                    <form id="contact" action="{{route('apply.post')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email"
                                        placeholder="E-Mail Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message"
                                        placeholder="Your Message" required=""></textarea>
                                </fieldset>
                            </div>
                           
                            <div class="col-lg-12">
                                <div class="blue-button">
                                    <input type="submit" value="submit" >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection