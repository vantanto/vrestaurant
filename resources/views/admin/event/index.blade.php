@extends('admin.layouts.app')
@section('content')
<x-forms.filter :search_placeholder="'Title'" :status="true">
    <div class="row">
        <div class="form-group col-md-4">
            <label>Date Start</label>
            <input type="datetime-local" name="date_start" class="form-control" value="{{ request()->input('date_start') }}" >
        </div>
        <div class="form-group col-md-4">
            <label>Date End</label>
            <input type="datetime-local" name="date_end" class="form-control" value="{{ request()->input('date_end') }}" >
        </div>
    </div>
</x-forms.filter>
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
        <table class="table table-responsive">
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
                            <x-badge-active :active="$event->active" />
                        </td>
                        <td>
                            @if ($event->image)
                                <a class="btn btn-info fa fa-file-image-o mb-1" href="{{ Storage::disk('public')->url($event->image) }}" data-lightbox="gallery"></a>
                            @endif
                            @if ($event->bg_image)
                                <a class="btn btn-info fa fa-picture-o mb-1" href="{{ Storage::disk('public')->url($event->bg_image) }}" data-lightbox="gallery"></a>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#modal-detail"
                                data-detail='@json(['id' => $event->id])'>
                                <i class="fa fa-eye"></i>
                            </button>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning mb-1">Edit</a>
                            <form method="post" action="{{ route('events.destroy', $event->id) }}" class="d-inline mb-1">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $events->withQueryString()->links() }}
    </div>
</div>

<x-modal.detail :title="'Detail Event'" />
@endsection
@push('scripts')
<script>
    getDataDetail("{{ route('events.detail') }}", function(result) {
        if (result.status == 'success') {
            const data = result.data;
            $("#modal-detail .modal-body").html(`
                <table class="table table-sm table-borderless">
                    <colgroup>
                        <col class="col-md-4">
                        <col class="col-md-8">
                    </colgroup>
                    <tr>
                        <td>Date Start</td>
                        <td>`+moment(data.date_start).format('DD/MM/YYYY HH:mm')+`</td>
                    </tr>
                    <tr>
                        <td>Date End</td>
                        <td>`+moment(data.date_end).format('DD/MM/YYYY HH:mm')+`</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>`+data.title+`</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>`+data.description+`</td>
                    </tr>
                </table>
            `);
        }
    });
</script>
@endpush