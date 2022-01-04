@extends('layouts.frontend')

@section('content')
    <div class="py-5">
        <section class="space-bottom-3">
            @if($books->count())
                <header class="mb-4 container">
                    <h2 class="font-size-7 text-center">Books</h2>
                </header>
                <div class="container">
                    <div class="tab-content" id="featuredBooksContent">
                        <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                            <ul class="products list-unstyled row no-gutters row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-wd-6 border-top border-left my-0">
                                @foreach($books as $book)
                                    <li class="product col">
                                        <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                                <div class="woocommerce-loop-product__thumbnail">
                                                    <a href="{{ route('book-details', $book->slug) }}" class="d-block">
                                                        <img src="{{ $book->cover_image_url }}"
                                                             class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                             alt="{{ $book->name }}">
                                                    </a>
                                                </div>
                                                <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                    <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                        <a href="{{ route('book-details', $book->slug) }}">{{ $book->short_name }}</a>
                                                    </h2>
                                                </div>
                                                <div class="product__hover d-flex align-items-center">
                                                    <a href=""
                                                       class="text-uppercase text-dark h-dark font-weight-medium mr-auto" data-toggle="tooltip" data-placement="right" title="ADD TO CART"></a>
                                                    <livewire:frontend.wishlist :bookId="$book->id" :status="$book->wishlisted"/>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                {{ $books->links('partials.pagination.custom') }}
            @else
                <div class="h-80">
                    <h3 class="text-center">No books available</h3>
                </div>
            @endif
        </section>
    </div>
@endsection
