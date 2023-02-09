@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-danger pl-3 mt-1 mb-0 font-10']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
