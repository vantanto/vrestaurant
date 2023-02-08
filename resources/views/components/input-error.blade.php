@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-danger pl-3']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
