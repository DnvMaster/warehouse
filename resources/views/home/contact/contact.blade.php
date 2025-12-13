@extends('home.home_master')
@section('home')
    <div class="breadcrumb-wrapper light-bg">
        <div class="container">
            <div class="breadcrumb-content">
                <h1 class="breadcrumb-title pb-0">{{ __('Контакты') }}</h1>
                <div class="breadcrumb-menu-wrapper">
                    <div class="breadcrumb-menu-wrap">
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="{{ url('/')}}">{{ __('Главная') }}</a></li>
                                <li><img src="{{ asset('frontend/images/blog/right-arrow.svg') }}" alt="right-arrow"></li>
                                <li aria-current="page">{{ __('Контакты') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="lonyo-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="lonyo-default-content">
                        <h2>{{ __('Это просто. Как сказать нам здравствуйте!') }}</h2>
                        <p class="max-w616">{{ __('Вот как с нами можно связаться.') }}</p>
                        <div class="mt-50">

                            <div class="lonyo-contact-us-info-item ">
                                <div class="lonyo-contact-us-icon">
                                    <a href="mailto:name@email.com">
                                        <img src="{{ asset('frontend/images/contact-us/email.svg') }}" alt="">
                                    </a>
                                </div>
                                <div class="lonyo-contact-us-content">
                                    <a href="mailto:name@email.com">
                                        <h4>{{ __('Отправить электронное письмо') }}</h4>
                                        <p>support@warehouse.loc</p>
                                    </a>
                                </div>
                            </div>

                            <div class="lonyo-contact-us-info-item ">
                                <div class="lonyo-contact-us-icon">
                                    <a href="mailto:name@email.com">
                                        <img src="{{ asset('frontend/images/contact-us/phone.svg') }}" alt="">
                                    </a>
                                </div>
                                <div class="lonyo-contact-us-content">
                                    <a href="mailto:name@email.com">
                                        <h4>{{ __('Телефонный звонок') }}:</h4>
                                        <p>{{ __('+375-29-582-82-56') }}</p>
                                    </a>
                                </div>
                            </div>

                            <div class="lonyo-contact-us-info-item pb-0">
                                <div class="lonyo-contact-us-icon">
                                    <a href="mailto:name@email.com">
                                        <img src="{{ asset('frontend/images/contact-us/email.svg') }}" alt="">
                                    </a>
                                </div>
                                <div class="lonyo-contact-us-content">
                                    <h4>{{ __('Найдите нас') }}:</h4>
                                    <p>{{ __('Откройте Google карты') }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="lonyo-contact-box box2" data-aos="fade-up" data-aos-duration="700">
                        <h4>{{ __('Заполните форму ниже') }}</h4>
                        <form action="#">
                            @csrf
                            <div class="lonyo-main-field">
                                <p>{{ __('Полное имя') }} *</p>
                                <input type="text" placeholder="{{ __('Введите своё имя') }}">
                            </div>
                            <div class="lonyo-main-field">
                                <p>{{ __('Электронный адрес') }} *</p>
                                <input type="email" placeholder="{{ __('Введите свой электронный адрес') }}">
                            </div>

                            <p>{{ __('Ваше сообщение') }}</p>

                            <div class="lonyo-main-field-textarea">
                                <textarea class="button-text" name="textarea" placeholder="{{ __('Напишите своё сообщение') }}"></textarea>
                            </div>
                            <button class="lonyo-default-btn extra-btn d-block" type="button">{{ __('Отправить сообщение') }}</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="responsive-map">
        <iframe class="lonyo-contact-us-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889" width="600" height="450" allowfullscreen=""></iframe>
    </div>
    
    @include('home.homelayouts.answers')

    <div class="lonyo-content-shape">
        <img src="{{ asset('frontend/images/shape/shape2.svg') }}" alt="">
    </div>

@endsection