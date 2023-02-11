@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header"><strong>Edit About</strong></div>
            <div class="card-body">
                <img src="{{ Storage::disk('public')->url($about->image) }}" class="img-fluid mb-3">
                <form id="mainForm" method="post" action="{{ route('abouts.update', $about->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control-file" accept=".png, .jpg, .jpeg">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="form-group mr-3">
                                    <label for="active">Active</label>
                                    <div class="form-control-plaintext py-0">
                                        <label class="c-switch c-switch-pill c-switch-success mb-0">
                                            <input class="c-switch-input" type="checkbox" id="active" name="active" @if($about->active) checked="" @endif value="1"><span class="c-switch-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="main">Main</label>
                                    <div class="form-control-plaintext py-0">
                                        <label class="c-switch c-switch-primary mb-0">
                                            <input class="c-switch-input" type="checkbox" id="main" name="main" @if($about->is_main) checked @endif value="1"><span class="c-switch-slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" required value="{{ $about->title }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="subtitle">Subtitle (Optional)</label>
                            <input type="text" id="subtitle" name="subtitle" class="form-control" value="{{ $about->subtitle }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description_short">Description Short</label>
                        <textarea id="description_short" name="description_short" class="form-control" rows="5" required>{{ $about->description_short }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="10" required>{{ $about->description }}</textarea>
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