@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Edit Chef</strong></div>
            <div class="card-body">
                <form id="mainForm" method="post" action="{{ route('chefs.update', $chef->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control-file" accept=".png, .jpg, .jpeg">
                                <img src="{{ Storage::disk('public')->url($chef->image) }}" class="img-fluid mt-3">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="active">Active</label>
                                <div class="form-control-plaintext py-0">
                                    <label class="c-switch c-switch-pill c-switch-success mb-0">
                                        <input class="c-switch-input" type="checkbox" id="active" name="active" @if($chef->active) checked="" @endif value="1"><span class="c-switch-slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required value="{{ $chef->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="position">Position</label>
                            <input type="text" id="position" name="position" class="form-control" value="{{ $chef->position }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="10" required>{{ $chef->description }}</textarea>
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