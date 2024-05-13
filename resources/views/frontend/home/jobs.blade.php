@php
$job = App\Models\Job::latest()->limit(6)->get();
@endphp
<section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>Featured Jobs</span>
                            <h2>See jobs and secure your postion on laravel framework</h2>
                        </div>
                    </div> 
                </div> 

                <div class="row">
                @foreach ($job as $item)

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                @if(!empty($item->getImage()))
                                    <img src="{{ $item->getImage() }}" alt="">
                                    @endif
                                </div>

                                <div class="overlay-content">
                                 <strong title="Posted on"><i class="fa fa-calendar"></i> {{ date('M d, Y', strtotime($item->created_at)) }} </strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Location"><i class="fa fa-map-marker"></i>{{ $item->place }}</strong>
                                </div>
                            </div>

                            <div class="down-content">
                                <h4>short_desc </h4>

                                <p>{{ $item->level }}</p>

                                <p><span><strong><sup>$</sup>{{ $item->price }}</strong></span></p>

                                <div class="text-button">
                                    <a href="{{ url('job/details/'.$item->id) }}">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
@endforeach
              
                </div>
            </div>
        </section>