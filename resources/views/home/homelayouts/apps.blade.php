@php
    $apps = App\Models\App::find(1); 
@endphp
<section class="lonyo-cta-section bg-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="lonyo-cta-thumb" data-aos="fade-up" data-aos-duration="500">
                    <img src="{{ asset('frontend/images/v1/cta-thumb.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="lonyo-default-content lonyo-cta-wrap" data-aos="fade-up" data-aos-duration="700">
                    <h2>{{ $apps->title }}</h2>
                    <p>{{ $apps->description }}</p>
                    <div class="lonyo-cta-info mt-50" data-aos="fade-up" data-aos-duration="900">
                        <ul>
                          <li><a href="https://www.apple.com/app-store/"><img src="{{ asset($apps->image) }}" alt="{{ $apps->title }}"></a></li>
                          <li><a href="https://playstore.com/"><img src="{{ asset('frontend/images/v1/play-store.svg') }}" alt=""></a></li>
                        </ul>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</section>