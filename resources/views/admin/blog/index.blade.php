@extends('admin.layouts.app')
@section('content')
<x-forms.filter :search_placeholder="'Title'" >
    <x-slot name="slot_top">
        <div class="form-group col-md-3">
            <label>Category</label>
            <select name="category" class="form-control">
                <option value="">All Category</option>
                @foreach ($category_blogs as $category_blog)
                    <option value="{{ $category_blog->id }}"
                        @if($category_blog->id == request()->input('category')) selected @endif>
                        {{ $category_blog->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </x-slot>
    <div class="row">
        <div class="form-group col-md-4">
            <label>Month</label>
            <input type="month" name="month" class="form-control" value="{{ request()->input('month') }}" >
        </div>
    </div>
</x-forms.filter>
<div class="card">
    <div class="card-header">
        <strong>List Blog</strong>
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('blogs.create') }}">
                <i class="fa fa-plus"></i>
                Create Blog
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Published</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>
                            {{ $blog->title }}
                        </td>
                        <td>
                            {{ date('d/m/Y', strtotime($blog->published)) }}
                        </td>
                        <td>
                            {{ $blog->categoryBlog->name ?? '' }}
                        </td>
                        <td>
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="btn btn-info mb-1">Detail</a>
                            <a href="{{ route('blogs.edit', $blog->slug) }}" class="btn btn-warning mb-1">Edit</a>
                            <form method="post" action="{{ route('blogs.destroy', $blog->slug) }}" class="d-inline mb-1">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blogs->withQueryString()->links() }}
    </div>
</div>
@endsection