@props(['error'])

@if ($errors->has($error))
    <small class="text-danger">
        {{ $errors->first($error) }}
    </small>
@endif
