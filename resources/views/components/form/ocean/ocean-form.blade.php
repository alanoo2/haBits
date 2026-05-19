@props([
    'question' => '',
    'title' => ''
])

<p class="mb-5">{{ $title }}</p>
<div class="flex flex-row gap-10 align-items justify-center mb-5 pb-5 border-b-2 border-gray-400">
    @for($i = 1 ; $i <= 5 ; $i++)
        <div class="flex flex-col">
            <label for="{{ $question }}-{{ $i }}">{{ $i }}</label>
            <input type="radio" id="{{ $question }}-{{ $i }}" name="{{ $question }}" value="{{ $i }}">
        </div>    
    @endfor
</div>