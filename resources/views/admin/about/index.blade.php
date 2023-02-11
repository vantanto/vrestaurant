@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>List About</strong>
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('abouts.create') }}">
                <i class="fa fa-plus"></i>
                Create About
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abouts as $about)
                    <tr class="@if($about->is_main) bg-main @endif">
                        <td>
                            <img src="{{ Storage::disk('public')->url($about->image) }}" class="img-fluid" style="max-height: 150px;">
                        </td>
                        <td>
                            {{ $about->title }}
                        </td>
                        <td>
                            {{ $about->subtitle }}
                        </td>
                        <td>
                            @if ($about->active == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-secondary">Deactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('abouts.edit', $about->id) }}" class="btn btn-warning">Edit</a>
                            <form method="post" action="{{ route('abouts.destroy', $about->id) }}" class="d-inline">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $abouts->links() }}
    </div>
</div>
@endsection