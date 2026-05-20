    <div x-data="{ show: {{ session('welcome') ? 'true' : 'false' }}, next: 1 }"
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