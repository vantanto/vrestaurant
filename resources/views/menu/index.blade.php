@extends('layouts.app')
@section('content')
<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15 lazyload" data-original="{{ Storage::disk('public')->url('images/bg-title-page-01.jpg') }}">
    <h2 class="tit6 t-center">
        {{ config('app.name') }} Menu
    </h2>
</section>


<!-- Main menu -->
<section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
    <div class="container">
        <div class="row">
            @foreach ($menus_lr as $menus)
                <div class="col-md-10 col-lg-6 m-l-r-auto {{ $loop->iteration % 2 != 0 ? 'p-r-35 p-r-15-lg' : 'p-l-35 p-l-15-lg' }}">
                    @foreach ($menus as $menu)
                        <div class="wrap-item-mainmenu p-b-22">
                            <h3 class="tit-mainmenu tit10 p-b-25">
                                {{ $menu->name }}
                            </h3>

                            @foreach ($menu->foods as $food)
                                <div class="item-mainmenu m-b-36">
                                    <div class="flex-w flex-b m-b-3">
                                        <a href="#" class="name-item-mainmenu txt21">
                                            {{ $food->name }}
                                        </a>

                                        <div class="line-item-mainmenu bg3-pattern"></div>

                                        <div class="price-item-mainmenu txt22">
                                            ${{ $food->price }}
                                        </div>
                                    </div>

                                    <span class="info-item-mainmenu txt23">
                                        {{ $food->description }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>


@foreach ($menus_highlight as $menu_highlight)
    <section class="bgwhite">
        <div class="parallax0 parallax100 lazyload" data-original="{{ Storage::disk('public')->url($menu_highlight->bg_image) }}">
            <div class="bg1-overlay t-center p-t-170 p-b-165">
                <h2 class="tit4 t-center">
                    {{ $menu_highlight->name }}
                </h2>
            </div>
        </div>

        <div class="container">
            <div class="row p-t-108 p-b-70 ">
                @foreach ($menu_highlight->foods as $food)
                    <div class="col-md-6 col-lg-6 m-l-r-auto">
                        <!-- Block3 -->
                        <div class="blo3 flex-w m-b-30">
                            <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                <a href="#"><img data-original="{{ Storage::disk('public')->url($food->image) }}" class="lazyload" alt="IMG-MENU"></a>
                            </div>

                            <div class="text-blo3 size21 flex-col-l-m">
                                <a href="#" class="txt21 m-b-3">
                                    {{ $food->name }}
                                </a>

                                <span class="txt23">
                                    {{ $food->description }}
                                </span>

                                <span class="txt22 m-t-20">
                                    ${{ $food->price }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endforeach
@endsection