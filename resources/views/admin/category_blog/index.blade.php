@extends('admin.layouts.app')
@section('content')
<x-forms.filter :search_placeholder="'Name'" />
<div class="card">
    <div class="card-header">
        <strong>List Category Blog</strong>
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('category_blogs.create') }}">
                <i class="fa fa-plus"></i>
                Create Category Blog
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category_blogs as $category_blog)
                    <tr>
                        <td>
                            {{ $category_blog->name }}
                        </td>
                        <td>
                            <a href="{{ route('category_blogs.edit', $category_blog->id) }}" class="btn btn-warning mb-1">Edit</a>
                            <form method="post" action="{{ route('category_blogs.destroy', $category_blog->id) }}" class="d-inline mb-1">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $category_blogs->links() }}
    </div>
</div>
@endsection