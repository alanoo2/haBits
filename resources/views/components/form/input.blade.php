@props([
    'name' => '',
    'label' => '',
    'type' => 'text',
])

<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <input class="form-input" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" required>
</div>