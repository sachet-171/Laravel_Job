<div class="wrap">
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button id="primary-nav-button" type="button">Menu</button>
                    <a href="{{url('/')}}">
                        <div class="logo">
                            <img src="{{url('frontend/img/logo.png')}}" style="height:100px; width:100px;" alt="Venue Logo">
                        </div>
                    </a>
                    <nav id="primary-nav" class="dropdown cf">
                        <ul class="dropdown menu">
                            <li class='active'><a href="{{url('/')}}">Home</a></li>
                            @php
                        $job = App\Models\Job::latest()->get();
                        @endphp
                            <li><a href="{{route('fjob.all')}}">Jobs</a></li>
                            <li>
                                <a href="{{route('about')}}">About</a>
                            </li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                            @if(auth()->check() && auth()->user()->role === 'user')
                            <li><a href="#" style="color:green">{{ auth()->user()->name }}</a></li>
                            <li><form method="POST" action="{{ route('user.logout') }}">
    @csrf <!-- CSRF token -->
    <button type="submit" class="btn btn-primary">Logout</button>
</form>
</li>
                            @else
                            <li><a href="{{ route('login') }}">
                                    <p class="btn btn-primary">Login</p>
                                </a></li>
                            <li><a href="{{ route('register') }}">
                                    <p class="btn btn-info">Register</p>
                                </a></li>
                            @endif

                        </ul>
                    </nav><!-- / #primary-nav -->
                </div>
            </div>
        </div>
    </header>
</div>