@extends('home.home_master')
@section('home')
    @php
        $teams = App\Models\Team::latest()->get();   
    @endphp
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
                <h2>Топ самых лучших надёжных клиентов</h2>
            </div>
            <div class="row">
                @foreach ($teams as $team)
                    <div class="col-lg-3 col-md-6">
                    <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="700">
                        <div class="lonyo-team-thumb">
                            <img src="{{ asset($team->image) }}" alt="{{ $team->name}}"></a>
                        </div>
                        <div class="lonyo-team-content2">
                            <h6>{{ $team->name }}</h6>
                            <p>{{ $team->position }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-50 team-btn" data-aos="fade-up" data-aos-duration="700">
                <a href="contact-us.html" class="lonyo-default-btn team-btn2">Would you joint of our group?</a>
            </div>
        </div>
    </section>
    @include('home.homelayouts.apps')
@endsection