@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Edit Gallery</strong></div>
            <div class="card-body">
                <img src="{{ Storage::disk('public')->url($gallery->image) }}" class="img-fluid mb-3">
                <form id="mainForm" method="post" action="{{ route('galleries.update', $gallery->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control-file" accept=".png, .jpg, .jpeg">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="active">Active</label>
                                <div class="form-control-plaintext py-0">
                                    <label class="c-switch c-switch-pill c-switch-success mb-0">
                                        <input class="c-switch-input" type="checkbox" id="active" name="active" @if($gallery->active) checked="" @endif value="1"><span class="c-switch-slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="category">Category</label>
                            <select id="category" name="category" class="form-control">
                                <option value="" selected>No Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}" 
                                        @if($category == $gallery->category) selected @endif>
                                        {{ ucwords(str_replace('_', ' ', $category)) }}
                                    </option>
                                @endforeach
                            </select>
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