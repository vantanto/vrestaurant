@extends('layouts.app')
@section('content')
<!-- Slide1 -->
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            @isset($banners[0])
            <div class="item-slick1 item1-slick1 lazyload" data-original="{{ Storage::disk('public')->url($banners[0]->image) }}">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                        Welcome to
                    </span>

                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                        {{ config('app.name') }}
                    </h2>

                    <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                        <!-- Button1 -->
                        <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                            Look Menu
                        </a>
                    </div>
                </div>
            </div>
            @endisset

            @isset($banners[1])
            <div class="item-slick1 item2-slick1 lazyload" data-original="{{ Storage::disk('public')->url($banners[1]->image) }}">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
                        Welcome to
                    </span>

                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                        {{ config('app.name') }}
                    </h2>

                    <div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
                        <!-- Button1 -->
                        <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                            Look Menu
                        </a>
                    </div>
                </div>
            </div>
            @endisset

            @isset($banners[2])
            <div class="item-slick1 item3-slick1 lazyload" data-original="{{ Storage::disk('public')->url($banners[2]->image) }}">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                        Welcome to
                    </span>

                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                        {{ config('app.name') }}
                    </h2>

                    <div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
                        <!-- Button1 -->
                        <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                            Look Menu
                        </a>
                    </div>
                </div>
            </div>
            @endisset

        </div>

        <div class="wrap-slick1-dots"></div>
    </div>
</section>

<!-- Welcome -->
<section class="section-welcome bg1-pattern p-t-120 p-b-105">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-t-45 p-b-30">
                <div class="wrap-text-welcome t-center">
                    <span class="tit2 t-center">
                        {{ $about_main->title }}
                    </span>

                    <h3 class="tit3 t-center m-b-35 m-t-5">
                        Welcome
                    </h3>

                    <p class="t-center m-b-22 size3 m-l-r-auto">
                        {{ $about_main->description_short }}
                    </p>

                    <a href="about.html" class="txt4">
                        Our Story
                        <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-6 p-b-30">
                <div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
                    <a href="#"><img data-original="{{ Storage::disk('public')->url($about_main->image) }}" class="lazyload" alt="IMG-INTRO"></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Intro -->
<section class="section-intro">
    <div class="header-intro parallax100 t-center p-t-135 p-b-158 lazyload" data-original="{{ Storage::disk('public')->url('images/about/bg-intro-01.jpg') }}">
        <span class="tit2 p-l-15 p-r-15">
            Discover
        </span>

        <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
            {{ config('app.name') }} Place
        </h3>
    </div>

    <div class="content-intro bg-white p-t-77 p-b-133">
        <div class="container">
            <div class="row">
                @foreach($abouts as $about)
                <div class="col-md-4 p-t-30">
                    <!-- Block1 -->
                    <div class="blo1">
                        <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                            <a href="#"><img data-original="{{ Storage::disk('public')->url($about->image) }}" class="lazyload" alt="IMG-INTRO"></a>
                        </div>

                        <div class="wrap-text-blo1 p-t-35">
                            <a href="#">
                                <h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                    {{ $about->title }}
                                </h4>
                            </a>

                            <p class="m-b-20">
                                {{ $about->description_short }}
                            </p>

                            <a href="#" class="txt4">
                                Learn More
                                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Our menu -->
<section class="section-ourmenu bg2-pattern p-t-115 p-b-120">
    <div class="container">
        <div class="title-section-ourmenu t-center m-b-22">
            <span class="tit2 t-center">
                Discover
            </span>

            <h3 class="tit5 t-center m-t-2">
                Our Menu
            </h3>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @foreach ($menus->take(3) as $menu)
                    <div class="{{ $loop->iteration == 3 ? 'col-12' : 'col-sm-6' }}">
                        <!-- Item our menu -->
                        <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                            <a href="#"><img data-original="{{ Storage::disk('public')->url($menu->image) }}" class="lazyload" alt="IMG-INTRO"></a>

                            <!-- Button2 -->
                            <a href="#" class="btn2 flex-c-m txt5 ab-c-m size{{ $loop->iteration + 3 }}">
                                {{ $menu->name }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    @foreach ($menus->take(-3) as $menu)
                    <div class="col-12">
                        <!-- Item our menu -->
                        <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                            <a href="#"><img data-original="{{ Storage::disk('public')->url($menu->image) }}" class="lazyload" alt="IMG-INTRO"></a>

                            <!-- Button2 -->
                            <a href="#" class="btn2 flex-c-m txt5 ab-c-m size{{ $loop->iteration + 6 }}">
                                {{ $menu->name }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>


<!-- Event -->
<section class="section-event">
    <div class="wrap-slick2">
        <div class="slick2">
            @foreach ($events_upcomings as $event_upcom)
            <div class="item-slick2 item1-slick2 lazyload" data-original="{{ Storage::disk('public')->url($event_upcom->bg_image) }}">
                <div class="wrap-content-slide2 p-t-115 p-b-208">
                    <div class="container">
                        <!-- - -->
                        <div class="title-event t-center m-b-52">
                            <span class="tit2 p-l-15 p-r-15">
                                Upcomming
                            </span>

                            <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                Events
                            </h3>
                        </div>

                        <!-- Block2 -->
                        <div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="@if($loop->iteration == 1) zoomIn @elseif($loop->iteration == 2) fadeInDown @else rotateInUpLeft @endif">
                            <!-- Pic block2 -->
                            <a href="#" class="wrap-pic-blo2 bg1-blo2 lazyload" data-original="{{ Storage::disk('public')->url($event_upcom->image) }}">
                                <div class="time-event size10 txt6 effect1">
                                    <span class="txt-effect1 flex-c-m t-center">
                                        {{ date('h:i A l - d F Y', strtotime($event_upcom->date_start)) }}
                                    </span>
                                </div>
                            </a>

                            <!-- Text block2 -->
                            <div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
                                <h4 class="tit7 t-center m-b-10">
                                    {{ $event_upcom->title }}
                                </h4>

                                <p class="t-center">
                                    {{ $event_upcom->description }}
                                </p>

                                <div class="flex-sa-m flex-w w-full m-t-40 clockdiv" data-date="{{ $event_upcom->date_start }}">
                                    <div class="size11 flex-col-c-m">
                                        <span class="dis-block t-center txt7 m-b-2 days">24</span>
                                        <span class="dis-block t-center txt8">Days</span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                        <span class="dis-block t-center txt7 m-b-2 hours">12</span>
                                        <span class="dis-block t-center txt8">Hours</span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                        <span class="dis-block t-center txt7 m-b-2 minutes">50</span>
                                        <span class="dis-block t-center txt8">Minutes</span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                        <span class="dis-block t-center txt7 m-b-2 seconds">56</span>
                                        <span class="dis-block t-center txt8">Seconds</span>
                                    </div>
                                </div>

                                <a href="#" class="txt4 m-t-40">
                                    View Details
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="wrap-slick2-dots"></div>
    </div>
</section>

<!-- Booking -->
<section id="reservation" class="section-booking bg1-pattern p-t-100 p-b-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-b-30">
                <div class="t-center">
                    <span class="tit2 t-center">
                        Reservation
                    </span>

                    <h3 class="tit3 t-center m-b-35 m-t-2">
                        Book table
                    </h3>
                </div>

                @if ($errors->reservations->any())
                    <div class="wrap-form-booking">
                        <ul class="text-danger">
                            @foreach ($errors->reservations->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('members.reservations.store') }}" class="wrap-form-booking">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Date -->
                            <span class="txt9">Date</span>
                            <div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="text" name="date" required>
                                <i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
                            </div>

                            <!-- Time -->
                            <span class="txt9">Time</span>
                            <div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <!-- Select2 -->
                                <select class="selection-1" name="time" required>
                                    @foreach ($times as $time)
                                        <option value="{{ $time->time }}">{{ date('H:i', strtotime($time->time)) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- People -->
                            <span class="txt9">People</span>
                            <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <!-- Select2 -->
                                <select class="selection-1" name="people" required>
                                    @for ($i=1; $i<=12; $i++)
                                        <option value="{{ $i }}">{{ $i }} person</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Name -->
                            <span class="txt9">Name</span>
                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name" required>
                            </div>

                            <!-- Phone -->
                            <span class="txt9">Phone</span>
                            <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" placeholder="Phone" required>
                            </div>

                            <!-- Email -->
                            <span class="txt9">Email</span>
                            <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                    </div>

                    <div class="wrap-btn-booking flex-c-m m-t-6">
                        <!-- Button3 -->
                        <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                            Book Table
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 p-b-30 p-t-18">
                <div class="wrap-pic-booking size2 bo-rad-10 hov-img-zoom m-l-r-auto">
                    <img data-original="{{ Storage::disk('public')->url('images/booking-01.jpg') }}" class="lazyload" alt="IMG-OUR">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Review -->
<section class="section-review p-t-115">
    <!-- - -->
    <div class="title-review t-center m-b-2">
        <span class="tit2 p-l-15 p-r-15">
            Customers Say
        </span>

        <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
            Review
        </h3>
    </div>

    <!-- - -->
    <div class="wrap-slick3">
        <div class="slick3">
            @foreach ($reviews as $review)
                <div class="item-slick3 item1-slick3">
                    <div class="wrap-content-slide3 p-b-50 p-t-50">
                        <div class="container">
                            <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
                                <img data-original="{{ Storage::disk('public')->url($review->image) }}" class="lazyload" alt="IGM-AVATAR">
                            </div>

                            <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                                <p class="t-center txt12 size15 m-l-r-auto">
                                    {{ $review->comment }}
                                </p>

                                <div class="star-review fs-18 color0 flex-c-m m-t-12">
                                    @for($i=1; $i<=$review->rating; $i++)
                                        <i class="fa fa-star @if($i != 1) p-l-1 @endif" aria-hidden="true"></i>
                                    @endfor
                                </div>

                                <div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
                                    {{ $review->name }} ˗ {{ $review->city }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="wrap-slick3-dots m-t-30"></div>
    </div>
</section>


<!-- Video -->
<section class="section-video parallax100 lazyload" data-original="{{ Storage::disk('public')->url('images/bg-cover-video-02.jpg') }}">
    <div class="content-video t-center p-t-225 p-b-250">
        <span class="tit2 p-l-15 p-r-15">
            Discover
        </span>

        <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
            Our Video
        </h3>

        <div class="btn-play ab-center size16 hov-pointer m-l-r-auto m-t-43 m-b-33" data-toggle="modal" data-target="#modal-video-01">
            <div class="flex-c-m sizefull bo-cir bgwhite color1 hov1 trans-0-4">
                <i class="fa fa-play fs-18 m-l-2" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</section>


<!-- Blog -->
<section class="section-blog bg-white p-t-115 p-b-123">
    <div class="container">
        <div class="title-section-ourmenu t-center m-b-22">
            <span class="tit2 t-center">
                Latest News
            </span>

            <h3 class="tit5 t-center m-t-2">
                The Blog
            </h3>
        </div>

        <div class="row">
            @foreach ($last_blogs as $last_blog)
                <div class="col-md-4 p-t-30">
                    <!-- Block1 -->
                    <div class="blo1">
                        <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
                            <a href="{{ route('members.blogs.show', $last_blog->slug) }}"><img data-original="{{ Storage::disk('public')->url($last_blog->bg_image) }}" class="lazyload" alt="IMG-INTRO"></a>

                            <div class="time-blog">
                                {{ date('d M Y', strtotime($last_blog->published)) }}
                            </div>
                        </div>

                        <div class="wrap-text-blo1 p-t-35">
                            <a href="{{ route('members.blogs.show', $last_blog->slug) }}">
                                <h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                    {{ $last_blog->title }}
                                </h4>
                            </a>

                            <p class="m-b-20">
                                {{ $last_blog->description_short }}
                            </p>

                            <a href="{{ route('members.blogs.show', $last_blog->slug) }}" class="txt4">
                                Continue Reading
                                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<!-- Sign up -->
{{-- <div class="section-signup bg1-pattern p-t-85 p-b-85">
    <form class="flex-c-m flex-w flex-col-c-m-lg p-l-5 p-r-5">
        <span class="txt5 m-10">
            Specials Sign up
        </span>

        <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email-address" placeholder="Email Adrress">
            <i class="fa fa-envelope ab-r-m m-r-18" aria-hidden="true"></i>
        </div>

        <!-- Button3 -->
        <button type="submit" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10">
            Sign-up
        </button>
    </form>
</div> --}}
@endsection