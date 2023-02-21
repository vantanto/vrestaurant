@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Edit Blog</strong></div>
            <div class="card-body">
                <form id="mainForm" method="post" action="{{ route('blogs.update', $blog->slug) }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" required value="{{ $blog->title }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="published">Published</label>
                            <input type="date" id="published" name="published" class="form-control" required value="{{ $blog->published }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bg_image">Background</label>
                            <input type="file" id="bg_image" name="bg_image" class="form-control-file" accept=".png, .jpg, .jpeg">
                            <img src="{{ Storage::disk('public')->url($blog->bg_image) }}" class="img-fluid mt-3">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category">Category (Optional)</label>
                            <select id="category" name="category" class="form-control">
                                <option value="" selected>No Category</option>
                                @foreach ($category_blogs as $category_blog)
                                    <option value="{{ $category_blog->id }}"
                                        @if($category_blog->id == $blog->category_blog_id) selected @endif>
                                        {{ $category_blog->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description_short">Description Short</label>
                        <textarea id="description_short" name="description_short" rows="5" class="form-control" required>{{ $blog->description_short }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="5" class="form-control" required>{{ $blog->description }}</textarea>
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