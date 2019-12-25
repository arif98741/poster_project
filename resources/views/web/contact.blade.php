@extends('layout.web.web') @section('title','Homepage') @section('content')

<!-- CAROUSEL -->

<!-- FIRST BLOCK -->
<div id="first-block">
    <div class="line">
        <h1>Amazing Responsive Business Template</h1>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
        <div class="s-12 m-4 l-2 center"><a class="white-btn" href="#contact">Contact Us</a></div>
    </div>
</div>
<!-- FEATURES -->
<div id="features">
    <div class="line">
        <div class="margin">
            <div class="s-12 m-6 l-3 margin-bottom">
                <i class="icon-tablet icon3x"></i>
                <h2>Fully responsive</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            </div>
            <div class="s-12 m-6 l-3 margin-bottom">
                <i class="icon-isight icon3x"></i>
                <h2>Clean design</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat adipiscing.</p>
            </div>
            <div class="s-12 m-6 l-3 margin-bottom">
                <i class="icon-star icon3x"></i>
                <h2>Valid code</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna erat volutpat.</p>
            </div>
            <div class="s-12 m-6 l-3 margin-bottom">
                <i class="icon-heart icon3x"></i>
                <h2>Totally free</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat nonummy.</p>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT US -->
@include('layout.web.lib.home.about-us') @include('layout.web.lib.home.our-work')
<!-- OUR WORK -->

<!-- SERVICES -->
@include('layout.web.lib.home.services')
<!-- LATEST NEWS -->
<div id="latest-news">
    <div class="line">
        <h2 class="section-title">Latest News</h2>
        <div class="margin">
            <div class="s-12 m-6 l-6">
                <div class="s-12 l-2">
                    <div class="news-date">
                        <p class="day">28</p>
                        <p class="month">AUGUST</p>
                        <p class="year">2015</p>
                    </div>
                </div>
                <div class="s-12 l-10">
                    <div class="news-text">
                        <h4>First latest News</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.
                        </p>
                    </div>
                </div>
            </div>
            <div class="s-12 m-6 l-6">
                <div class="s-12 l-2">
                    <div class="news-date">
                        <p class="day">12</p>
                        <p class="month">JULY</p>
                        <p class="year">2015</p>
                    </div>
                </div>
                <div class="s-12 l-10">
                    <div class="news-text">
                        <h4>Second latest News</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTACT -->

@include('web.contact')

<!-- MAP -->
@push('extra-css')
<link rel="stylesheet" href="{{asset('asset/front/owl-carousel/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('asset/front/owl-carousel/owl.theme.css')}}"> @endpush @push('extra-js')
<script type="text/javascript" src="{{asset('asset/front/owl-carousel/owl.carousel.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var theme_slider = $("#owl-demo");
        var owl = $('#owl-demo');
        owl.owlCarousel({
            nav: false,
            dots: true,
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 6000
        });
        var owl = $('#owl-demo2');
        owl.owlCarousel({
            nav: true,
            dots: false,
            items: 1,
            loop: true,
            navText: ["&#xf007", "&#xf006"],
            autoplay: true,
            autoplayTimeout: 4000
        });

        // Custom Navigation Events
        $(".next-arrow").click(function() {
            theme_slider.trigger('next.owl');
        })
        $(".prev-arrow").click(function() {
            theme_slider.trigger('prev.owl');
        })
    });
</script>
@endpush @endsection