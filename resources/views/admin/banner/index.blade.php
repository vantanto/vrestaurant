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
        <table class="table table-responsive-sm">
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
                            @if ($banner->active == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-secondary">Deactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-warning">Edit</a>
                            <form method="post" action="{{ route('banners.destroy', $banner->id) }}" class="d-inline">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $banners->links() }}
    </div>
</div>
@endsection