@props([
    'step' => '',
    'q1' => '', 'q2' => '', 'q3' => '', 'q4' => '',
    't1' => '', 't2' => '', 't3' => '', 't4' => ''
])

<div x-show="step === {{ $step }}"
    x-transition:enter="transition-opacity duration-300"
    x-transition:enter-start="opacity-0"
>
    <x-form.ocean.ocean-form question="{{ $q1 }}" title="{{ $t1 }}"/>
    <x-form.ocean.ocean-form question="{{ $q2 }}" title="{{ $t2 }}"/>
    <x-form.ocean.ocean-form question="{{ $q3 }}" title="{{ $t3 }}"/>

    @if($step == 6)
        <button 
            type="button"
            @click="
                const questions = ['{{ $q1 }}', '{{ $q2 }}', '{{ $q3 }}'];
                const allAnswered = questions.every(q => document.querySelector('input[name=\'' + q + '\']:checked'));
                if(!allAnswered) {
                    alert('Please answer all questions before continuing.');
                    return;
                }
                $el.closest('form').submit();
            "
            class="bg-violet-900 px-4 py-2 rounded cursor-pointer w-full hover:bg-yellow-200 hover:!text-gray-800"
        >
            Finish!
        </button>    
    @else
        <x-form.ocean.ocean-form question="{{ $q4 }}" title="{{ $t4 }}"/>
        <button 
            type="button" 
            @click="
                const questions = ['{{ $q1 }}', '{{ $q2 }}', '{{ $q3 }}', '{{ $q4 }}'];
                const allAnswered = questions.every(q => document.querySelector('input[name=\'' + q + '\']:checked'));
                if(!allAnswered) {
                    alert('Please answer all questions before continuing.');
                    return;
                }
                step = step + 1
            "
            class="bg-violet-900 px-4 py-2 w-full rounded cursor-pointer hover:bg-yellow-200 hover:!text-gray-800"
        >
            Next?
        </button>    
    @endif
</div>