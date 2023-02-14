@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Create Food</strong></div>
            <div class="card-body">
                <form id="mainForm" method="post" action="{{ route('foods.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="active">Active</label>
                                <div class="form-control-plaintext py-0">
                                    <label class="c-switch c-switch-pill c-switch-success mb-0">
                                        <input class="c-switch-input" type="checkbox" id="active" name="active" checked="" value="1"><span class="c-switch-slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <input type="text" id="price" name="price" class="form-control" required
                                data-type="thousand">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="menu">Menu</label>
                            <select id="menu" name="menu" class="form-control">
                                <option value="" selected>No Menu</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="image">Image (Optional)</label>
                            <input type="file" id="image" name="image" class="form-control-file" accept=".png, .jpg, .jpeg">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description (Optional)</label>
                        <textarea id="description" name="description" class="form-control" rows="10"></textarea>
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