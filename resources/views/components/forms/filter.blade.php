@props([
    'search' => true, 
    'search_placeholder' => 'Search', 
    'status' => false,
    'slot_top' => null
])
<div class="mb-3">
    <form method="get" action="{{ request()->url() }}">
        <div class="row">
            @if ($search)
                <div class="form-group col-md-4">
                    <label>Search</label>
                    <input type="text" name="search" class="form-control" value="{{ request()->input('search') }}" placeholder="{{ $search_placeholder }}">
                </div>
            @endif
            @if ($status)
                <div class="form-group col-md-2">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="" selected>All Status</option>
                        <option value="1" @if(request()->input('status') == '1') selected @endif>Active</option>
                        <option value="0" @if(request()->input('status') == '0') selected @endif>Deactive</option>
                    </select>
                </div>
            @endif
            {{ $slot_top }}
        </div>
        {{ $slot }}
        <button type="submit" class="btn btn-outline-primary">Apply Filter</button>
        <a href="{{ request()->url() }}" class="btn btn-secondary">Reset Filter</a>
    </form>
</div>