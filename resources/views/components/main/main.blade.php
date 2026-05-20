@props(['streak' => 0])

<x-layout>
    <div x-data="{ show: {{ session('welcome') ? 'true' : 'false' }}, next: 1 }"
    >
        <div 
            x-show="show"
            class="bg-white/60 p-4 rounded-lg mx-auto my-25 w-120 z-index-50"
        >
            <div
                x-transition:leave="transition-opacity duration-300"
                x-transition:leave-end="opacity-0"
                class="flex flex-col items-center gap-5"
                x-show="next === 1"
            >
                <h1 class="text-[32px]">Welcome to haBits, {{ auth()->user()->name }}!</h1>
                <p>Your registration was successful.</p>
                <button
                    class="bg-violet-900 px-4 py-2 rounded w-full cursor-pointer hover:bg-yellow-200 hover:!text-gray-800"
                    @click="next = next+1"
                >
                    Next
                </button>
            </div>
            <div
                x-transition:enter="transition-opacity duration-300"
                x-transition:enter-start="opacity-0"
                class="flex flex-col items-center gap-5"
                x-show="next === 2"
            >
                <h1 class="text-[32px]">Congrats! You are a <span>
                    <p class="!text-orange-400">{{ auth()->user()->personality->name }}</p>
                </span> </h1>
                <img class="" src="{{ asset( auth()->user()->personality->image_path )  }}" alt="">
                <p class="bg-gray-700/50 rounded-xl p-2"> {{ auth()->user()->personality->description }} </p>
                <button
                    class="bg-violet-900 px-4 py-2 rounded w-full cursor-pointer hover:bg-yellow-200 hover:!text-gray-800"
                    @click="show = false"
                >
                    Finish!
                </button>
            </div>
        </div>
    
        <div class="flex flex-col mx-50 my-35 gap-2" 
                x-show="show === false"
            >
                <div class="flex absolute top-5 left-320 bg-gray-500/70 w-100 items-center h-25 p-5 rounded-xl border-4 border-gray-400/90">
                    <p class="">Racha Actual: {{ $streak }}</p>
                    <img class="absolute left-33" src="{{ $streak  === 0 ?  asset('img/racha-off.png') : asset('img/racha-on.png') }}" alt="racha">
                </div>
                <div 
                    class="bg-violet-500/60 border-4 border-white/90 rounded-xl hover:border-yellow-100 align-items ">
                    <div class="flex p-5 justify-between items-center">
                        <div class="flex gap-10">
                            <a class="hover:!border-white/90 hover:!text-yellow-100" href="{{ route('main') }}">Habits</a>
                            <a class="hover:!border-white/90 hover:!text-yellow-100" href="{{ route('create-habit') }}">Create an Habit</a>
                            <a class="hover:!border-white/90 hover:!text-yellow-100" href="{{ route('achievements') }}">Achievements</a>
                            @if(auth()->user()->rol === 'admin')
                                <a class="!text-yellow-200 hover:!text-yellow-500" href="{{ route('admin') }}">ADMIN</a>
                            @endif
                        </div>
                        <div>
                            <form
                                action=" {{  route('logout') }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 p-2 rounded-md hover:bg-red-700">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-violet-500/60 border-4 border-white/90 rounded-xl hover:border-yellow-100 h-120 p-10">
                    
                    {{ $slot }}

                </div>
        </div>
    </div>
</x-layout>