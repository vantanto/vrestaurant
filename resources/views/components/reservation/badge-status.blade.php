@props(['status'])

<span class="badge 
        @if ($status == 'pending') badge-warning
        @elseif ($status == 'confirmed') badge-success
        @elseif ($status == 'cancelled') badge-danger
        @endif
    ">
    {{ ucwords($status) }}
</span>