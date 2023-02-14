@extends('admin.layouts.app')
@section('content')
<x-forms.filter :search_placeholder="'Name, Price'" :status="true" >
    <x-slot name="slot_top">
        <div class="col-md-4">
            <label>Menu</label>
            <select name="menu" class="form-control">
                <option value="" selected>All Menu</option>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}"
                        @if($menu->id == request()->input('menu')) selected @endif>
                        {{ $menu->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </x-slot>
</x-forms.filter>
<div class="card">
    <div class="card-header">
        <strong>List Food</strong>
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('foods.create') }}">
                <i class="fa fa-plus"></i>
                Create Food
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Menu</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                    <tr>
                        <td>
                            {{ $food->name }}
                        </td>
                        <td>
                            ${{ number_format($food->price, 2) }}
                        </td>
                        <td>
                            {{ $food->menu->name }}
                        </td>
                        <td>
                            <x-badge-active :active="$food->active" />
                        </td>
                        <td>
                            <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#modal-detail"
                                data-detail='@json(['id' => $food->id])'>
                                <i class="fa fa-eye"></i>
                            </button>
                            <a href="{{ route('foods.edit', $food->id) }}" class="btn btn-warning mb-1">Edit</a>
                            <form method="post" action="{{ route('foods.destroy', $food->id) }}" class="d-inline mb-1">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $foods->links() }}
    </div>
</div>

<x-modal.detail :title="'Detail Food'" />
@endsection
@push('scripts')
<script>
    getDataDetail("{{ route('foods.detail') }}", function(result) {
        if (result.status == 'success') {
            const data = result.data;
            $("#modal-detail .modal-body").html(`
                <div class="text-center">
                    <img src="{{ Storage::disk('public')->url('') }}`+data.image+`" class="img-fluid mb-3" style="max-height: 150px;">
                </div>
                <table class="table table-sm table-borderless">
                    <colgroup>
                        <col class="col-md-4">
                        <col class="col-md-8">
                    </colgroup>
                    <tr>
                        <td>Name</td>
                        <td>`+data.name+`</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>$`+number_format(data.price, 2)+`</td>
                    </tr>
                    <tr>
                        <td>Menu</td>
                        <td>`+data.menu.name+`</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>`+data.description+`</td>
                    </tr>
                </table>
            `);
        }
    });
</script>
@endpush