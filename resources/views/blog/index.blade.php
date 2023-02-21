@extends('layouts.app')
@section('content')
<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15 lazyload" data-original="{{ Storage::disk('public')->url('images/bg-title-page-03.jpg') }}">
    <h2 class="tit6 t-center">
        Blog
    </h2>
</section>


<!-- Content page -->
<section>
    <div class="bread-crumb bo5-b p-t-17 p-b-17">
        <div class="container">
            <a href="{{ url('/') }}" class="txt27">
                Home
            </a>

            <span class="txt29 m-l-10 m-r-10">/</span>

            <span class="txt29">
                Blog
            </span>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9">
                <div class="p-t-80 p-b-124 bo5-r h-full p-r-50 p-r-0-md bo-none-md">
                    @foreach ($blogs as $blog)
                        <div class="blo4 p-b-63">
                            <div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
                                <a href="{{ route('members.blogs.show', $blog->slug) }}">
                                    <img data-original="{{ Storage::disk('public')->url($blog->bg_image) }}" class="lazyload" alt="IMG-BLOG">
                                </a>

                                <div class="date-blo4 flex-col-c-m">
                                    <span class="txt30 m-b-4">
                                        {{ date('d', strtotime($blog->published)) }}
                                    </span>

                                    <span class="txt31">
                                        {{ date('M, Y', strtotime($blog->published)) }}
                                    </span>
                                </div>
                            </div>

                            <div class="text-blo4 p-t-33">
                                <h4 class="p-b-16">
                                    <a href="{{ route('members.blogs.show', $blog->slug) }}" class="tit9">{{ $blog->title }}</a>
                                </h4>

                                <div class="txt32 flex-w p-b-24">
                                    <span>
                                        by {{ $blog->user->name }}
                                        <span class="m-r-6 m-l-4">|</span>
                                    </span>

                                    <span>
                                        {{ date('d F, Y', strtotime($blog->published)) }}
                                        <span class="m-r-6 m-l-4">|</span>
                                    </span>

                                    <span>
                                        {{ $blog->categoryBlog->name ?? '' }}
                                        {{-- <span class="m-r-6 m-l-4">|</span> --}}
                                    </span>

                                    {{-- <span>
                                        8 Comments
                                    </span> --}}
                                </div>

                                <p>
                                    {{ $blog->description_short }}
                                </p>

                                <a href="{{ route('members.blogs.show', $blog->slug) }}" class="dis-block txt4 m-t-30">
                                    Continue Reading
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    {{ $blogs->withQueryString()->links('vendor.pagination.pato') }}
                </div>
            </div>

            <x-blogs.side-nav />
        </div>
    </div>
</section>
@endsection