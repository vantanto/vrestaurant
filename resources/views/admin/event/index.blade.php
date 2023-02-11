@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>List Event</strong>
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('events.create') }}">
                <i class="fa fa-plus"></i>
                Create Event
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>
                            {{ $event->date_start ? date('d/m/Y H:i', strtotime($event->date_start)) : '' }}
                            {{ $event->date_end ? ' - ' . date('d/m/Y H:i', strtotime($event->date_end)) : '' }}
                        </td>
                        <td>
                            {{ $event->title }}
                        </td>
                        <td>
                            @if ($event->active == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-secondary">Deactive</span>
                            @endif
                        </td>
                        <td>
                            @if ($event->image)
                                <a class="btn btn-info fa fa-file-image-o" href="{{ Storage::disk('public')->url($event->image) }}" data-lightbox="gallery"></a>
                            @endif
                            @if ($event->bg_image)
                                <a class="btn btn-info fa fa-picture-o" href="{{ Storage::disk('public')->url($event->bg_image) }}" data-lightbox="gallery"></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                            <form method="post" action="{{ route('events.destroy', $event->id) }}" class="d-inline">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $events->links() }}
    </div>
</div>
@endsection