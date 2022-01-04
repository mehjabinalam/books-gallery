@extends('layouts.frontend')

@section('content')
    <section class="space-bottom-3">
        <div class="bg-gray-200 space-2 space-lg-0 bg-img-hero" style="background-image: url({{ asset('assets/frontend/img/1920x588/img1.jpg') }});">
            <div class="container">
                <div class="js-slick-carousel u-slick" data-pagi-classes="text-center u-slick__pagination position-absolute right-0 left-0 mb-n8 mb-lg-4 bottom-0">
                    <div class="js-slide">
                        <div class="hero row min-height-588 align-items-center">
                            <div class="col-lg-7 col-wd-6 mb-4 mb-lg-0">
                                <div class="media-body mr-wd-4 align-self-center mb-4 mb-md-0">
                                    <p class="hero__pretitle text-uppercase font-weight-bold text-gray-400 mb-2" data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">Stephen King'</p>
                                    <h2 class="hero__title font-size-14 mb-4" data-scs-animation-in="fadeInUp" data-scs-animation-delay="300">
                                        <span class="hero__title-line-1 font-weight-regular d-block">Books are uniquely portable magic.</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="col-lg-5 col-wd-6" data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
                                <img class="img-fluid" src="{{ asset('assets/frontend/img/800x420/img1.png') }}" alt="image-description">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('partials.home.popular_books')
    @include('partials.home.books')
@endsection
