@extends('home.home_master')
@section('home')
    <div class="breadcrumb-wrapper light-bg">
        <div class="container">
            <div class="breadcrumb-content">
                <h1 class="breadcrumb-title pb-0">{{ __('Наша команда') }}</h1>
                <div class="breadcrumb-menu-wrapper">
                    <div class="breadcrumb-menu-wrap">
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="{{ url('/')}}">{{ __('Главная') }}</a></li>
                                <li><img src="{{ asset('frontend/images/blog/right-arrow.svg') }}" alt="right-arrow"></li>
                                <li aria-current="page">{{ __('Наша команда') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="lonyo-section-padding9">
        <div class="container">
            <div class="lonyo-section-title max-w616">
                <h2>Meet our brilliant team members</h2>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="500">
                        <div class="lonyo-team-thumb">
                            <a href="single-team.html"><img src="{{ asset('frontend/images/about-us/t1.png') }}" alt=""></a>
                        </div>
                        <div class="lonyo-team-content2">
                            <a href="single-team.html">
                                <h6>Michael Chen</h6>
                            </a>
                            <p>Chief Executive Officer</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="700">
                        <div class="lonyo-team-thumb">
                            <a href="single-team.html">
                                <img src="{{ asset('frontend/images/about-us/t2.png') }}" alt="">
                            </a>
                        </div>
                        <div class="lonyo-team-content2">
                            <a href="single-team.html">
                                <h6>Alex Jonny</h6>
                            </a>
                            <p>Head of Product</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="900">
                        <div class="lonyo-team-thumb">
                            <a href="single-team.html">
                                <img src="{{ asset('frontend/images/about-us/t3.png') }}" alt="">
                            </a>
                        </div>
                        <div class="lonyo-team-content2">
                            <a href="single-team.html">
                                <h6>William Smith</h6>
                            </a>
                            <p>Lead Software Engineer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="1100">
                        <div class="lonyo-team-thumb">
                            <a href="single-team.html">
                                <img src="{{ asset('frontend/images/about-us/t4.png') }}" alt="">
                            </a>
                        </div>
                        <div class="lonyo-team-content2">
                            <a href="single-team.html">
                                <h6>Frederick Taylor</h6>
                            </a>
                            <p>Data Security Officer</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-50 team-btn" data-aos="fade-up" data-aos-duration="700">
                <a href="contact-us.html" class="lonyo-default-btn team-btn2">Would you joint of our group?</a>
            </div>
        </div>
    </section>
    @include('home.homelayouts.apps')
@endsection