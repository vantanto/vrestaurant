@extends('admin.layouts.app')
@section('content')
<div class="carousel slide mb-3" id="carouselBanner" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($banner_actives as $banner_active)
            <li data-target="#carouselBanner" data-slide-to="{{ $loop->index }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($banner_actives as $banner_active)
            <div class="carousel-item @if($loop->iteration == 1) active @endif">
                <img class="d-block w-100" src="{{ Storage::disk('public')->url($banner_active->image) }}">
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselBanner" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselBanner" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="card">
    <div class="card-header">
        <strong>List Banner</strong>
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('banners.create') }}">
                <i class="fa fa-plus"></i>
                Create Banner
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr>
                            <td>
                                <img src="{{ Storage::disk('public')->url($banner->image) }}" class="img-fluid" style="max-height: 150px;">
                            </td>
                            <td>
                                <x-badge-active :active="$banner->active" />
                            </td>
                            <td>
                                <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-warning mb-1">Edit</a>
                                <form method="post" action="{{ route('banners.destroy', $banner->id) }}" class="d-inline mb-1">
                                    @csrf
                                    <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $banners->withQueryString()->links() }}
    </div>
</div>
@endsection