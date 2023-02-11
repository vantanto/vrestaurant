@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>List Menu</strong>
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('menus.create') }}">
                <i class="fa fa-plus"></i>
                Create Menu
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>
                            {{ $menu->name }}
                        </td>
                        <td>
                            @if ($menu->active == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-secondary">Deactive</span>
                            @endif
                        </td>
                        <td>
                            @if ($menu->image)
                                <a class="btn btn-info fa fa-file-image-o" href="{{ Storage::disk('public')->url($menu->image) }}" data-lightbox="gallery"></a>
                            @endif
                            @if ($menu->bg_image)
                                <a class="btn btn-info fa fa-picture-o" href="{{ Storage::disk('public')->url($menu->bg_image) }}" data-lightbox="gallery"></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                            <form method="post" action="{{ route('menus.destroy', $menu->id) }}" class="d-inline">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $menus->links() }}
    </div>
</div>
@endsection