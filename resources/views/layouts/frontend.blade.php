<!DOCTYPE html>
<html lang="en" xmlns:livewire="">
<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/backend/plugins/fontawesome-free/css/all.min.css") }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/animate.css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/slick-carousel/slick/slick.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Styles -->
    @stack('style')
    <!-- Live Wire Style -->
    <livewire:styles />
</head>
<body>

<header id="site-header" class="site-header__v1">
    <div class="topbar border-bottom">
        <div class="container-fluid px-2 px-md-5 px-xl-8d75">
            <div class="topbar__nav d-md-flex justify-content-between align-items-center">
                <ul class="topbar__nav--left nav ml-md-n3"></ul>
                <ul class="topbar__nav--right nav mr-md-n3 justify-content-end">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('wishlist') }}" class="nav-link link-black-100">
                                <i class="glph-icon flaticon-heart"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link link-black-100">
                                <i class="glph-icon flaticon-user"></i>
                            </a>
                        </li>
                    @else
                        <li class="nav-item pt-2 pb-2">
                            <a href="{{ route('login') }}" class="nav-link font-size-1 d-inline px-0">
                                Sign In
                            </a>
                            <span class="font-size-1">/</span>
                            <a href="{{ route('register') }}" class="nav-link font-size-1 d-inline pl-0">
                                Sign Up
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
    <div class="masthead border-bottom position-relative" style="margin-bottom: -1px;">
        <div class="container-fluid px-3 px-md-5 px-xl-8d75 py-2 py-md-0">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="" width="45px">
                    </a>
                    <a class="navbar-brand font-size-5 font-weight-medium mt-2" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav"></ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('book-list') }}" class="nav-link">Books</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Categories
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @forelse($share_categories as $category)
                                        <a href="{{ route('book-list', ['category' => $category->slug]) }}" class="dropdown-item link-black-100">{{ $category->name }}</a>
                                    @empty
                                    @endforelse
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container-fluid pb-md-4">
            <div class="row justify-content-center px-0">
                <div class="col-md-5 col-sm-12 text-center px-0">
                    <form method="get" action="{{ route('book-list') }}">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="glph-icon flaticon-loupe input-group-text py-2d75 bg-white-100 border-white-100"></i>
                            </div>
                            <input name="search" class="form-control bg-white-100 w-100 py-2d75 height-4 border-white-100" type="search" placeholder="Search Books" aria-label="Search">
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0 sr-only" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer>
    <div class="border-top">
        <div class="space-1">
            <div class="container">
                <div class="d-lg-flex text-center text-lg-left justify-content-between align-items-center">

                    <p class="mb-3 mb-lg-0 font-size-2">©{{ date('Y') }} {{ config('app.name') }}. All rights reserved</p>

                    <div class="ml-auto d-lg-flex align-items-center">
                        <div class="mb-4 mb-lg-0 mr-5">
                            <a href="{{ url('/') }}">
                                <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}" width="32px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{ asset('assets/frontend/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/slick-carousel/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/multilevel-sliding-mobile-menu/dist/jquery.zeynep.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<script src="{{ asset('assets/frontend/js/hs.core.js') }}"></script>
<script src="{{ asset('assets/frontend/js/components/hs.unfold.js') }}"></script>
<script src="{{ asset('assets/frontend/js/components/hs.malihu-scrollbar.js') }}"></script>
<script src="{{ asset('assets/frontend/js/components/hs.header.js') }}"></script>
<script src="{{ asset('assets/frontend/js/components/hs.slick-carousel.js') }}"></script>
<script src="{{ asset('assets/frontend/js/components/hs.selectpicker.js') }}"></script>
<script src="{{ asset('assets/frontend/js/components/hs.show-animation.js') }}"></script>
<!-- Live Wire Script -->
<livewire:scripts />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

    @if(session()->has('success'))
    Toast.fire({
        icon: 'success',
        title:'{{ session()->get('success') }}'
    });
    @endif

    window.addEventListener('alert',({detail:{type,message}})=>{
        Toast.fire({
            icon:type,
            title:message
        })
    })
</script>

<script>
    $(document).on('ready', function () {
        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // init zeynepjs
        var zeynep = $('.zeynep').zeynep({
            onClosed: function () {
                // enable main wrapper element clicks on any its children element
                $("body main").attr("style", "");

                console.log('the side menu is closed.');
            },
            onOpened: function () {
                // disable main wrapper element clicks on any its children element
                $("body main").attr("style", "pointer-events: none;");

                console.log('the side menu is opened.');
            }
        });

        // handle zeynep overlay click
        $(".zeynep-overlay").click(function () {
            zeynep.close();
        });

        // open side menu if the button is clicked
        $(".cat-menu").click(function () {
            if ($("html").hasClass("zeynep-opened")) {
                zeynep.close();
            } else {
                zeynep.open();
            }
        });
    });
</script>
<!-- Script -->
@stack('script')
</body>
</html>
