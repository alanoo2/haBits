<x-layout>
    
      
        <x-main.main class="p-10" :streak="$streak">
             <div x-data="{ deleteMode: false, editMode: false, confirmDelete: false, habitId: null, habitTitle: '' }"> 
                @if( auth()->user()->habits->isEmpty() )
                    <p class="mx-120 my-40">Any habits yet...</p>
                @else
                
                    <div>
    
                        {{-- Default Mode --}}
                        <div x-show="!deleteMode && !editMode">
                            <h1 class="text-[32px]">Your habits!</h1>
                            <div class="flex flex-wrap gap-4 p-4">
                                @foreach(auth()->user()->habits as $habit)
                                    <div 
                                        x-data="{ completed: {{ $habit->historyDone->where('date', today()->toDateString())->where('done', true)->count() > 0 ? 'true' : 'false' }} }"
                                        @click="completed = !completed; completeHabit({{ $habit->id }})"
                                        :class="completed ? 'bg-green-700/70 border-green-400' : 'bg-violet-700/70 border-white/50'"
                                        class="border-2 rounded-xl p-4 w-60 cursor-pointer transition-all duration-300"
                                    >
                                        <div class="flex items-center gap-2 mb-2">
                                            <img src="{{ asset('img/categories/' . $habit->id_category . '.jpg') }}" class="w-8 h-8">
                                            <h2 class="font-bold text-lg">{{ $habit->title }}</h2>
                                            <span x-show="completed" class="ml-auto text-green-300 text-xl">✓</span>
                                        </div>
                                        <p class="text-sm text-white/70">{{ $habit->description }}</p>
                                        <p class="text-xs mt-2 text-yellow-300">Level {{ $habit->level }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Edit Mode --}}
                        <div x-show="editMode">
                            <h1 class="text-[32px]">Edit Mode!</h1>
                            <div class="flex flex-wrap gap-4 p-4">
                                @foreach(auth()->user()->habits as $habit)
                                    <div class="bg-violet-700/70 border-2 border-yellow-300 rounded-xl p-4 w-60">
                                        <div class="flex items-center gap-2 mb-2">
                                            <img src="{{ asset('img/categories/' . $habit->id_category . '.jpg') }}" class="w-8 h-8">
                                            <h2 class="font-bold text-lg">{{ $habit->title }}</h2>
                                        </div>
                                        <p class="text-sm text-white/70">{{ $habit->description }}</p>
                                        <a href="{{ route('habits.edit', $habit->id) }}" class="mt-2 block text-center bg-yellow-400 text-gray-900 rounded-lg py-1 text-sm hover:bg-yellow-300">
                                            Edit
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        {{-- Botones --}}
                        <div class="bg-gray-500 p-2 rounded-xl border-2 absolute bottom-55 left-30 cursor-pointer">
                            <button @click="editMode = !editMode">
                                <x-icons.edit />
                            </button>
                        </div>
                        <div class="bg-red-500 p-2 rounded-xl border-2 absolute bottom-35 left-30 cursor-pointer">
                            <button @click="deleteMode = !deleteMode">
                                <x-icons.trash />
                            </button>
                        </div> 
                        
                        </div>

                        {{-- Delete Mode --}}
                        <div x-show="deleteMode ===  true">
                            <h1 class="text-[32px]">Delete Mode! </h1>
                            <div x-data="{ confirmDelete: false, habitId: null, habitTitle: '' }">
                                <div class="flex flex-wrap gap-4 p-4">
                                @foreach(auth()->user()->habits as $habit)
                                    <div 
                                        class="bg-violet-700/70 border-2 border-white/50 rounded-xl p-4 w-60 cursor-pointer"
                                        :class="deleteMode ? 'hover:border-red-400 hover:bg-red-900/50' : ''"
                                        @click="if(deleteMode){ confirmDelete = true; habitId = {{ $habit->id }}; habitTitle = '{{ $habit->title }}' }"
                                    >
                                        <div class="flex items-center gap-2 mb-2">
                                            <img src="{{ asset('img/categories/' . $habit->id_category . '.jpg') }}" class="w-8 h-8">
                                            <h2 class="font-bold text-lg">{{ $habit->title }}</h2>
                                        </div>
                                        <p class="text-sm text-white/70">{{ $habit->description }}</p>
                                        <p class="text-xs mt-2 text-yellow-300">Level {{ $habit->level }}</p>
                                    </div>
                                @endforeach
                                </div>
                                {{-- Modal --}}
                               <x-habits.modal-delete/>
                            </div>
                        </div>

                        
                    </div>
                    
                @endif
                
            </div>
        </x-main.main>
        <script>
            function completeHabit(habitId) {
                fetch('/habits/' + habitId + '/complete', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
            }
        </script>
    

</x-layout>