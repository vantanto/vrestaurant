@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header"><strong>Create Banner</strong></div>
            <div class="card-body">
                <form id="mainForm" method="post" action="{{ route('banners.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control-file" required accept=".png, .jpg, .jpeg">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="active">Active</label>
                                <div class="form-control-plaintext py-0">
                                    <label class="c-switch c-switch-pill c-switch-primary mb-0">
                                        <input class="c-switch-input" type="checkbox" name="active" checked=""><span class="c-switch-slider"></span>
                                    </label>
                                </div>
                            </div>
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