@extends('layouts.app')

@section('content')
    <!-- Navbar -->
    <nav class="nav navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Chatify</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <div class="side-one">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </div>
                <div class="side-two">
                    @if (Route::has('login'))
                        @auth
                            {{-- <a href="{{ url('/home') }}">Home</a> --}}
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                            </li>
                            <li class="nav-item active">
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form action='{{ route('logout') }}' method='post' id="logout-form">
                                    @csrf
                                </form>
                            </li>
                            {{-- <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form action='{{ route('logout') }}' method='post' id="logout-form">
                        @csrf
                    </form> --}}
                        @else
                            {{-- <a href="{{ route('login') }}">Log in</a> --}}
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/login') }}">Login</a>
                            </li>
                            {{-- <a href="{{ route('register') }}">Register</a> --}}
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif
                </div>
            </ul>
        </div>
    </nav>

    <!-- Testimonial section -->
    <section class="testimonial-section">
        <div class="col-md-11">
            <h2>What our customers are saying</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"Chatify has revolutionized the way we communicate with our team. It's easy to use and has all
                            the features we need."</p>
                        <p class="testimonial-author">John Doe, CEO of Acme Inc.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"I love Chatify! It's so much better than our old chat app. The interface is clean and
                            intuitive."</p>
                        <p class="testimonial-author">Jane Smith, Marketing Manager at XYZ Corp.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"Chatify has made it easy for us to collaborate with our remote team members. We can share files
                            and have video calls all in one place."</p>
                        <p class="testimonial-author">Bob Johnson, CTO of 123 Industries</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing section -->
    <section class="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Pricing</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="pricing-card">
                        <h3>Basic</h3>
                        <p class="price">$9.99/month</p>
                        <ul>
                            <li>Up to 10 users</li>
                            <li>Unlimited messages</li>
                            <li>Basic features</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Sign Up</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card">
                        <h3>Pro</h3>
                        <p class="price">$19.99/month</p>
                        <ul>
                            <li>Up to 50 users</li>
                            <li>Unlimited messages</li>
                            <li>Advanced features</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Sign Up</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card">
                        <h3>Enterprise</h3>
                        <p class="price">$99.99/month</p>
                        <ul>
                            <li>Unlimited users</li>
                            <li>Unlimited messages</li>
                            <li>Premium features</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="footer-links">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <p>&copy; 2023 Chatify</p>
                </div>
            </div>
        </div>
    </footer>
@endsection

