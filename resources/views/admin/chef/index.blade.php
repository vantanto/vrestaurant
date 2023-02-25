@extends('admin.layouts.app')
@section('content')
<x-forms.filter :search_placeholder="'Name, Position'" :status="true" />
<div class="card">
    <div class="card-header">
        <strong>List Chef</strong>
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('chefs.create') }}">
                <i class="fa fa-plus"></i>
                Create Chef
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chefs as $chef)
                    <tr>
                        <td>
                            {{ $chef->name }}
                        </td>
                        <td>
                            {{ $chef->position }}
                        </td>
                        <td>
                            <x-badge-active :active="$chef->active" />
                        </td>
                        <td>
                            <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#modal-detail"
                                data-detail='@json(['id' => $chef->id])'>
                                <i class="fa fa-eye"></i>
                            </button>
                            <a href="{{ route('chefs.edit', $chef->id) }}" class="btn btn-warning mb-1">Edit</a>
                            <form method="post" action="{{ route('chefs.destroy', $chef->id) }}" class="d-inline mb-1">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmSwalAlert(this)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $chefs->withQueryString()->links() }}
    </div>
</div>

<x-modal.detail :title="'Detail Chef'" />
@endsection
@push('scripts')
<script>
    getDataDetail("{{ route('chefs.detail') }}", function(result) {
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
                        <td>Position</td>
                        <td>`+data.position+`</td>
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