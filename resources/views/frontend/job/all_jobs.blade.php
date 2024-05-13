@extends('frontend.main_master')
@section('main')
@php
$job = App\Models\Job::latest()->get();
@endphp
<section class="featured-places">
    <div class="container">
        <div class="row">


            <div class="col-md-12 col-xs-12">
                <div class="row">
                    @foreach ($job as $item)

                    <div class="col-sm-6 col-xs-12">
                        <div class="featured-item">

                            <div class="thumb">
                                <div class="thumb-img">
                                   
                                       
                                        <a href="{{ url('job/details/'.$item->id) }}">
                                        <img src="{{ $item->getImage() }}" alt="">
                                        </a>
                                      
                                  
                                </div>

                                <div class="overlay-content">
                                    <strong title="Posted on"><i class="fa fa-calendar"></i>  {{ date('M d, Y', strtotime($item->created_at)) }}</strong>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <strong title="Location"><i class="fa fa-map-marker"></i> {{$item->place}}</strong>
                                </div>
                            </div>

                            <div class="down-content">
                                <h4>short_desc</h4>

                                <p> {{$item->level}}</p>

                                <p><span><strong><sup>$</sup>{{$item->price}}</strong></span></p>

                                <div class="text-button">
                                <a href="{{ url('job/details/'.$item->id) }}">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection