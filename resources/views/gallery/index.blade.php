@extends('layouts.app')
@push('scriptsvendor')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.4/isotope.pkgd.min.js" integrity="sha512-VDBOIlDbuC4VWxGJNmuFRQ0Li0SKkDpmGyuhAG5LTDLd/dJ/S0WMVxriR2Y+CyPL5gzjpN4f/6iqWVBJlht0tQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@section('content')
<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15 lazyload" data-original="{{ Storage::disk('public')->url('images/bg-title-page-02.jpg') }}">
    <h2 class="tit6 t-center">
        Gallery
    </h2>
</section>

<!-- Gallery -->
<div class="section-gallery p-t-118 p-b-100">
    <div class="wrap-label-gallery filter-tope-group size27 flex-w flex-sb-m m-l-r-auto flex-col-c-sm p-l-15 p-r-15 m-b-60">
        <button class="label-gallery txt26 trans-0-4 is-actived" data-filter="*">
            All Photo
        </button>

        @foreach ($categories as $category)
        <button class="label-gallery txt26 trans-0-4" data-filter=".{{ $category }}">
            {{ ucwords(str_replace('_', ' ', $category)) }}
        </button>
        @endforeach
    </div>

    <div class="wrap-gallery isotope-grid flex-w p-l-25 p-r-25">
        @foreach ($galleries as $gallery)
            <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom {{ $gallery->category }}">
                <img data-original="{{ Storage::disk('public')->url($gallery->image) }}" class="lazyload" alt="IMG-GALLERY">

                <div class="overlay-item-gallery trans-0-4 flex-c-m">
                    <a class="btn-show-gallery flex-c-m fa fa-search" href="{{ Storage::disk('public')->url($gallery->image) }}" data-lightbox="gallery"></a>
                </div>
            </div>
        @endforeach
    </div>

    {{ $galleries->links('vendor.pagination.pato') }}
</div>
@endsection