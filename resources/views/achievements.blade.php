<x-layout>

    <x-main.main :streak="$streak">
        <h1 class="text-[26px]">Achivements</h1>
        <div class="flex justify-between mt-5 ">
            @foreach($achievements as $achievement)
                @php
                    $userAchievement = auth()->user()->achievements->find($achievement->id);
                    $unlocked = $userAchievement?->pivot->unlocked ?? false;
                @endphp
                <div class="flex flex-col items-center bg-gray-500 border-4 rounded-xl h-80 w-50 p-4 gap-3
                    {{ $unlocked ? 'border-yellow-300' : 'border-gray-400/50 opacity-70' }}">
                    
                    <h2 class="font-bold text-center">{{ $achievement->title }}</h2>
                    <p class="text-sm text-center text-white/70">{{ $achievement->description }}</p>
                    
                    @if($unlocked)
                        <p class="text-xs text-yellow-300 mt-auto">Unlocked</p>
                    @else
                        <p class="text-xs text-gray-400 mt-auto">Locked</p>
                    @endif
                </div>
            @endforeach
        </div>

    </x-main.main>

</x-layout>