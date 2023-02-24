@extends('admin.layouts.app')
@section('content')
<x-forms.filter :search="false" :status="true">
    <x-slot name="slot_top" >
        <div class="form-group col-md-4">
            <label>Category</label>
            <select name="category" class="form-control">
                <option value="" selected>All Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}"
                        @if(request()->input('category') == $category) selected @endif>
                        {{ ucwords(str_replace('_', ' ', $category)) }}
                    </option>
                @endforeach
            </select>
        </div>
    </x-slot>
</x-forms.filter>
<div class="card">
    <div class="card-header">
        <strong>List Gallery</strong>
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('galleries.create') }}">
                <i class="fa fa-plus"></i>
                Create Gallery
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $gallery)
                    <tr>
                        <td>
                            <img src="{{ Storage::disk('public')->url($gallery->image) }}" class="img-fluid" style="max-height: 150px;">
                        </td>
                        <td>
                            {{ ucwords(str_replace('_', ' ', $gallery->category)) }}
                        </td>
                        <td>
                            <x-badge-active :active="$gallery->active" />
                        </td>
                        <td>
                            <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning mb-1">Edit</a>
                            <form method="post" action="{{ route('galleries.destroy', $gallery->id) }}" class="d-inline mb-1">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $galleries->links() }}
    </div>
</div>
@endsection