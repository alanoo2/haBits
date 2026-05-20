<x-main.main>

    <div class="">
        <form action="{{ route('habits.update', $habit->id) }}" method="post">
            @csrf
            @method('PATCH')
                <div class="flex gap-3">
                    <div class="w-1/2">
                        <x-form.input label="Title" name="title" id="title" value="{{ $habit->title }}"></x-form.input>
                        <x-form.input class="h-60" type="textarea" label="Description" name="description" id="description" value="{{ $habit->description }}"></x-form.input>
                    </div>
                    <div class="border-4 bg-violet-700/70 w-1/2 rounded-xl" x-data="{ selected: {{ $habit->id_category }} }">
                        <h1 class="m-3">Category:</h1>
                            
                            <input type="hidden" name="id_category" :value="selected">
    
                            <div class="flex flex-wrap gap-3 p-3">
                                @for($i = 1; $i <= 7; $i++)
                                    <div 
                                        @click="selected = {{ $i }}"
                                        :class="selected === {{ $i }} ? 'border-yellow-300 bg-violet-900' : 'border-white/50'"
                                        class="flex flex-col items-center w-30 gap-2 p-2 border-2 rounded-xl cursor-pointer hover:border-yellow-300 transition-all"
                                    >
                                        <img src="{{ asset('img/categories/' . $i . '.jpg') }}" class="w-12 h-12">
                                    </div>
                                @endfor
                            </div>
                    </div>
                </div>
                <button type="submit" class="mt-5 w-full bg-violet-900 px-4 py-2 rounded cursor-pointer hover:bg-yellow-200 hover:!text-gray-800">Create</button>
        </form>
    </div>

</x-main.main>