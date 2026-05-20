@props([
    'name' => '',
    'label' => '',
    'type' => 'text',
    'value' => ''
])

<div class="flex flex-col gap-2">
    <label for="{{ $name }}">{{ $label }}</label>
     @if($type == 'textarea')
        <textarea value="{{ $value }}" {{ $attributes->merge(['class'=>"form-input"]) }} id="{{ $name }}" name="{{ $name }}" required></textarea>
    @else
        <input value="{{ $value }}" class="form-input" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" required>
    @endif
</div>