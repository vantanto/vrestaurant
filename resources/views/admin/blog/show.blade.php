@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Detail Blog</strong></div>
            <div class="card-body">
                <img src="{{ Storage::disk('public')->url($blog->bg_image) }}" class="img-fluid mb-3">
                <table class="table table-sm table-borderless">
                    <colgroup>
                        <col class="col-md-4">
                        <col class="col-md-8">
                    </colgroup>
                    <tr>
                        <td>Title</td>
                        <td>{{ $blog->title }}</td>
                    </tr>
                    <tr>
                        <td>Published</td>
                        <td>{{ date('d/m/Y', strtotime($blog->published)) }}</td>
                    </tr>
                    <tr>
                        <td>Slug</td>
                        <td>{{ $blog->slug }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $blog->categoryBlog->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td>{{ $blog->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Description Short</td>
                        <td>{{ $blog->description_short }}</td>
                    </tr>
                    <tr>
                        <td>Deescription</td>
                        <td>{{ $blog->description }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection