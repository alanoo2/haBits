<x-layout>
        <x-main.main class="p-10" :streak="$streak">

        <div x-data="{ deleteMode: false, editMode: false, confirmDelete: false, userId: null, userName: '' }">
            
            @if($users->isEmpty())
                <p class="mx-120 my-40">No users yet...</p>
            @else

                <div>
                    {{-- Default Mode --}}
                    <div x-show="!deleteMode && !editMode">
                        <h1 class="text-[32px]">Users</h1>
                        <div class="flex flex-wrap gap-4 p-4">
                            @foreach($users as $user)
                                <div class="bg-violet-700/70 border-2 border-white/50 rounded-xl p-4 w-60">
                                    <h2 class="font-bold text-lg">{{ $user->name }}</h2>
                                    <p class="text-sm text-white/70">{{ $user->email }}</p>
                                    <p class="text-xs mt-2 text-yellow-300">{{ $user->habits->count() }} habits</p>
                                    <p class="text-xs text-white/50">{{ $user->rol }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Edit Mode --}}
                    <div x-show="editMode">
                        <h1 class="text-[32px]">Edit Mode!</h1>
                        <div class="flex flex-wrap gap-4 p-4">
                            @foreach($users as $user)
                                <div class="bg-violet-700/70 border-2 border-yellow-300 rounded-xl p-4 w-60">
                                    <h2 class="font-bold text-lg">{{ $user->name }}</h2>
                                    <p class="text-sm text-white/70">{{ $user->email }}</p>
                                    <p class="text-xs mt-2 text-yellow-300">{{ $user->habits->count() }} habits</p>
                                    <a href="{{ route('admin.edit', $user->id) }}" class="mt-2 block text-center bg-yellow-400 text-gray-900 rounded-lg py-1 text-sm hover:bg-yellow-300">
                                        Edit
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Botones --}}
                    <div class="bg-gray-500 p-2 rounded-xl border-2 absolute bottom-55 left-30 cursor-pointer">
                        <button @click="editMode = !editMode; deleteMode = false">
                            <x-icons.edit />
                        </button>
                    </div>
                    <div class="bg-red-500 p-2 rounded-xl border-2 absolute bottom-35 left-30 cursor-pointer">
                        <button @click="deleteMode = !deleteMode; editMode = false">
                            <x-icons.trash />
                        </button>
                    </div>
                </div>

                {{-- Delete Mode --}}
                <div x-show="deleteMode">
                    <h1 class="text-[32px]">Delete Mode!</h1>
                    <div class="flex flex-wrap gap-4 p-4">
                        @foreach($users as $user)
                            <div 
                                class="bg-violet-700/70 border-2 border-white/50 rounded-xl p-4 w-60 cursor-pointer hover:border-red-400 hover:bg-red-900/50"
                                @click="confirmDelete = true; userId = {{ $user->id }}; userName = '{{ $user->name }}'"
                            >
                                <h2 class="font-bold text-lg">{{ $user->name }}</h2>
                                <p class="text-sm text-white/70">{{ $user->email }}</p>
                                <p class="text-xs mt-2 text-yellow-300">{{ $user->habits->count() }} habits</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Modal Delete --}}
                <div 
                    x-show="confirmDelete"
                    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
                >
                    <div class="bg-violet-900 border-2 border-white/50 rounded-xl p-6 w-80 flex flex-col gap-4">
                        <h2 class="text-lg font-bold">Delete user?</h2>
                        <p>Are you sure you want to delete <span class="text-yellow-300" x-text="userName"></span>?</p>
                        <div class="flex gap-3">
                            <form :action="'/admin/users/' + userId" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 w-full py-2 rounded-lg hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                            <button 
                                @click="confirmDelete = false"
                                class="bg-gray-500 flex-1 py-2 rounded-lg hover:bg-gray-700"
                            >
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>

            @endif
        </div>    
                        
           
        </x-main.main>

</x-layout>