@props(['error'])

@error($error)
    <small class="text-danger d-block mt-1">{{ $message }}</small>
@enderror