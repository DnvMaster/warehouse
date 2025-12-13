@extends('home.home_master')
@section('home')
    <div class="breadcrumb-wrapper light-bg">
        <div class="container">
            <div class="breadcrumb-content">

                <h1 class="breadcrumb-title pb-0">{{ __('Блог') }}</h1>
                <div class="breadcrumb-menu-wrapper">
                    <div class="breadcrumb-menu-wrap">
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="{{ url('/')}}">{{ __('Главная') }}</a></li>
                                <li><img src="{{ asset('frontend/images/blog/right-arrow.svg') }}" alt="right-arrow"></li>
                                <li aria-current="page">{{ __('Блог') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="lonyo-section-padding9 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach($blog_post as $post)
                        <div class="lonyo-blog-wrap mb-0" data-aos="fade-up" data-aos-duration="900">
                            <div class="lonyo-blog-thumb">
                                <img src="{{ asset($post->image) }}" alt="{{ $post->post_title }}">
                            </div>
                            <div class="lonyo-blog-meta">
                                <ul>
                                    <li><img src="{{ asset('frontend/images/blog/date.svg') }}" alt="{{ __('Календарь')}}"> {{ $post->created_at->format('d m Y') }}</li>
                                </ul>
                            </div>
                            <div class="lonyo-blog-content">
                                <h2>{{ $post->post_title }}</h2>
                                <p>{{  Str::limit($post->long_description, 200, '...') }}</p>
                            </div>
                        </div>
                    @endforeach

                    <div class="lonyo-pagination center">
                        <a class="pagi-btn btn2" href="single-blog.html">
                            <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.75 0.75L6 6L0.75 11.25" stroke="#001A3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <ul>
                            <li><a class="current" href="#">1</a></li>
                            <li><a href="single-blog.html">2</a></li>
                            <li><a href="single-blog.html">3</a></li>
                        </ul>
                            <a class="pagi-btn" href="single-blog.html">
                                <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.75 0.75L6 6L0.75 11.25" stroke="#001A3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="lonyo-blog-sidebar" data-aos="fade-left" data-aos-duration="700">

                            <div class="lonyo-blog-widgets">
                                <form action="#">
                                    @csrf
                                    <div class="lonyo-search-box">
                                        <input type="search" placeholder="{{ __('Поиск по ключевому слову ...') }}">
                                        <button id="lonyo-search-btn" type="button"><i class="ri-search-line"></i></button>
                                    </div>
                                </form>
                            </div>

                            <div class="lonyo-blog-widgets">
                                <h4>{{ __('Категории') }}:</h4>
                                <div class="lonyo-blog-categorie">
                                    <ul>
                                        @foreach ($blog_category as $category)
                                            <li><a href="">{{ $category->category_name }} <span>({{ $category->posts_count }})</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="lonyo-blog-widgets">
                                <h4>{{ __('Последний пост') }}</h4>
                            </div>
                            @foreach($blog_post as $post)
                                <a class="lonyo-blog-recent-post-item" href="single-blog.html">
                                    <div class="lonyo-blog-recent-post-thumb">
                                        <img style="width: 150px; height: 120px"; src="{{ asset($post->image) }}" alt="{{ __('Изображение поста') }}">
                                    </div>
                                    <div class="lonyo-blog-recent-post-data">
                                        <ul><li><img src="{{ asset('frontend/images/blog/date.svg') }}" alt="{{ __('Время поста') }}">{{ $post->created_at->format('d m Y') }}</li></ul>
                                        <h4>{{ Str::limit($post->long_description, 27, '...') }}</h4>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="lonyo-content-shape">
        <img src="{{ asset('frontend/images/shape/shape2.svg') }}" alt="">
    </div>
@endsection