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

            <a href="{{ route('members.blogs.index') }}" class="txt27">
                Blog
            </a>

            <span class="txt29 m-l-10 m-r-10">/</span>

            <span class="txt29">
                Cooking recipe delicious
            </span>
        </div>
    </div>

    <div class="container">
        <div class="row ">
            <div class="col-md-8 col-lg-9">
                <div class="p-t-80 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">
                    <!-- Block4 -->
                    <div class="blo4 p-b-63">
                        <!-- - -->
                        <div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
                            <a href="#">
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

                        <!-- - -->
                        <div class="text-blo4 p-t-33">
                            <h4 class="p-b-16">
                                <a href="#" class="tit9">{{ $blog->title }}</a>
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
                                    {{ $blog->categoryBlog->name }}
                                    {{-- <span class="m-r-6 m-l-4">|</span> --}}
                                </span>

                                {{-- <span>
                                    8 Comments
                                </span> --}}
                            </div>

                            <p>
                                {{ $blog->description }}
                            </p>
                        </div>
                    </div>

                    <!-- Leave a comment -->
                    {{-- <form class="leave-comment p-t-10">
                        <h4 class="txt33 p-b-14">
                            Leave a Comment
                        </h4>

                        <p>
                            Your email address will not be published. Required fields are marked *
                        </p>

                        <textarea class="bo-rad-10 size29 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-40" name="commentent" placeholder="Comment..."></textarea>

                        <div class="size30 bo2 bo-rad-10 m-t-3 m-b-20">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name *">
                        </div>

                        <div class="size30 bo2 bo-rad-10 m-t-3 m-b-20">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" placeholder="Email *">
                        </div>

                        <div class="size30 bo2 bo-rad-10 m-t-3 m-b-30">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="website" placeholder="Website">
                        </div>

                        <!-- Button3 -->
                        <button type="submit" class="btn3 flex-c-m size31 txt11 trans-0-4">
                            Post Comment
                        </button>
                    </form> --}}
                </div>
            </div>

            <x-blogs.side-nav />
        </div>
    </div>
</section>
@endsection