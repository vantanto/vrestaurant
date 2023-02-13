@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Detail About</strong></div>
            <div class="card-body">
                <img src="{{ Storage::disk('public')->url($about->image) }}" class="img-fluid mb-3">
                <table class="table table-sm table-borderless">
                    <colgroup>
                        <col class="col-md-4">
                        <col class="col-md-8">
                    </colgroup>
                    <tr>
                        <td>Status</td>
                        <td>
                            <x-badge-active :active="$about->active" />
                            @if ($about->is_main) <span class="badge bg-main ml-2">Main</span> @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $about->title }}</td>
                    </tr>
                    <tr>
                        <td>Subtitle</td>
                        <td>{{ $about->subtitle }}</td>
                    </tr>
                    <tr>
                        <td>Description Short</td>
                        <td>{{ $about->description_short }}</td>
                    </tr>
                    <tr>
                        <td>Deescription</td>
                        <td>{{ $about->description }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection