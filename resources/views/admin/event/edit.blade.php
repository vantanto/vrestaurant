@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Edit Event</strong></div>
            <div class="card-body">
                <form id="mainForm" method="post" action="{{ route('events.update', $event->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control" required value="{{ $event->title }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="active">Active</label>
                                <div class="form-control-plaintext py-0">
                                    <label class="c-switch c-switch-pill c-switch-success mb-0">
                                        <input type="checkbox" id="active" name="active" @if($event->active) checked="" @endif value="1" class="c-switch-input" ><span class="c-switch-slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="date_start">Date Start (Optional)</label>
                            <input type="datetime-local" id="date_start" name="date_start" class="form-control" value="{{ $event->date_start }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date_end">Date End (Optional)</label>
                            <input type="datetime-local" id="date_end" name="date_end" class="form-control" value="{{ $event->date_end }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="5" required>{{ $event->description }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="image">Image (Optional)</label>
                            <input type="file" id="image" name="image" class="form-control-file" accept=".png, .jpg, .jpeg">
                            @if($event->image) <img src="{{ Storage::disk('public')->url($event->image) }}" class="img-fluid mt-3"> @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bg_image">Background (Optional)</label>
                            <input type="file" id="bg_image" name="bg_image" class="form-control-file" accept=".png, .jpg, .jpeg">
                            @if($event->bg_image) <img src="{{ Storage::disk('public')->url($event->bg_image) }}" class="img-fluid mt-3"> @endif
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>mainFormSubmit();</script>
@endpush