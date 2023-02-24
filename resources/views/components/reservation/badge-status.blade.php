@props(['status'])

<span class="badge bg-reservation-{{ $status }}">
    {{ ucwords($status) }}
</span>