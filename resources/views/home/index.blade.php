@extends('home.home_master')
@section('home')
  @include('home.homelayouts.sliders')
  @include('home.homelayouts.features')
  @include('home.homelayouts.clarifies')
  <div class="lonyo-content-shape3">
    <img src="{{ asset('frontend/images/shape/shape2.svg') }}" alt="">
  </div>
  @include('home.homelayouts.usability')
  <div class="lonyo-content-shape1">
    <img src="{{ asset('frontend/images/shape/shape3.svg') }}" alt="">
  </div>
  @include('home.homelayouts.review')
  @include('home.homelayouts.answers')
  <div class="lonyo-content-shape3">
    <img src="{{ asset('frontend/images/shape/shape2.svg') }}" alt="">
  </div>
  @include('home.homelayouts.apps')
@endsection