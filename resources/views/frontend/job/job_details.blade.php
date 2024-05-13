@extends('frontend.main_master')
@section('main')
<section class="featured-places">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-3 col-xs-12">
                    <div>
                    @if(!empty($jobdetails->getImage()))
                      <img src="{{ $jobdetails->getImage() }}"  alt="" class="img-responsive wc-image">
                      @endif
                    </div>
                    <br>
                  </div>

                  <div class="col-lg-9 col-md-9 col-xs-12">
                    <h2><strong class="text-primary">${{$jobdetails->price}} </strong></h2>

                    <p class="lead">
                     <i class="fa fa-map-marker"></i> {{$jobdetails->place}} &nbsp;&nbsp;
                     <i class="fa fa-calendar"></i>  {{ date('M d, Y', strtotime($jobdetails->created_at)) }} &nbsp;&nbsp;
                     <i class="fa fa-file"></i> {{$jobdetails->level}} 
                    </p>

                    <div class="blue-button">
                          <a href="{{route('apply')}}">Apply for this job</a>
                      </div>
                  </div>
                </div>

                <div class="accordions">
                    <ul class="accordion">
                        <li>
                            <a class="accordion-trigger">Job Description</a>
                            
                            <div class="accordion-content">
                            {{$jobdetails->description}} 
                        </div>
                        </li>
                        
                        <li>
                            <a class="accordion-trigger">Contact Details</a>

                            <div class="accordion-content">
                              <p>
                                  <span>Name</span>

                                  <br>

                                  <strong> {{$jobdetails->name}} </strong>

                              </p>

                              <p>
                                  <span>Phone</span>

                                  <br>
                                  
                                  <strong>
                                    <a href="tel:{{$jobdetails->contact}} ">{{$jobdetails->contact}} </a>
                                  </strong>
                              </p>

                              <p>
                                <span>Email</span>

                                <br>
                                
                                <strong>
                                  <a href="mailto:{{$jobdetails->email}} ">{{$jobdetails->email}} </a>
                                </strong>
                              </p>

                              <p>
                                <span>Website</span>

                                <br>
                                
                                <strong>
                                  <a href="{{$jobdetails->website}} ">{{$jobdetails->website}} </a>
                                </strong>
                              </p>
                            </div>
                        </li>
                    </ul> <!-- / accordion -->
                </div>
                <h4>Leave a comment</h4>
        @auth
        <div class="row">
            <div class="col-md-8">
<ol>
    @foreach($jobdetails->comments as $comment)
    <li>
        <b>{{$comment->user->name}}</b>
        <p>{{$comment->comment}}</p>
    </li>
    @endforeach
</ol>
                <form id="contact" action="{{route('comment')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset>
                                <textarea name="comment" id="comment" rows="6" class="form-control"
                                    placeholder="Your Message" required=""></textarea>

                                <input type="hidden" name="jobs_id" value="{{$jobdetails->id}}">
                                <input type="hidden" name="parent_id" value="">

                                @error('comment')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <div class="blue-button">
                                <input type="submit" name="submit" value="Post Comment">
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
        @else
        <div class="row  my-5">
            <div class="col-md-8 border-primary">
                <div class="card">
                    <div class="card-body">
                        <h4>please <a class="text-primary" href="{{route('login')}}">login</a> to comment the post</h4>

                    </div>
                </div>
            </div>


        </div>
        @endauth
            </div>
        </section>
        @endsection