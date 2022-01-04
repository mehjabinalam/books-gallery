@extends('layouts.frontend')

@section('content')
    <div id="primary" class="content-area" xmlns:livewire="">
        <main id="main" class="site-main ">
            <div class="product">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-md-5 woocommerce-product-gallery woocommerce-product-gallery--with-images images">
                            <figure class="woocommerce-product-gallery__wrapper pt-8 mb-0">
                                <div class="js-slick-carousel u-slick"
                                     data-pagi-classes="text-center u-slick__pagination my-4">
                                    <div class="js-slide">
                                        <img src="{{ $book->cover_image_url }}" alt="Image Description"
                                             class="mx-auto img-fluid">
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-md-7 pl-0 summary entry-summary border-left">
                            <div class="space-top-2 px-4 px-xl-7 border-bottom pb-5">
                                <h1 class="product_title entry-title font-size-7 mb-3">{{ $book->name }}</h1>
                                <div class="woocommerce-product-details__short-description font-size-2 mb-5 text-justify">
                                    <p class="">{!! $book->description !!}</p>
                                </div>
                            </div>
                            <div class="px-4 px-xl-7 py-5 d-flex align-items-center">
                                <ul class="list-unstyled nav">
                                    <li class="mr-6 mb-4 mb-md-0">
                                        <livewire:frontend.wishlist :bookId="$book->id" :status="true" :showText="true"/>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="js-scroll-nav mb-10">
                    <div class="woocommerce-tabs wc-tabs-wrapper  2 mx-lg-auto">
                        <div class="">
                            <div class="border-bottom"></div>
                            <div class="tab-content font-size-2 container pb-5">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2">
                                        <div
                                            class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9">
                                            <h2 class="">PDF </h2>
                                            <div id="viewer" style="height: 100vh;"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="ProductReviews" class="">
                            <div class="border-bottom"></div>
                            <div class="tab-content font-size-2 container">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2">
                                        <div
                                            class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9">
                                            <h2 class="">Reviews </h2>
                                            <ul class="list-unstyled mb-8">
                                                @forelse($book->reviews as $review)
                                                    <li class="border-top">
                                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                                            <h5 class="mb-0">{{ $review->reviewedBy->name }}</h5>
                                                            @if($book->auth_user_review && $book->auth_user_review->id == $review->id)
                                                                <div>
                                                                    <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    @include('partials.review.review-update')
                                                                    <a class="btn btn-sm btn-outline-primary" href="" onclick="event.preventDefault(); document.getElementById('review-delete-form').submit();">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>

                                                                    <form action="{{ route('review.store', $review->id) }}" method="post">

                                                                    </form>
                                                                    <form id="review-delete-form" action="{{ route('review.delete', $review->id) }}" method="POST" class="d-none">
                                                                        @csrf @method('delete')
                                                                    </form>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <p class="mb-4 text-lh-md">{{ $review->review }}</p>
                                                        <div class="text-gray-600 mb-4">{{ $review->created_at->diffForHumans(\Carbon\Carbon::now(), ['long' => true, 'parts' => 4])  }}</div>
                                                    </li>
                                                @empty
                                                    <li class="mb-4 pb-5 border-top">
                                                        <div class="d-flex align-items-center mb-3">
                                                            <h4 class="mb-0 p-3 text-gray-500">No Review Found</h4>
                                                        </div>
                                                    </li>
                                                @endforelse
                                            </ul>
                                            @if(!$book->auth_user_review)
                                                <h4 class="font-size-3 mb-4">Write a Review</h4>
                                                <form action="{{ route('review.store') }}" method="post">
                                                    @csrf
                                                    <div class="js-form-message form-group mb-4">
                                                        <input type="hidden" name="book" value="{{ $book->id }}">
                                                        <label for="descriptionTextarea" class="form-label text-dark h6 mb-3">Details
                                                            please! Your review helps us.</label>
                                                        <textarea class="form-control rounded-0 p-4"
                                                                  rows="7"
                                                                  name="review"
                                                                  id="descriptionTextarea"
                                                                  placeholder="What did you like or dislike?"
                                                                  required data-msg="Please enter your message."
                                                                  data-error-class="u-has-error"
                                                                  data-success-class="u-has-success"></textarea>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="submit" class="btn btn-dark btn-wide rounded-0 transition-3d-hover">
                                                            Submit Review
                                                        </button>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
@endsection

@push('script')
    <script src="{{ asset('pdf/webviewer.min.js') }}"></script>
    <script>
        WebViewer({
            path: '/pdf/', // path to the PDF.js Express'lib' folder on your server
            licenseKey: 'TqHQE5ciGs6Eo8sffs50',
            initialDoc: '{{ $book->pdf_url }}',
            // initialDoc: '/path/to/my/file.pdf',  // You can also use documents on your server
        }, document.getElementById('viewer'))
            .then(instance => {
                // now you can access APIs through the WebViewer instance
                const { Core, UI } = instance;

                // adding an event listener for when a document is loaded
                Core.documentViewer.addEventListener('documentLoaded', () => {
                    console.log('document loaded');
                });

                // adding an event listener for when the page number has changed
                Core.documentViewer.addEventListener('pageNumberUpdated', (pageNumber) => {
                    console.log(`Page number is: ${pageNumber}`);
                });
            });
    </script>
@endpush
