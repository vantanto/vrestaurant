@props(['active'])

<span 
    @class([
        'badge', 
        'badge-success' => $active,
        'badge-secondary' => !$active
    ])>
    {{ $active == 1 ? 'Active' : 'Deactive' }}
</span>