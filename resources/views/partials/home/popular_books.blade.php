@if($popularBooks->count())
    <section class="space-bottom-3" xmlns:livewire="">
        <div class="container">
            <header class="mb-5 d-md-flex justify-content-between align-items-center">
                <h2 class="font-size-7 mb-3 mb-md-0">Most Popular Books</h2>
            </header>
            <div class="js-slick-carousel products no-gutters border-top border-left border-right"
                 data-pagi-classes="d-xl-none text-center position-absolute right-0 left-0 u-slick__pagination mt-4 mb-0"
                 data-arrows-classes="d-none d-xl-block u-slick__arrow u-slick__arrow-centered--y"
                 data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10"
                 data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10"
                 data-slides-show="5"
                 data-responsive='[{"breakpoint": 1500,"settings": {"slidesToShow": 4}},{"breakpoint": 1199,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 554,"settings": {"slidesToShow": 1}}]'>
                @foreach($popularBooks as $book)
                    <div class="product">
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
                                    <a href="" class="text-uppercase text-dark h-dark font-weight-medium mr-auto"></a>
                                    <livewire:frontend.wishlist :bookId="$book->id" :status="$book->wishlisted"/>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
